<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCampaignRequest;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;
use App\Models\Offer;
use App\Models\Template;
use App\Models\Account;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Mail\CampaignMail;

class CampaignController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('campaign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Campaign::with(['campaign_offer', 'selected_template'])->select(sprintf('%s.*', (new Campaign())->table));
            $table = Datatables::of($query);

            
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'campaign_show';
                $editGate = 'campaign_edit';
                $deleteGate = 'campaign_delete';
                $crudRoutePart = 'campaigns';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('placeholder', function ($row) {
                return '<input type="checkbox" name="selectdata" id="selectdata'.$row->id.'" value="'.$row->id.'">';
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email_subject', function ($row) {
                return $row->email_subject ? $row->email_subject : '';
            });
            $table->addColumn('campaign_offer_name', function ($row) {
                if ($row->campaignOffers->count()>0){
                    return implode(', ',$row->campaignOffers->pluck('name')->toArray());
                }else{
                    return '';
                }
            });
            $table->addColumn('sentDateTime', function ($row) {
                return date('d M Y h:i:s',strtotime($row->created_at));
            });

            // $table->editColumn('subs', function ($row) {
            //     return $row->subs ? $row->subs : '';
            // });
            // $table->editColumn('opens', function ($row) {
            //     return $row->opens ? $row->opens : '';
            // });

            $table->rawColumns(['actions', 'placeholder', 'campaign_offer','sentDateTime']);

            return $table->make(true);
        }

        return view('admin.campaigns.index');
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('campaign_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $template=Template::where('id',$request->TemplateID)->first();

        $selectedOffers = Offer::where('offer_status','active')->whereIn('id',explode(',',$request->OfferSelection))->get();
        

        $campaign_offers = Offer::where('offer_status','active')->pluck('name', 'id');

        $selected_templates = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $AffiliateActiveCount=Account::where('AccountType',1)->where('AccountStatus','active')->count();
        $AffiliateInactiveCount=Account::where('AccountType',1)->where('AccountStatus','inactive')->count();
        $AffiliatePendingCount=Account::where('AccountType',1)->where('AccountStatus','pending')->count();
        
        $AdvertiserActiveCount=Account::where('AccountType',2)->where('AccountStatus','active')->count();
        $AdvertiserInactiveCount=Account::where('AccountType',2)->where('AccountStatus','inactive')->count();
        $AdvertiserPendingCount=Account::where('AccountType',2)->where('AccountStatus','pending')->count();        
        
        return view('admin.campaigns.create', compact('campaign_offers', 'selected_templates','AffiliateActiveCount','AffiliateInactiveCount','AffiliatePendingCount','AdvertiserActiveCount','AdvertiserInactiveCount','AdvertiserPendingCount','selectedOffers','template'));
    }

    public function store(StoreCampaignRequest $request)
    {

        $campaign = Campaign::create($request->all());
        $campaign->campaignOffers()->sync($request->input('campaign_offer_id', []));

        if ($request->input('offer_image', false)) {
            $campaign->addMedia(storage_path('tmp/uploads/' . basename($request->input('offer_image'))))->toMediaCollection('offer_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $campaign->id]);
        }

        $content=$request->content;

        // $CampaignImg=Campaign::where('id',$campaign->id)->first();

        // if ($CampaignImg->offer_image) {
        //     $offerImg='<img width="100%" src="'.$CampaignImg->offer_image->getUrl().'" />';
        //     $content = str_replace('{Offer_Image}', $offerImg, $content);
        //     $CampaignImg->content=$content;
        //     $CampaignImg->save();
        // }
        
        // $TemplateData=[
        //     'name'=>$request->name,
        //     'email_subject'=>$request->email_subject,
        //     'from_email'=>$request->from_email,
        //     'content'=>$content,
        // ];

        // $template = Template::create($TemplateData);

        // $template->templateOffers()->sync($request->input('campaign_offer_id', []));

        $input = [
            'message' => $content,
            'subject' => $request->email_subject,
        ];

        $input['message'] = str_replace('{Offer_Here}', '', $input['message']);
        $input['message'] = str_replace('{Offer_Image}', '', $input['message']);

        if($request->SendingTo==1){

            $sendTo='Affiliates';

            $accounts=Account::where('AccountType',1)->where('AccountStatus','active')->where('SubscribedStatus','Subscribed')->get();
            
            foreach ($accounts as $key => $account) {

                $input['message']=str_replace('{ID}', $account->PlatformUserID, $input['message']);
                $input['message']=str_replace('{AcctType}', $account->AccountType, $input['message']);
                $input['message'] = str_replace('{FirstName}', $account->FirstName, $input['message']);
                $input['message'] = str_replace('{LastName}', $account->LastName, $input['message']);
                $input['message'] = str_replace('{Company}', $account->Company, $input['message']);

                $this->sendMail($account->EmailAddress,$input);
            }
            
            

        }else if($request->SendingTo==2){

            $sendTo='Advertisers';

            $accounts=Account::where('AccountType',2)->where('AccountStatus','active')->where('SubscribedStatus','Subscribed')->get();
            foreach ($accounts as $key => $account) {
                
                $input['message']=str_replace('{ID}', $account->PlatformUserID, $input['message']);
                $input['message']=str_replace('{AcctType}', $account->AccountType, $input['message']);
                $input['message'] = str_replace('{FirstName}', $account->FirstName, $input['message']);
                $input['message'] = str_replace('{LastName}', $account->LastName, $input['message']);
                $input['message'] = str_replace('{Company}', $account->Company, $input['message']);

                $this->sendMail($account->EmailAddress,$input);
            }
        }
        else if($request->SendingTo==3){

            $sendTo='Testing';

            $input['message'] = str_replace('{FirstName}', "Test Admin", $input['message']);
            $input['message'] = str_replace('{LastName}', 'Test Admin', $input['message']);
            $input['message'] = str_replace('{Company}', 'Test Company', $input['message']);

            $emails = explode(",", env("TEST_EMAIL_TO"));
            $this->sendMail($emails,$input);

        }else if($request->SendingTo==4){

            $sendTo='Dev';

            $input['message'] = str_replace('{FirstName}', "Dev Admin", $input['message']);
            $input['message'] = str_replace('{LastName}', 'Dev Admin', $input['message']);
            $input['message'] = str_replace('{Company}', 'Dev Company', $input['message']);

            $emails = explode(",", env("DEV_EMAIL_TO"));
            $this->sendMail($emails,$input);
            
        }else{

            $sendTo='Single Email';

            $emails = explode("\n", str_replace("\r", "", $request->SingleEmailBox));

            foreach ($emails as $key => $value) {

                $input['message'] = str_replace('{FirstName}', $value, $input['message']);
                $input['message'] = str_replace('{LastName}', $value, $input['message']);
                $input['message'] = str_replace('{Company}', $value, $input['message']);

                $this->sendMail($value,$input);
            }
            
        }

        $campaign->send_to=$sendTo;
        $campaign->save();

        return redirect()->route('admin.campaigns.index');
    }

    public function sendMail($emails,$input)
    {
        $send=\Mail::to($emails)->send(new CampaignMail($input));
        return true;
    }

    public function edit(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign_offers = Offer::where('offer_status','active')->pluck('name', 'id');

        $selected_templates = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaign->load('campaign_offer', 'selected_template');

        return view('admin.campaigns.edit', compact('campaign_offers', 'selected_templates', 'campaign'));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());
        $campaign->campaignOffers()->sync($request->input('campaign_offer_id', []));

        if ($request->input('offer_image', false)) {
            if (!$campaign->offer_image || $request->input('offer_image') !== $campaign->offer_image->file_name) {
                if ($campaign->offer_image) {
                    $campaign->offer_image->delete();
                }
                $campaign->addMedia(storage_path('tmp/uploads/' . basename($request->input('offer_image'))))->toMediaCollection('offer_image');
            }
        } elseif ($campaign->offer_image) {
            $campaign->offer_image->delete();
        }

        return redirect()->route('admin.campaigns.index');
    }

    public function show(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->load('campaign_offer', 'selected_template');

        return view('admin.campaigns.show', compact('campaign'));
    }

    public function destroy(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->delete();

        return back();
    }

    public function massDestroy(MassDestroyCampaignRequest $request)
    {
        Campaign::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('campaign_create') && Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Campaign();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getTemplateData(Request $request)
    {
        $data['template']=$template=Template::with('templateOffers')->where('id',$request->id)->first();

        $data['offers']=$template->templateOffers->pluck('id')->toArray();
        echo json_encode($data);
    }

    public function loadTemplate(Request $request)
    {
        // $TemplateID=$request->TemplateID;

        // if ($TemplateID) {

        //     $template=Template::with('templateOffers')->where('id',$TemplateID)->first();
        //     $templateOffers=$template->templateOffers->pluck('id')->toArray();
        //     $OffersSelection=$request->OffersSelection;
        //     $uniqueOffers=array_diff($OffersSelection,$templateOffers);

        // } else {

        //     $uniqueOffers=$request->OffersSelection;
        // }

        $uniqueOffers=$request->OffersSelection;
        
        $content=urldecode($request->content);

        $selectedOffers = Offer::whereIn('id',$uniqueOffers)->get();

        $selectedOfferHtml=view('admin.campaigns.partials.offers-loop', compact('selectedOffers'))->render();
        
        
        $content = preg_replace('~<offers(.*?)</offers>~Usi', "", $content);
        $content = str_replace('{Offer_Here}', '{Offer_Here}<offers>'.$selectedOfferHtml.'</offers>', $content);
        
        echo $content;

    }

    public function deleteSelectedEmails(Request $request)
    {
        Campaign::destroy($request->ids);
        echo 1;
    }
}
