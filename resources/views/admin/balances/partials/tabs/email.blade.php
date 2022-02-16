                  <div class="tab-pane fade" id="vert-tabs-email" role="tabpanel" aria-labelledby="vert-tabs-email-tab">
                     <textarea cols="80" id="emailinvoice{{ @$balance->id }}" class="ckeditor" name="editor1" rows="20">
                        <p>Hey {FirstName}</p>
                        <p>Your Payment has been processed for the month of <strong>{{ $Month }} {{ $Year }}</strong> for the amount of <strong>{{ round($payout,2) }}</strong>.</p>
                        <p>For any accounting inquiries please contact <strong>billing@netiquetteads.com</strong></p>
                        <p>Thank you for your business.</p>
                     </textarea>&nbsp;<br/><br/>
		               <button class='btn btn-success sendInvoiceMail' bid="{{ @$balance->id }}" aid="{{ $AffiliateID }}">Send Email</button>
                  </div>