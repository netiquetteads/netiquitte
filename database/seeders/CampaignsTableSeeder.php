<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('campaigns')->delete();

        \DB::table('campaigns')->insert([
            0 => [
                'id' => 1,
                'name' => 'School Seekers Pause Notice',
                'email_subject' => 'Offer Paused',
                'from_email' => 'info@netiquetteads.com',
                'content' => '<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
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
<p>Please be advised that effective immediately, School Seekers is paused until further notice.</p>

<p>ALL affiliate tracking links are now inactive.</p>

<p>Should this offer status change you will be advised accordingly by your Publisher Consultant.</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td><br />
&nbsp;</td>
</tr>
</tbody>
</table>
</offers></td>
</tr>
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

<p style="text-align: center;">If you no longer wish to receive our emails, please <a href="http://dev.netiquetteads.com/unsubscribe?id={ID}&amp;type={AcctType}">unsubscribe here</a><br />
4327 S Hwy 27, Suite 423, Clermont FL, USA, 34711, USA<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>',
                'subs' => null,
                'unsubs' => null,
                'opens' => null,
                'created_at' => '2022-01-14 04:55:37',
                'updated_at' => '2022-01-14 04:56:43',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Affiliates',
            ],
            1 => [
                'id' => 2,
                'name' => 'phillip test',
                'email_subject' => 'test to phillip',
                'from_email' => 'info@netiquetteads.com',
                'content' => '<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
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
<td>{Offer_Here} <offers> </offers></td>
</tr>
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

<p style="text-align: center;">If you no longer wish to receive our emails, please <a href="https://dev.netiquetteads.com/unsubscribe?id={ID}&amp;type={AcctType}">unsubscribe here</a><br />
4327 S Hwy 27, Suite 423, Clermont FL, USA, 34711, USA<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>',
                'subs' => null,
                'unsubs' => null,
                'opens' => null,
                'created_at' => '2022-01-14 19:57:04',
                'updated_at' => '2022-01-14 19:57:11',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
        ]);
    }
}
