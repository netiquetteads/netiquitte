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
                'updated_at' => '2022-01-20 19:28:39',
                'deleted_at' => '2022-01-20 19:28:39',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            2 => [
                'id' => 3,
                'name' => 'test',
                'email_subject' => 'test',
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
<p>Testing</p>
</td>
</tr>
<tr>
<td>{Offer_Here}<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>College Overview</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $5</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 59<br />
<strong>Description</strong>: Whatever your education goals, we&rsquo;re here to find the right fit for you.<br />
<br />
Conversion point happens once a school has been matched and user submits information to matched school. Publishers get paid out per school submission.<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
Must have physical address: 9490 S. 300 S. #120 Sandy, UT 84070.<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.collegeoverview.com" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-18 17:10:37',
                'updated_at' => '2022-02-17 04:39:50',
                'deleted_at' => '2022-02-17 04:39:50',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => null,
            ],
            3 => [
                'id' => 4,
                'name' => 'Test 2',
                'email_subject' => 'Test 2',
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
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Score CasterIQ - Trial - US</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $16</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 696<br />
<strong>Description</strong>: See what&rsquo;s impacting your credit score today and how your financial actions can help you achieve your goals!<br />
Requirements: Conversion happens on CC Submit for ($1) seven days trial.<br />
Allowed Methods of Promotion: Desktop, Mobile, Display, Email, Pop Up, Search, Social Media, Native, Call Center, SMS, Push<br />
Restricted Promotional Methods: No Adult Traffic, No Incent, No Co-reg, No Spam, No Bot, No Fake credit card info, No Craigslist ads<br />
Country targeting: United States only<br />
<br />
Product Details -ScoreCasterIQ: provides a detailed analysis of your credit report, recommended actions to consider with the accounts impacting your score, and an interactive score simulation tool to educate and assist with general credit score scenarios. -3 Bureau Credit Reports &amp; Scores (refreshed every 60 days) -Enhanced 3 Bureau Credit Report Monitoring -Dark Web &amp; Internet Monitoring -Up to $1 Million in Stolen Funds Reimbursement -Coverage for Lawyers and Experts -Coverage for Personal Expense Compensation -Family Protection &ndash; $25K ID Theft Insurance &ndash; ID Fraud Restoration -IQ Alerts with Application Monitoring -SSN Alerts -Synthetic ID Theft Protection -Change of Address monitoring -File Sharing Network Searches -Lost Wallet Assistance -Checking Account Report -Opt-out IQ (Junk Mail/Do Not Call List) -US-Based ID Restoration Service -Enhanced Credit Report Monitoring -Alerts on Crimes Committed in Your Name -Score Change Alerts -Credit Score Tracker -Credit Scores Simulator -Fraud Restoration with LPOA -Roadside Assistance -Platinum Benefits<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Finance<br />
<strong>Countries Accepted:</strong> </span><br />
<br />
<a href="https://identityiq.com/idp/idprotect/scorecasteriq1.php" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-19 00:55:57',
                'updated_at' => '2022-02-17 04:39:50',
                'deleted_at' => '2022-02-17 04:39:50',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            4 => [
                'id' => 5,
                'name' => 'Test 3',
                'email_subject' => 'Test 3',
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
<p>Test</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Pinecone Research - US</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $4</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 718<br />
<strong>Description</strong>: CONVERSION POINT: DOI, Signup<br />
<br />
18-24 or Male or Hispanic or High school or Less or Asian.<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Surveys/Samples<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.pineconeresearch.com/signup/Signup_Form.aspx" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-19 00:58:25',
                'updated_at' => '2022-02-17 04:39:50',
                'deleted_at' => '2022-02-17 04:39:50',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Testing',
            ],
            5 => [
                'id' => 6,
                'name' => 'temp email',
                'email_subject' => 'testing from temp email',
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
<td>{Offer_Here}<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>College Overview</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $5</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 59<br />
<strong>Description</strong>: Whatever your education goals, we&rsquo;re here to find the right fit for you.<br />
<br />
Conversion point happens once a school has been matched and user submits information to matched school. Publishers get paid out per school submission.<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
Must have physical address: 9490 S. 300 S. #120 Sandy, UT 84070.<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.collegeoverview.com" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Choose Your Education</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $10</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 687<br />
<strong>Description</strong>: Your Life... Your Education... Your Choice!<br />
<br />
NO WEEKEND DROPS!<br />
<br />
Adv UnSub Link: http://submit.unsub-revolutionarymedia.net/unsub/oLCEctbtcBQKGgLphuNd8QIylYFNGxoTF5AKM0oUV7aedxuOBbrDbjAStJepoFAp<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
CONVERSION POINT: Lead converts after successful submission per brand.<br />
Up to 3x per school matched.<br />
<br />
Refrain from using &ldquo;Online Degree Program&rdquo;, as we also offer campus-based programs. You may use&ldquo;program of interest&rdquo;.<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="http://chooseyoureducation.com/home/campaign" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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

<p style="text-align: center;">If you no longer wish to receive our emails, please <a href="https://dev.netiquetteads.com/unsubscribe?id={ID}&amp;type={AcctType}">unsubscribe here</a><br />
4327 S Hwy 27, Suite 423, Clermont FL, USA, 34711, USA<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>',
                'subs' => null,
                'unsubs' => null,
                'opens' => null,
                'created_at' => '2022-01-19 21:02:20',
                'updated_at' => '2022-02-17 04:39:50',
                'deleted_at' => '2022-02-17 04:39:50',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            6 => [
                'id' => 7,
                'name' => 'Owen Testing Wed Jan 19th',
                'email_subject' => 'Owen Testing Wed Jan 19th',
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
<p>Testing this out</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Choose Your Education</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $10</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 687<br />
<strong>Description</strong>: Your Life... Your Education... Your Choice!<br />
<br />
NO WEEKEND DROPS!<br />
<br />
Adv UnSub Link: http://submit.unsub-revolutionarymedia.net/unsub/oLCEctbtcBQKGgLphuNd8QIylYFNGxoTF5AKM0oUV7aedxuOBbrDbjAStJepoFAp<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
CONVERSION POINT: Lead converts after successful submission per brand.<br />
Up to 3x per school matched.<br />
<br />
Refrain from using &ldquo;Online Degree Program&rdquo;, as we also offer campus-based programs. You may use&ldquo;program of interest&rdquo;.<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="http://chooseyoureducation.com/home/campaign" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>iTC Hybrid Program (INCENT)</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $1</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 711<br />
<strong>Description</strong>: Get Paid for your Opinion<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Surveys/Samples<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://itrafficcenter.com/survey/2/test" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-20 00:32:56',
                'updated_at' => '2022-02-17 04:39:50',
                'deleted_at' => '2022-02-17 04:39:50',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            7 => [
                'id' => 8,
                'name' => 'open email',
                'email_subject' => 'testing email for open',
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
                'created_at' => '2022-01-20 11:14:13',
                'updated_at' => '2022-01-20 11:52:42',
                'deleted_at' => '2022-01-20 11:52:42',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            8 => [
                'id' => 9,
                'name' => 'open email',
                'email_subject' => 'testing email for open',
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
<td>{Offer_Here}<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>College Overview</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $5</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 59<br />
<strong>Description</strong>: Whatever your education goals, we&rsquo;re here to find the right fit for you.<br />
<br />
Conversion point happens once a school has been matched and user submits information to matched school. Publishers get paid out per school submission.<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
Must have physical address: 9490 S. 300 S. #120 Sandy, UT 84070.<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.collegeoverview.com" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Choose Your Education</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $10</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 687<br />
<strong>Description</strong>: Your Life... Your Education... Your Choice!<br />
<br />
NO WEEKEND DROPS!<br />
<br />
Adv UnSub Link: http://submit.unsub-revolutionarymedia.net/unsub/oLCEctbtcBQKGgLphuNd8QIylYFNGxoTF5AKM0oUV7aedxuOBbrDbjAStJepoFAp<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
CONVERSION POINT: Lead converts after successful submission per brand.<br />
Up to 3x per school matched.<br />
<br />
Refrain from using &ldquo;Online Degree Program&rdquo;, as we also offer campus-based programs. You may use&ldquo;program of interest&rdquo;.<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="http://chooseyoureducation.com/home/campaign" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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

<p style="text-align: center;">If you no longer wish to receive our emails, please <a href="https://dev.netiquetteads.com/unsubscribe?id={ID}&amp;type={AcctType}">unsubscribe here</a><br />
4327 S Hwy 27, Suite 423, Clermont FL, USA, 34711, USA<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>',
                'subs' => null,
                'unsubs' => null,
                'opens' => null,
                'created_at' => '2022-01-20 11:53:29',
                'updated_at' => '2022-02-17 04:39:51',
                'deleted_at' => '2022-02-17 04:39:51',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            9 => [
                'id' => 10,
                'name' => 'PHILLIP TEST #1',
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
<p>testing that this email is working correctly</p>
</td>
</tr>
<tr>
<td>{Offer_Here}<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>ViewForeclosureHomes.com</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $2</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 70<br />
<strong>Description</strong>: Affordable Foreclosures in your Area!<br />
<br />
NO NEW DROPS SATURDAY THROUGH SUNDAY<br />
US ONLY<br />
EMAIL ONLY unless you have approval for other types<br />
NO Google/Bing Search or Display<br />
NO Network Rebrokering<br />
Accepted Traffic Types: Email (display, social and path on approval only)<br />
<br />
REQUIRED: Mask ALL domains<br />
<br />
Unsub URL: http://www.snoptout.com/o-nzts-f22-d804778b54cd35f98ff4274da194a4a6<br />
<br />
MANDATORY - Scrub your lists against the Domain DNE and Email DNE. This list is updated daily<br />
<br />
Physical Opt Out: PO Box 4120 Portland, OR, 97208-4120<br />
<br />
Accepted Countries: US<br />
<br />
Note: The page is mobile optimized, but mobile leads are at a variable rate due to differences in the mobile vs desktop funnels. The mobile leads fire pixels in real time within your account, but they have more filters than desktop leads.<br />
<br />
Conversion Point: 3rd page submit<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Finance<br />
<strong>Countries Accepted:</strong> </span><br />
<br />
<a href="https://www.viewforeclosurehomes.com" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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

<p style="text-align: center;">If you no longer wish to receive our emails, please <a href="https://dev.netiquetteads.com/unsubscribe?id={ID}&amp;type={AcctType}">unsubscribe here</a><br />
4327 S Hwy 27, Suite 423, Clermont FL, USA, 34711, USA<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>',
                'subs' => null,
                'unsubs' => null,
                'opens' => null,
                'created_at' => '2022-01-20 19:30:29',
                'updated_at' => '2022-02-17 04:39:51',
                'deleted_at' => '2022-02-17 04:39:51',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            10 => [
                'id' => 11,
                'name' => 'Test Jan 20th',
                'email_subject' => 'Test Jan 20th',
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
<p>Testing the emailer, Jan 20th whats up.<br />
<br />
Looking for new Offers.<br />
<br />
Yes we are</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>College Allstar (A)</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: 0%</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 7<br />
<strong>Description</strong>: Let us help you find a school and you may qualify for financial aid<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
Guidelines for ad placements:<br />
&bull; The main guidelines are to make sure the EDU message is first. We can mention financial aid in the content of an email or display ad, but we need to lead with EDU. I.e. Earn your degree and you may qualify for financial aid.<br />
&bull; Email &ldquo;From&rdquo; and &ldquo;Subject&rdquo; lines can use different verbiage, but CAN NOT use language that includes: Financial Aid/scholarships, Promised job opportunities or salary, &ldquo;Career(s),&rdquo; School brand names, or incentivized offers (free laptops or gift card) - Approved subject line examples are: Pursue your dream by earning your degree, Find the right college for your degree today, Get the education that fits your interests, Flexible degree programs for working professionals - Start Today.<br />
&bull; No sense of urgency&mdash;we need to avoid words like notification, notice, limited time, funds are limited, etc. Anything that suggests that the user may &lsquo;miss out&rsquo; on the opportunity.<br />
&bull; The schools are also sensitive to superlatives like &ldquo;top&rdquo; schools or &ldquo;best&rdquo; programs.<br />
&bull; Not Allowed: NO Incentivized, NO Classified Ads, NO SMS, NO Tradename Bidding, NO Co-Registration, NO Adult traffic<br />
<br />
CONVERSION POINT: Converts on the selection of a school and the successful submission of the lead<br />
<br />
THIS OFFER PAYS NET60<br />
<br />
Physical Address Must be used Address: 700 SW 78th Ave, Suite 101, Plantation, FL 33324<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> </span><br />
<br />
<a href="https://www.collegeallstar.com/collegefunnel/" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Vocalyz - US</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $2</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 864<br />
<strong>Description</strong>: Allowed Media Types: All Media Types Allowed EXCEPT INCENT AND ADULT<br />
<br />
THIS OFFER PAYS NET60<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Surveys/Samples<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.vocalyz.com/register" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-21 01:37:10',
                'updated_at' => '2022-02-17 04:39:51',
                'deleted_at' => '2022-02-17 04:39:51',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            11 => [
                'id' => 12,
                'name' => 'Test Lockman',
                'email_subject' => 'Test Lockman',
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
<p>Check out these great New Offers we just launched on the Network. For more information on Caps, Creatives, Traffic Sources, Promotion Methods, and General&nbsp;inquiries&nbsp;please contact your Affiliate Manager.</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Super Surveys</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $2</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 902<br />
<strong>Description</strong>: GET PAID UP TO $100 ON YOUR FIRST SURVEY!<br />
<br />
Traffic: All Except Incent, US only<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Surveys/Samples<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.super-surveys.co/" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Housing Assistance</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $2</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 933<br />
<strong>Description</strong>: Find housing assistance near you.<br />
<br />
CONVERSION POINT: Converts on form submit.<br />
<br />
Pre-pop parameters:<br />
&amp;email= email<br />
&amp;first= first name<br />
&amp;last= last name<br />
&amp;address1= address<br />
&amp;city= city<br />
&amp;state= state<br />
&amp;zip= zip code<br />
&amp;country= country<br />
&amp;phone= phone number<br />
&amp;gender= gender<br />
&amp;dobmonth= birth month<br />
&amp;dobday= birth day<br />
&amp;dobyear= birth year<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Finance<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-21 01:43:15',
                'updated_at' => '2022-02-17 04:39:51',
                'deleted_at' => '2022-02-17 04:39:51',
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            12 => [
                'id' => 13,
                'name' => 'New Offer Alert - Sunday January 23rd 2022',
                'email_subject' => 'New Offer Alert - Sunday January 23rd 2022',
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
<p>Check out these great New Offers we just launched on the Network. For more information on Caps, Creatives, Traffic Sources, Promotion Methods, and General&nbsp;inquiries&nbsp;please contact your Affiliate Manager.</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Green Roads CBD (EMAIL)</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $23</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 926<br />
<strong>Description</strong>: Offer Qualifications:<br />
Direct Email Traffic + Other Traffic Sources OK!<br />
Age: 18+<br />
<br />
CONVERSION POINT: Valid Credit Card Submit on Unique BigCommerce Order ID<br />
<br />
Will Not pay Twice on Same Exact Order id<br />
24 Hour Gross/Unique Click Filter<br />
30 Day cookie<br />
Allowed Countries / Ship To Countries:<br />
All US (United States)<br />
American Samoa<br />
Guam<br />
Marshall Islands<br />
Federated States of Micronesia<br />
Northern Mariana Islands<br />
Palau<br />
Puerto Rico<br />
Virgin Islands, U.S.<br />
<br />
MULTIPLE LANDING PAGES AVAILABLE WILL BE SEPARATE TRACKING LINKS, CAN BE PROVIDED IF AFFILIATE REQUIRES.<br />
<br />
<strong>Category</strong>: Health &amp; Beauty<br />
<strong>Countries Accepted:</strong> US AS GU MH FM MP PW PR VI </span><br />
<br />
<a href="https://greenroads.com/" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Green Roads CBD ALL PRODUCTS (EMAIL)</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $23</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 940<br />
<strong>Description</strong>: Offer Qualifications:<br />
Direct Email Traffic + Other Traffic Sources OK!<br />
Age: 18+<br />
<br />
CONVERSION POINT: Valid Credit Card Submit on Unique BigCommerce Order ID<br />
<br />
Will Not pay Twice on Same Exact Order id<br />
24 Hour Gross/Unique Click Filter<br />
30 Day cookie<br />
Allowed Countries / Ship To Countries:<br />
All US (United States)<br />
American Samoa<br />
Guam<br />
Marshall Islands<br />
Federated States of Micronesia<br />
Northern Mariana Islands<br />
Palau<br />
Puerto Rico<br />
Virgin Islands, U.S.<br />
<br />
MULTIPLE LANDING PAGES AVAILABLE WILL BE SEPARATE TRACKING LINKS, CAN BE PROVIDED IF AFFILIATE REQUIRES.<br />
<br />
<strong>Category</strong>: Health &amp; Beauty<br />
<strong>Countries Accepted:</strong> US AS GU MH FM MP PW PR VI </span><br />
<br />
<a href="https://greenroads.com/collections/cbd-products" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Green Roads Relax Bundle</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $49</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 941<br />
<strong>Description</strong>: Offer Qualifications:<br />
Direct Email Traffic + Other Traffic Sources OK!<br />
Age: 18+<br />
<br />
CONVERSION POINT: Valid Credit Card Submit on Unique BigCommerce Order ID<br />
<br />
Will Not pay Twice on Same Exact Order id<br />
24 Hour Gross/Unique Click Filter<br />
30 Day cookie<br />
<br />
Allowed Countries / Ship To Countries:<br />
Guam<br />
Palau<br />
Puerto Rico<br />
U.S. Minor Outlying Islands<br />
United States<br />
<br />
MULTIPLE LANDING PAGES AVAILABLE, WILL BE SEPARATE TRACKING LINKS, CAN BE PROVIDED IF AFFILIATE REQUIRES.<br />
<br />
<strong>Category</strong>: Health &amp; Beauty<br />
<strong>Countries Accepted:</strong> US GU PW PR UM CA </span><br />
<br />
<a href="https://greenroads.com/collections/cbd-products" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-23 14:15:18',
                'updated_at' => '2022-01-23 14:15:26',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Affiliates',
            ],
            13 => [
                'id' => 14,
                'name' => 'Lifepoints Now Live',
                'email_subject' => 'Lifepoints Now Live',
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
<p>Lifepoint is now live on the Network, speak with your Affiliate Manager about caps.</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Lifepoints Panel DOI [US]</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $3</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 937<br />
<strong>Description</strong>: Lifepoints is an online survey panel, operating all over the world.<br />
With over 5 million members, you can be assured they work with the most trusted and respected companies. For every web survey completed, you will earn LifePoints redeemable for rewards. They have regular survey invitations and their rewards are one of the best in the industry.<br />
<br />
CONVERSION POINT: Registration and DOI<br />
<strong>Category</strong>: Surveys/Samples<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.lifepointspanel.com/en-us/registration" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Lifepoints DOI Redirect [US]</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $2</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 938<br />
<strong>Description</strong>: Lifepoints is an online survey panel, operating all over the world.<br />
With over 5 million members, you can be assured they work with the most trusted and respected companies. For every web survey completed, you will earn LifePoints redeemable for rewards. They have regular survey invitations and their rewards are one of the best in the industry.<br />
<br />
CONVERSION POINT: Registration and DOI<br />
No Incentive, Pop Traffic, Contextual Traffic or Client-Based Software Traffic is allowed on this campaign.<br />
<strong>Category</strong>: Surveys/Samples<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.lifepointspanel.com/en-us/registration" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-24 23:14:42',
                'updated_at' => '2022-01-24 23:14:49',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Affiliates',
            ],
            14 => [
                'id' => 15,
                'name' => 'Top Offer Alert',
                'email_subject' => 'Top Offer Alert',
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
<p>Check out January&#39;s top Offer, Choose Your Education has been a top performer for a few months now, but this month we are seeing amazing results. With a New Year, more people are looking to upgrade their education.<br />
<br />
We have a limited budget on this offer, so get in touch with your Affiliate Manager today.</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Choose Your Education</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $10</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 687<br />
<strong>Description</strong>: Your Life... Your Education... Your Choice!<br />
<br />
NO WEEKEND DROPS!<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
CONVERSION POINT: Lead converts after successful submission per brand.<br />
Up to 3x per school matched.<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="http://chooseyoureducation.com/home/campaign" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-01-29 00:20:50',
                'updated_at' => '2022-01-29 00:20:56',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Affiliates',
            ],
            15 => [
                'id' => 16,
                'name' => 'Paused Offer Alert - Tuesday February 15th 2022',
                'email_subject' => 'Paused Offer Alert - Tuesday February 15th 2022',
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
<p>Please be advised that the following Offers have been paused effective immediately. Pause all live&nbsp;links for the Offers&nbsp;below as they will be redirecting at this time.</p>

<p>If you have any questions please reach out to your Account Manager.</p>

<p>Thank You.</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>iTC Daily Survey Program (INCENT)</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $1</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 710</span><br />
<br />
&nbsp;</td>
</tr>
</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>iTC Hybrid Program (INCENT)</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $1</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 711</span><br />
<br />
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
                'created_at' => '2022-02-15 23:43:15',
                'updated_at' => '2022-02-15 23:43:21',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Affiliates',
            ],
            16 => [
                'id' => 17,
                'name' => 'Phillip Test 2-23',
                'email_subject' => 'making sure sendgrid responds correctly',
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
<td>{Offer_Here}<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>College Overview</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $5</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 59<br />
<strong>Description</strong>: Whatever your education goals, we&rsquo;re here to find the right fit for you.<br />
<br />
Conversion point happens once a school has been matched and user submits information to matched school. Publishers get paid out per school submission.<br />
<br />
YOU MUST SUBMIT YOUR SUBID FOR APPROVAL WITH EACH CREATIVE, FAILURE TO COMPLY WILL RESULT IN NON-PAYMENT<br />
CAN-SPAM COMPLIANCE REQUIREMENT: YOU MUST INCLUDE YOUR OWN UNSUB LINK AND OPT-OUT ADDRESS IN ADDITION TO THE ADVERTISER&#39;S.<br />
<br />
Must have physical address: 9490 S. 300 S. #120 Sandy, UT 84070.<br />
<br />
The following persons/companies and their aliases are Blacklisted and NOT allowed to run our offers:<br />
Your Great Choice - Keisha Flanigan &amp; Marie Murphy<br />
Finance Summit - Shane Langley &amp; Arpna Bhalla<br />
Travelmindsets - Shane Langley &amp; John Knoll<br />
AllFreeTrial - Dehua Wang as Nicholas Arden<br />
Jun Ouyang as Derek Schyvinck<br />
Matthew Oldt/Flipline<br />
Free Samples Plan - Lisa Zhou &amp; Tao Jiang<br />
<br />
<strong>Category</strong>: Education<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.collegeoverview.com" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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

<p style="text-align: center;">If you no longer wish to receive our emails, please <a href="https://dev.netiquetteads.com/unsubscribe?id={ID}&amp;type={AcctType}">unsubscribe here</a><br />
4327 S Hwy 27, Suite 423, Clermont FL, USA, 34711, USA<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>',
                'subs' => null,
                'unsubs' => null,
                'opens' => null,
                'created_at' => '2022-02-23 22:45:39',
                'updated_at' => '2022-02-23 22:45:39',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Dev',
            ],
            17 => [
                'id' => 18,
                'name' => 'Phillip Test 2-23 #2',
                'email_subject' => 'Phillips Test For Sendgrid Response #2',
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
                'created_at' => '2022-02-23 23:09:12',
                'updated_at' => '2022-02-23 23:09:12',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            18 => [
                'id' => 19,
                'name' => 'Phillip Test 2-23 #3',
                'email_subject' => 'Phillips Test For Sendgrid Response #3',
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
                'created_at' => '2022-02-23 23:19:07',
                'updated_at' => '2022-02-23 23:19:08',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            19 => [
                'id' => 20,
                'name' => 'Phillip Test 2-23 #4',
                'email_subject' => 'Phillips Test For Sendgrid Response #4',
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
                'created_at' => '2022-02-23 23:19:50',
                'updated_at' => '2022-02-23 23:19:50',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            20 => [
                'id' => 21,
                'name' => 'Phillip Test 2-23 #5',
                'email_subject' => 'Phillips Test For Sendgrid Response #5',
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
                'created_at' => '2022-02-23 23:20:15',
                'updated_at' => '2022-02-23 23:20:15',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            21 => [
                'id' => 22,
                'name' => 'Phillip Test 2-23 #6',
                'email_subject' => 'Phillips Test For Sendgrid Response #6',
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
                'created_at' => '2022-02-23 23:20:36',
                'updated_at' => '2022-02-23 23:20:36',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Single Email',
            ],
            22 => [
                'id' => 23,
                'name' => 'Phillip Test 2-23 #1 Testing Sent',
                'email_subject' => 'Phillips Test For Sendgrid Response #1 Testing Sent',
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
                'created_at' => '2022-02-23 23:22:10',
                'updated_at' => '2022-02-23 23:22:10',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Testing',
            ],
            23 => [
                'id' => 24,
                'name' => 'Phillip Test 2-23 #1 Dev Sent',
                'email_subject' => 'Phillips Test For Sendgrid Response #1 Dev Sent',
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
                'created_at' => '2022-02-23 23:22:39',
                'updated_at' => '2022-02-23 23:22:39',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Dev',
            ],
            24 => [
                'id' => 25,
                'name' => 'February\'s Top Offer',
                'email_subject' => 'February\'s Top Offer',
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
<p>In case you didn&#39;t know this is our top offer this month with a Conversion Rate of 9% This Offer is killing it and we have a large cap so wanted to make sure you are not missing out.<br />
<br />
All Traffic is welcome except INCENT.</p>
</td>
</tr>
<tr>
<td><br />
<offers>
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
<tbody>
<tr>
<td>
<p><span style="font-size:26px;"><strong>Housing Assistance</strong></span></p>
<span style="border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
vertical-align:baseline;background-color:#E81D26;padding:2px 4px;"><font color="white">Payout: $3</font> </span><br />
<span style="color:#white;font-size:12px;"><strong>Offer Id</strong>: 907<br />
<strong>Description</strong>: FIND HOUSING ASSISTANCE NEAR YOU!<br />
Traffic: All Except Incent, US only<br />
<strong>Category</strong>: Finance<br />
<strong>Countries Accepted:</strong> US </span><br />
<br />
<a href="https://www.housingassistanceforyou.com/" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Preview</a> <a href="https://netiquetteads.everflowclient.io/login" style="color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;">Get Links</a><br />
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
                'created_at' => '2022-02-24 01:04:29',
                'updated_at' => '2022-02-24 01:04:35',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Affiliates',
            ],
            25 => [
                'id' => 26,
                'name' => 'testing email tapas',
                'email_subject' => 'testing email for SG',
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
                'created_at' => '2022-02-24 08:01:47',
                'updated_at' => '2022-02-24 08:01:47',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Dev',
            ],
            26 => [
                'id' => 27,
                'name' => 'new testing email with sg api on server',
                'email_subject' => 'new testing email with sg api on server',
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
                'created_at' => '2022-02-24 13:47:52',
                'updated_at' => '2022-02-24 13:47:52',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Dev',
            ],
            27 => [
                'id' => 28,
                'name' => 'Out Of Office',
                'email_subject' => 'Publisher Consultant Out Of Office',
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
<p>Regarding the current invasion of Ukraine, we would like to make the following statement:</p>

<p>Netiquette Ads stands with Ukraine;&nbsp;we do NOT support the Russian Invasion.</p>

<p>Some of our team members, their families and friends, as well as some of our partners are based in&nbsp;Ukraine and are currently focused on survival and trying to remain safe.</p>

<p>Until the situation is stabilized, <strong>all affiliates/publishers should reach out to caryn@netiquetteads.com or support@netiquetteads.com</strong> for immediate assistance as your dedicated Publisher Consultant will not be available for the time being.</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
</td>
</tr>
<tr>
<td>&nbsp;</td>
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

<p style="text-align: center;">4327 S Hwy 27, Suite 423, Clermont FL, USA, 34711, USA<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>',
                'subs' => null,
                'unsubs' => null,
                'opens' => null,
                'created_at' => '2022-03-02 09:30:02',
                'updated_at' => '2022-03-02 09:30:09',
                'deleted_at' => null,
                'campaign_offer_id' => null,
                'selected_template_id' => null,
                'send_to' => 'Affiliates',
            ],
        ]);
    }
}
