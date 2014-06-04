<?php
  // send mail to
  $mail_to = 'info@propertyvaluecairns.com.au';
  //*** Uniqid Session ***//
  $strSid = md5(uniqid(time()));

//form data
$field_first_name = $_POST['firstname'];
$field_last_name = $_POST['lastname'];
$field_phone = $_POST['phone'];
$field_email = $_POST['email'];
$field_address = $_POST['address'];
$field_suburb = $_POST['suburb'];
$field_landize = $_POST['landsize'];
$field_additional = $_POST['additional'];
$drop_property_type = $_POST['property_type'];
$drop_bedrooms = $_POST['bedrooms'];
$drop_bathrooms = $_POST['bathrooms'];
$drop_renovations = $_POST['renovations'];
$drop_condition = $_POST['condition'];
$drop_purpose = $_POST['purpose'];
$drop_iam = $_POST['iam'];

// subject
$subject = 'Report Request - ' . $field_first_name .  ' '. $field_last_name . ' - '. $field_suburb ;
 
 // create message

$body_message = '<html><body>';
$body_message .= '<table rules="all" style="border-color: #666;" width="700px;" cellpadding="10">';

$body_message .= "<tr style='background: #eee;'>
    <td><strong>First Name:</strong></td>
    <td><strong>Last name:</strong></td>
    <td><strong>Email address:</strong></td>
    <td><strong>Phone number:</strong></td>
  </tr>
  <tr>
    <td>" . strip_tags($_POST['firstname']) . "</td>
    <td>" . strip_tags($_POST['lastname']) . "</td>
    <td>" . strip_tags($_POST['email']) . "</td>
    <td>" . strip_tags($_POST['phone']) . "</td>
  </tr>
  <tr style='background: #eee;'>
    <td><strong>Property address:</strong></td>
    <td><strong>Property suburub:</strong></td>
    <td><strong>Property type:</strong></td>
    <td><strong>Condition of property:</strong></td>
  </tr>
  <tr>
    <td>" . strip_tags($_POST['address']) . "</td>
    <td>" . strip_tags($_POST['suburb']) . "</td>
    <td>" . strip_tags($_POST['property_type']) . "</td>
    <td>" . strip_tags($_POST['condition']) . "</td>
  </tr>
  <tr style='background: #eee;'>
    <td><strong>Renovations done:</strong></td>
    <td><strong>Land size:</strong></td>
    <td><strong>No. bedrooms:</strong></td>
    <td><strong>No. bathrooms:</strong></td>
  </tr>
  <tr>
    <td>" . strip_tags($_POST['renovations']) . "</td>
    <td>" . strip_tags($_POST['landsize']) . "</td>
    <td>" . strip_tags($_POST['bedrooms']) . "</td>
    <td>" . strip_tags($_POST['bathrooms']) . "</td>
  </tr>
  <tr style='background: #eee;'>
    <td><strong>I am:</strong></td>
    <td><strong>Purpose of report:</strong></td>
    <td colspan='2'><strong>Additional information:</strong></td>
  </tr>
  <tr>
    <td>" . strip_tags($_POST['iam']) . "</td>
    <td>" . strip_tags($_POST['purpose']) . "</td>
    <td colspan='2'>" . strip_tags($_POST['additional']) . "</td>
  </tr>";
$body_message .= "</table>";
$body_message .= "</body></html>";


//Updated Headers
$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
$headers .= "This is a multi-part message in MIME format.\n";
$headers .= "--".$strSid."\n";
$headers .= "Content-type: text/html; charset=utf-8\n";
$headers .= "Content-Transfer-Encoding: 7bit\n\n";
 $headers .= $body_message."\n\n";
 
//$mail_status = mail($mail_to, $subject, $body_message, $headers);

mail($mail_to,$subject,null, $headers);

    //AUTO REPLY		
	//$from = 'From:' .$email;	
  	$messagetostudent  = "<html><body>";
	$messagetostudent .= "<img src='http://www.propertyvaluecairns.com.au/images/email_banner.gif'>";
	$messagetostudent .=  "<p>Dear " .$field_first_name. " ,</p>";
	$messagetostudent .=  "<p>Thank you for your free report request from Property Value Cairns.</p>";
	$messagetostudent .=  "<p>We will begin researching your report immediately and have allocated a professional Real Estate Agent with local knowledge to complete your report. Your local expert will send the report to you very shortly.</p>";
	$messagetostudent .=  "<p>We want to ensure that your experience with Property Value Cairns is positive, so should you have any queries or feedback regarding the service, please do not hesitate to reply to this email. </p>";	
	$messagetostudent .=  "<p>We will be in contact soon.</p>";
	$messagetostudent .=  "<p>Yours sincerely,</p><p></p>";
	$messagetostudent .=  "<p>Property Value Cairns</p>";
	$messagetostudent .= "</body></html>";
		
    $headerstudent = "From: Property Value Cairns <info@propertyvaluecairns.com.au> \r\n" . "X-Mailer: PHP/" . phpversion();
    $headerstudent .= "MIME-Version: 1.0\r\n";
	$headerstudent .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
	$headerstudent .= "This is a multi-part message in MIME format.\n";	
	$headerstudent .= "--".$strSid."\n";
	$headerstudent .= "Content-type: text/html; charset=utf-8\n";
	$headerstudent .= "Content-Transfer-Encoding: 7bit\n\n";
    $headerstudent .= $messagetostudent."\n\n";
				
		
	$studentname = $field_email;
	$subjectstudent = 'Thank you for contacting us!';
		  
    mail($studentname,$subjectstudent,null, $headerstudent);
	
	//END OF AUTO REPLY				
	
    header("location: thank-you.html"); 
	
?>