@extends('layouts.admin')

@section('styles')  @endsection


@section('content')
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
<script>
    $( document ).ready( function() {
				CKEDITOR.config.allowedContent = true;
                CKEDITOR.config.height = 600; 
				CKEDITOR.replace('editor1',{
					filebrowserUploadUrl: 'ckeditor/ck_upload.php',
					filebrowserUploadMethod: 'form',
				});

            // Add .js-ckeditor-enabled class to tag it as activated
            $('#editor1').addClass('editor1-enabled');
		});
</script>


<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.campaign.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.campaigns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="selected_template_id">Select Template for Email or Edit Current Content</label>
                <select class="form-control select2 selectTemplate {{ $errors->has('selected_template') ? 'is-invalid' : '' }}" name="selected_template_id" id="selected_template_id">
                    @foreach($selected_templates as $id => $entry)
                        <option value="{{ $id }}" {{ @$_GET['TemplateID'] == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('selected_template'))
                    <span class="text-danger">{{ $errors->first('selected_template') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.selected_template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">Nickname for Email</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', @$_GET['CampaignName']) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">Enter a name you will be able to identify this email by. That way later you can find it.</span>
            </div>
            <div class="form-group">
                <label for="email_subject">{{ trans('cruds.campaign.fields.email_subject') }}</label>
                <input class="form-control {{ $errors->has('email_subject') ? 'is-invalid' : '' }}" type="text" name="email_subject" id="email_subject" value="{{ old('email_subject', @$_GET['EmailSubject']) }}">
                @if($errors->has('email_subject'))
                    <span class="text-danger">{{ $errors->first('email_subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.email_subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="from_email">{{ trans('cruds.campaign.fields.from_email') }}</label>
                <input class="form-control {{ $errors->has('from_email') ? 'is-invalid' : '' }}" type="email" name="from_email" id="from_email" value="info@netiquetteads.com" readonly>
                @if($errors->has('from_email'))
                    <span class="text-danger">{{ $errors->first('from_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.from_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="campaign_offer_id">Select Offer for Email</label>
                <select class="form-control select2 {{ $errors->has('campaign_offer') ? 'is-invalid' : '' }}" name="campaign_offer_id[]" id="campaign_offer_id" multiple data-placeholder="Choose offers..">
                    @php
                    $getOffers=array();
                        if(@$_GET['OfferSelection']){
                            $getOffers=explode(',',$_GET['OfferSelection']);
                        }
                    @endphp
                    @foreach($campaign_offers as $id => $entry)
                        <option value="{{ $id }}" @if (in_array($id,$getOffers))
                            selected
                        @endif>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('campaign_offer'))
                    <span class="text-danger">{{ $errors->first('campaign_offer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.campaign_offer_helper') }}</span>
            </div>
            

            <div class="form-group">
            <label onclick="vph();"><font color="blue"><u>View Placeholders</u></font></label>
            <script>
                function vph() {
				var x = document.getElementById("placeholders");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}
			}
            </script>
            <div id="placeholders" style="display:none;">
				<table>
					<tr>
						<td>ID</td>
						<td>{ID}</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>Placeholder</td>
					</tr>
					<tr>
						<td>First Name</td>
						<td>{FirstName}</td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td>{LastName}</td>
					</tr>
					<tr>
						<td>Offer Section</td>
						<td>{Offer_Here}</td>
					</tr>
                    <tr>
						<td>Offer Image</td>
						<td>{Offer_Image}</td>
					</tr>
					<tr>
						<td>Company</td>
						<td>{Company}</td>
					</tr>
				</table>
			</div>
        </div>
            <label for="SendingTo">Send To:</label><br/>
			<div class="form-check">
				<label for="Affiliates">
                    Affiliates - 
                </label>

                <label for="SendingToAffiliatesActive">
				    <input type="radio" name="SendingTo" id="SendingToAffiliatesActive" value="1" class="sendto" status="active">
                    Active ({{ $AffiliateActiveCount }})
                </label>

                <label for="SendingToAffiliatesPending">
				    <input type="radio" name="SendingTo" id="SendingToAffiliatesPending" value="1" class="sendto" status="pending">
                    Pending ({{ $AffiliatePendingCount }})
                </label>

                <label for="SendingToAffiliatesInactive">
				    <input type="radio" name="SendingTo" id="SendingToAffiliatesInactive" value="1" class="sendto" status="inactive">
                    Inactive ({{ $AffiliateInactiveCount }})
                </label>

				<br>
				<label for="Advertisers">
                    Advertisers - 
                </label> 

                <label for="SendingToAdvertisersActive">
				<input type="radio" name="SendingTo" id="SendingToAdvertisersActive" value="2" class="sendto" status="active">
					Active({{ $AdvertiserActiveCount }})
                </label>

                <label for="SendingToAdvertisersPending">
				<input type="radio" name="SendingTo" id="SendingToAdvertisersPending" value="2" class="sendto" status="pending">
					Pending({{ $AdvertiserPendingCount }})
                </label>

                <label for="SendingToAdvertisersInactive">
				<input type="radio" name="SendingTo" id="SendingToAdvertisersInactive" value="2" class="sendto" status="inactive">
					Inactive({{ $AdvertiserInactiveCount }})
                </label>

                <input type="hidden" name="SendingToStatus" id="sendToStatus">
                <br>
                <label class="radio-inline" for="SendingTo5">
                    <input type="radio" name="SendingTo" id="SendingTo5" value="5" onclick="SendSingleEmail();">
                        Single Email
                </label>
                <br>
				<label class="radio-inline" for="SendingTo3">
				<input type="radio" name="SendingTo" id="SendingTo3" value="3">
					Testing
				</label> 
                <br>
				<label class="radio-inline" for="SendingTo4">
				<input type="radio" name="SendingTo" id="SendingTo4" value="4">
					Dev
				</label> 
                <br>
                <div id="SingleEmailDiv" style="display:none;">
                    <label>Please Enter an Email List</label><br/>
                    Please enter <b><u>ONE EMAIL PER LINE</u></b>
                    <textarea name="SingleEmailBox" class="form-control"></textarea><br/>
                </div>
				<br/>
				<script>
				function SendSingleEmail(){
				var x = document.getElementById("SingleEmailDiv");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}
				}
				</script>
			</div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.campaign.fields.content') }}</label>



                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="editor1" rows="300">

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
		<tr>
			<td><img alt="" src="https://www.netiquetteads.com/assets/mail/netiquette-white-coverphoto-01.jpg" style="width: 450px; height: 100px;" /></td>
		</tr>
	</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
		<tr>
			<td>
			<p>Hey&nbsp;{FirstName}</p>
			</td>
		</tr>
		<tr>
			<td>
			<p>write content here</p>
			</td>
		</tr>
        <tr>
			<td>
        {Offer_Here}
        <offers>
        </offers>
			</td>
		</tr>
		{{-- <tr>
			<td>
        {Offer_Image}
			</td>
		</tr> --}}
	</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
	</tbody>
</table>

<p>&nbsp;<br />
&nbsp;</p>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
		<tr>
			<td>
			<center><img alt="" src="https://www.netiquetteads.com/assets/mail/staytuned.JPG" /></center>
			</td>
		</tr>
	</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
		<tr>
			<td>
			<center><a href="https://www.facebook.com/netiquetteads"><img alt="" src="https://www.netiquetteads.com/assets/mail/v2_fb.png" style="width: 50px; height: 50px;" /></a></center>
			</td>
			<td>
			<center><a href="https://www.instagram.com/netiquetteads"><img alt="" src="https://www.netiquetteads.com/assets/mail/v2_ig.png" style="width: 50px; height: 50px;" /></a></center>
			</td>
			<td>
			<center><a href="https://www.linkedin.com/company/netiquette-ads"><img alt="" src="https://www.netiquetteads.com/assets/mail/v2_linkedin.png" style="width: 50px; height: 50px;" /></a></center>
			</td>
			<td>
			<center><a href="https://twitter.com/netiquetteads"><img alt="" src="https://www.netiquetteads.com/assets/mail/v2_twitter.png" style="width: 50px; height: 50px;" /></a></center>
			</td>
		</tr>
	</tbody>
</table>

{{-- <p style="text-align: center;">If you no longer wish to receive our emails, please <a href="{{ route('unsubscribe') }}?id={ID}&amp;type={AcctType}">unsubscribe here</a><br /> --}}
    <p style="text-align: center;"> 4327 S Hwy 27, Suite 423, Clermont FL, USA, 34711, USA<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>

</textarea> 


                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.content_helper') }}</span>
            </div>
            
                <div class="form-group">
                    <button type="button" id="LoadOffers" class="btn btn-primary">Load Offer</button><br/>
                    <br/>
    
              </div>
            {{-- <div class="form-group">
                <label for="offer_image">{{ trans('cruds.campaign.fields.offer_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('offer_image') ? 'is-invalid' : '' }}" id="offer_image-dropzone">
                </div>
                @if($errors->has('offer_image'))
                    <span class="text-danger">{{ $errors->first('offer_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.offer_image_helper') }}</span>
            </div> --}}
            
           
            {{-- <div class="form-group">
                <label for="subs">{{ trans('cruds.campaign.fields.subs') }}</label>
                <input class="form-control {{ $errors->has('subs') ? 'is-invalid' : '' }}" type="number" name="subs" id="subs" value="{{ old('subs', '0') }}" step="1">
                @if($errors->has('subs'))
                    <span class="text-danger">{{ $errors->first('subs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.subs_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="unsubs">{{ trans('cruds.campaign.fields.unsubs') }}</label>
                <input class="form-control {{ $errors->has('unsubs') ? 'is-invalid' : '' }}" type="number" name="unsubs" id="unsubs" value="{{ old('unsubs', '0') }}" step="1">
                @if($errors->has('unsubs'))
                    <span class="text-danger">{{ $errors->first('unsubs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.unsubs_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="opens">{{ trans('cruds.campaign.fields.opens') }}</label>
                <input class="form-control {{ $errors->has('opens') ? 'is-invalid' : '' }}" type="number" name="opens" id="opens" value="{{ old('opens', '0') }}" step="1">
                @if($errors->has('opens'))
                    <span class="text-danger">{{ $errors->first('opens') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.opens_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')

<script>
    $('.sendto').click(function(){
        $('#sendToStatus').val($(this).attr('status'));
    });
</script>

<script>
    $('#LoadOffers').click(function(){
        $this=$(this);
        var TemplateID = document.getElementById("selected_template_id").value;
        var OffersSelection = $("#campaign_offer_id").val();
        var data = CKEDITOR.instances.editor1.getData();
        var data2 = encodeURIComponent(data);
        $loader='<div class="spinner-border text-dark" role="status">'+
            '<span class="sr-only">Loading...</span>'+
            '</div>';
            $this.html($loader);

            if(OffersSelection.length>0){
                var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:'{{ route("admin.campaigns.loadTemplate") }}',
                        method:"POST",
                        data: {
                            OffersSelection: OffersSelection,content:data2,TemplateID:TemplateID,_token:_token
                        },
                        success:function(response) {
                            // console.log(response);
                            $this.html('Load Offer');
                            CKEDITOR.instances.editor1.setData(response);
                        }
                    })
            } 
    });
    
    </script>

<script>
    $('.selectTemplate').change(function(){

if($(this).val()==''){
    location.reload();
}
        var tempId=$(this).val();
        var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ route('admin.campaigns.getTemplateData') }}",
            dataType:'json',
            method:"POST",
            data:{id:tempId, _token:_token},
            success:function(data){
                // console.log('data',data);
              $('#email_subject').val(data.template.email_subject);
              $('#from_email').val(data.template.from_email);
              $("#campaign_offer_id").select2("val", [data.offers]);
              CKEDITOR.instances['editor1'].setData(data.template.content)
    
              

            //   $('#offer_image-dropzone').each(function () {                
            //     let dropzoneControl = $(this)[0].dropzone;
            //     if (dropzoneControl) {
            //         dropzoneControl.destroy();
            //     }
            //     });
                

            //   new Dropzone("#offer_image-dropzone", {
            //     init: function () {
            //         var file = data.offer_image;
            //         this.options.addedfile.call(this, file);
            //         this.options.thumbnail.call(this, file, file.preview);
            //         file.previewElement.classList.add('dz-complete');
            //         $('form').append('<input type="hidden" name="offer_image" value="' + file.file_name + '">');
            //         this.options.maxFiles = this.options.maxFiles - 1;   
                           
            //     }
            // });

            }
          });

    });

</script>

<script>
    // $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.campaigns.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $campaign->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

//   let theEditor;

//   var allEditors = document.querySelectorAll('.ckeditor');
//   for (var i = 0; i < allEditors.length; ++i) {
//     ClassicEditor.create(
//       allEditors[i], {
//         extraPlugins: [SimpleUploadAdapter]
//       }
//     ) .then( editor => {
//         theEditor = editor; // Save for later use.
//     } )
//     .catch( error => {
//         console.error( error );
//     } );
//   }


// function setDataFromTheEditor(data) {
//     theEditor.setData(data);
// }
// });
</script>

<script>
    Dropzone.options.offerImageDropzone = {
    url: '{{ route('admin.campaigns.storeMedia') }}',
    maxFilesize: 15, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 15,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="offer_image"]').remove()
      $('form').append('<input type="hidden" name="offer_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="offer_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($campaign) && $campaign->offer_image)
      var file = {!! json_encode($campaign->offer_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="offer_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>



{{-- <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script> --}}
@endsection