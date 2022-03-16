<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserApprovedMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        if (request()->has('signature') && ! request()->hasValidSignature()) {
            return redirect()->route('register');
        }

        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'     => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name'     => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'team_id'       => request()->input('team', null),
        ]);

        if (! request()->has('team')) {
            $team = \App\Models\Team::create([
                'owner_id' => $user->id,
                'name'     => $data['email'],
            ]);

            $user->update(['team_id' => $team->id]);
        }

        return $user;
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        $data = [
            'email_subject'=>'Pending user waiting for approval!',
            'email_body'=>'<p><strong>Hello Admin</strong></p> <p>There is a pending user waiting for approval! <a href="'.route('userApproval', $user->id).'">Click Here</a></p>',
        ];

        $admins = User::get();

        foreach ($admins as $key => $admin) {
            $role = implode('', $admin->roles->pluck('id')->toArray());

            if ($role == 1) {
                \Mail::to($admin->email)->send(new UserApprovedMail($data));
            }
        }

        return redirect()->route('login')->with('message', trans('global.yourAccountNeedsAdminApproval'));
    }
}
