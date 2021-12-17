@if ($selectedOffers->count()>0)
@foreach($selectedOffers as $ID => $selectedOffer)
<table align='center' border='0' cellpadding='1' cellspacing='1' style='width:500px;'>
<tbody>	
@php
if($selectedOffer->payout_type == "cpa"){
$RevenueFigure = "$";
$payout = $RevenueFigure . $selectedOffer->payout_amount;
}else{
$RevenueFigure = "%";
$payout = $selectedOffer->payout_amount . $RevenueFigure;
}
@endphp
<tr>
<td><p><span style='font-size:26px;'><strong>{{ $selectedOffer->name }}</strong></span></p>
<span style='border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;'>
<font color='white'>Payout: {{ $payout }}</font>
</span>
<br />
<span style='color:#white;font-size:12px;'>
<strong>Offer Id</strong>: {{ $selectedOffer->network_offer }}<br />
<strong>Description</strong>: {!! nl2br($selectedOffer->description) !!}<br /><br />
<strong>Category</strong>: {{ $selectedOffer->category }}<br />
<strong>Countries Accepted:</strong>  {{ $selectedOffer->countries }}
</span>
<br /><br />
<a href='{{ $selectedOffer->preview_url }}' style='color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;'>Preview</a> 
<a href='https://netiquetteads.everflowclient.io/login' style='color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;'>Get Links</a>
<br /><br />
</td>
</tr>
</tbody>
</table>
@endforeach
@endif