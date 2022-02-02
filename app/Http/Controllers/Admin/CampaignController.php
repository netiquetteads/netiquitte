<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCampaignRequest;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Account;
use App\Models\Advertiser;
use App\Models\Affiliate;
use App\Models\Campaign;
use App\Models\Offer;
use App\Models\TempEmail;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CampaignController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('campaign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $query = Campaign::with(['campaign_offer', 'selected_template','tempEmails'])->get();

        // dd($query);

        if ($request->ajax()) {
            $query = Campaign::with(['campaign_offer', 'selected_template', 'tempEmails'])->select(sprintf('%s.*', (new Campaign())->table));
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
                if ($row->campaignOffers->count() > 0) {
                    return implode(', ', $row->campaignOffers->pluck('name')->toArray());
                } else {
                    return '';
                }
            });
            $table->addColumn('sentDateTime', function ($row) {
                return date('M d Y', strtotime($row->created_at));
            });

            $table->editColumn('stats', function ($row) {
                return '<span title="Opens">'.$row->tempEmails->where('email_opened', 'opened')->count().'</span> / <span title="Sent">'.$row->tempEmails->count().'</span>';
            });

            $table->editColumn('opens', function ($row) {
                return $row->tempEmails->where('email_opened', 'opened')->count();
            });

            $table->editColumn('sent_date', function ($row) {
                return date('M d Y', strtotime($row->sent_date));
            });

            $table->editColumn('unopened', function ($row) {
                return $row->tempEmails->where('email_opened', '')->count();
            });

            $table->editColumn('send_to', function ($row) {
                return $row->send_to ?? '';
            });

            $table->rawColumns(['actions', 'placeholder', 'campaign_offer', 'sentDateTime', 'stats']);

            return $table->make(true);
        }

        return view('admin.campaigns.index');
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('campaign_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $template = Template::where('id', $request->TemplateID)->first();

        $selectedOffers = Offer::where('offer_status', 'active')->whereIn('id', explode(',', $request->OfferSelection))->get();

        $campaign_offers = Offer::where('offer_status', 'active')->pluck('name', 'id');

        $selected_templates = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $AffiliateActiveCount = Affiliate::with(['Accounts' => function ($q) {
            $q->where('AccountType', 1);
        }])->where('account_status', 'active')->count();

        $AffiliateInactiveCount = Affiliate::with(['Accounts' => function ($q) {
            $q->where('AccountType', 1);
        }])->where('account_status', 'inactive')->count();

        $AffiliatePendingCount = Affiliate::with(['Accounts' => function ($q) {
            $q->where('AccountType', 1);
        }])->where('account_status', 'pending')->count();

        $AdvertiserActiveCount = Advertiser::with(['Accounts' => function ($q) {
            $q->where('AccountType', 2);
        }])->where('account_status', 'active')->count();

        $AdvertiserInactiveCount = Advertiser::with(['Accounts' => function ($q) {
            $q->where('AccountType', 2);
        }])->where('account_status', 'inactive')->count();

        $AdvertiserPendingCount = Advertiser::with(['Accounts' => function ($q) {
            $q->where('AccountType', 2);
        }])->where('account_status', 'pending')->count();

        return view('admin.campaigns.create', compact('campaign_offers', 'selected_templates', 'AffiliateActiveCount', 'AffiliateInactiveCount', 'AffiliatePendingCount', 'AdvertiserActiveCount', 'AdvertiserInactiveCount', 'AdvertiserPendingCount', 'selectedOffers', 'template'));
    }

    public function store(StoreCampaignRequest $request)
    {
        $campaign = Campaign::create($request->all());
        $campaign->campaignOffers()->sync($request->input('campaign_offer_id', []));

        if ($request->input('offer_image', false)) {
            $campaign->addMedia(storage_path('tmp/uploads/'.basename($request->input('offer_image'))))->toMediaCollection('offer_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $campaign->id]);
        }

        $content = $request->content;

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
            'email_body' => $content,
            'email_subject' => $request->email_subject,
            'from_name' => '',
            'email' => '',
            'email_name' => $request->name,
            'email_from' => $request->from_email,
            'sent_to' => '',
            'email_status' => 'pending',
            'email_opened' => '',
            'email_open_date' => '',
            'email_open_time' => '',
            'campaign_id' => $campaign->id,
        ];

        $input['email_body'] = str_replace('{Offer_Here}', '', $input['email_body']);
        $input['email_body'] = str_replace('{Offer_Image}', '', $input['email_body']);

        if ($request->SendingTo == 1) {
            $sendTo = 'Affiliates';

            // $accounts=Account::where('AccountType',1)->where('AccountStatus',$request->SendingToStatus)->where('SubscribedStatus','Subscribed')->get();

            $accounts = Affiliate::with(['Accounts' => function ($q) {
                $q->where('AccountType', 1)
                ->where('SubscribedStatus', 'Subscribed');
            }])->where('account_status', $request->SendingToStatus)->get();

            foreach ($accounts as $key => $account) {
                if ($account->Accounts) {
                    $input['email_body'] = $content;

                    $input['email_body'] = str_replace('{ID}', $account->Accounts->PlatformUserID, $input['email_body']);
                    $input['email_body'] = str_replace('{AcctType}', $account->Accounts->AccountType, $input['email_body']);
                    $input['email_body'] = str_replace('{FirstName}', $account->Accounts->FirstName, $input['email_body']);
                    $input['email_body'] = str_replace('{LastName}', $account->Accounts->LastName, $input['email_body']);
                    $input['email_body'] = str_replace('{Company}', $account->Accounts->Company, $input['email_body']);

                    $input['email'] = $account->Accounts->EmailAddress;
                    $input['from_name'] = $account->Accounts->FirstName;
                    $input['sent_to'] = $sendTo;
                    $this->saveTempMail($input);
                }
            }

            // dd($names);
        } elseif ($request->SendingTo == 2) {
            $sendTo = 'Advertisers';

            // $accounts=Account::where('AccountType',2)->where('AccountStatus',$request->SendingToStatus)->where('SubscribedStatus','Subscribed')->get();

            $accounts = Advertiser::with(['Accounts' => function ($q) {
                $q->where('AccountType', 2)
                ->where('SubscribedStatus', 'Subscribed');
            }])->where('account_status', $request->SendingToStatus)->get();

            foreach ($accounts as $key => $account) {
                if ($account->Accounts) {
                    $input['email_body'] = $content;

                    $input['email_body'] = str_replace('{ID}', $account->Accounts->PlatformUserID, $input['email_body']);
                    $input['email_body'] = str_replace('{AcctType}', $account->Accounts->AccountType, $input['email_body']);
                    $input['email_body'] = str_replace('{FirstName}', $account->Accounts->FirstName, $input['email_body']);
                    $input['email_body'] = str_replace('{LastName}', $account->Accounts->LastName, $input['email_body']);
                    $input['email_body'] = str_replace('{Company}', $account->Accounts->Company, $input['email_body']);

                    $input['email'] = $account->Accounts->EmailAddress;
                    $input['from_name'] = $account->Accounts->FirstName;
                    $input['sent_to'] = $sendTo;
                    $this->saveTempMail($input);
                }
            }
        } elseif ($request->SendingTo == 3) {
            $sendTo = 'Testing';

            $input['email_body'] = str_replace('{FirstName}', 'Test Admin', $input['email_body']);
            $input['email_body'] = str_replace('{LastName}', 'Test Admin', $input['email_body']);
            $input['email_body'] = str_replace('{Company}', 'Test Company', $input['email_body']);

            $emails = explode(',', env('TEST_EMAIL_TO'));

            foreach ($emails as $key => $email) {
                $input['email'] = $email;
                $input['from_name'] = 'Test Admin';
                $input['sent_to'] = $sendTo;
                $this->saveTempMail($input);
            }
        } elseif ($request->SendingTo == 4) {
            $sendTo = 'Dev';

            $input['email_body'] = str_replace('{FirstName}', 'Dev Admin', $input['email_body']);
            $input['email_body'] = str_replace('{LastName}', 'Dev Admin', $input['email_body']);
            $input['email_body'] = str_replace('{Company}', 'Dev Company', $input['email_body']);

            $emails = explode(',', env('DEV_EMAIL_TO'));

            foreach ($emails as $key => $email) {
                $input['email'] = $email;
                $input['from_name'] = 'Dev Admin';
                $input['sent_to'] = $sendTo;
                $this->saveTempMail($input);
            }
        } else {
            $sendTo = 'Single Email';

            $emails = explode("\n", str_replace("\r", '', $request->SingleEmailBox));

            foreach ($emails as $key => $email) {
                $account = Account::where('EmailAddress', $email)->first();

                if ($account) {
                    $firstName = $account->FirstName;
                    $lastName = $account->LastName;
                    $company = $account->Company;

                    $input['email_body'] = str_replace('{FirstName}', $firstName, $input['email_body']);
                    $input['email_body'] = str_replace('{LastName}', $lastName, $input['email_body']);
                    $input['email_body'] = str_replace('{Company}', $company, $input['email_body']);
                } else {
                    $firstName = '';
                    $lastName = '';
                    $company = '';

                    $input['email_body'] = str_replace('{FirstName}', $firstName, $input['email_body']);
                    $input['email_body'] = str_replace('{LastName}', $lastName, $input['email_body']);
                    $input['email_body'] = str_replace('{Company}', $company, $input['email_body']);
                    $input['email_body'] = str_replace('Hey', '', $input['email_body']);
                }

                $input['email'] = $email;
                $input['from_name'] = $firstName;
                $input['sent_to'] = $sendTo;
                $this->saveTempMail($input);
            }
        }

        $campaign->send_to = $sendTo;
        $campaign->save();

        return redirect()->route('admin.campaigns.index');
    }

    public function saveTempMail($input)
    {
        $url = url('').'/openEmail?eid='.$input['email'].'&cid='.$input['campaign_id'];
        $input['email_body'] = $input['email_body']."<img src='".$url."' width='1' height='1' />";
        $tempEmail = TempEmail::create($input);

        return true;
    }

    public function edit(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign_offers = Offer::where('offer_status', 'active')->pluck('name', 'id');

        $selected_templates = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaign->load('campaign_offer', 'selected_template');

        return view('admin.campaigns.edit', compact('campaign_offers', 'selected_templates', 'campaign'));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());
        $campaign->campaignOffers()->sync($request->input('campaign_offer_id', []));

        if ($request->input('offer_image', false)) {
            if (! $campaign->offer_image || $request->input('offer_image') !== $campaign->offer_image->file_name) {
                if ($campaign->offer_image) {
                    $campaign->offer_image->delete();
                }
                $campaign->addMedia(storage_path('tmp/uploads/'.basename($request->input('offer_image'))))->toMediaCollection('offer_image');
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

        $model = new Campaign();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getTemplateData(Request $request)
    {
        $data['template'] = $template = Template::with('templateOffers')->where('id', $request->id)->first();

        $data['offers'] = $template->templateOffers->pluck('id')->toArray();
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

        $uniqueOffers = $request->OffersSelection;

        $content = urldecode($request->content);

        $selectedOffers = Offer::whereIn('id', $uniqueOffers)->get();

        $selectedOfferHtml = view('admin.campaigns.partials.offers-loop', compact('selectedOffers'))->render();

        $content = preg_replace('~<offers(.*?)</offers>~Usi', '', $content);
        $content = str_replace('{Offer_Here}', '{Offer_Here}<offers>'.$selectedOfferHtml.'</offers>', $content);

        echo $content;
    }

    public function deleteSelectedEmails(Request $request)
    {
        Campaign::destroy($request->ids);
        echo 1;
    }
}
