                  <div class="tab-pane fade" id="vert-tabs-email" role="tabpanel" aria-labelledby="vert-tabs-email-tab">
                     <textarea cols="80" id="emailinvoice{{ $balance->id }}" class="ckeditor" name="editor1" rows="20"></textarea>&nbsp;<br/><br/>
		               <button class='btn btn-success sendInvoiceMail' bid="{{ $balance->id }}" aid="{{ $AffiliateID }}">Send Email</button>
                  </div>