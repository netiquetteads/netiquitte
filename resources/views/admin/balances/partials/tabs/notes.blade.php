                  <div class="tab-pane fade" id="vert-tabs-notes" role="tabpanel" aria-labelledby="vert-tabs-notes-tab">
                     <textarea class="form-control" id="PublisherNotes">{{ @$balance->publisher_notes }}</textarea><br/>
		<button style='float:right' class='btn btn-success' onclick="SaveNotes('{{ $AffiliateID }}');">Save Notes</button>
                  </div>