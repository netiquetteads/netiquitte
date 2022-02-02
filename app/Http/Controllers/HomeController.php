<?php

namespace App\Http\Controllers;

use Flasher\Prime\FlasherInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(FlasherInterface $flasher)
    {
        $flasher->addSuccess('Data has been saved successfully!');

        return view('home');
    }
}
