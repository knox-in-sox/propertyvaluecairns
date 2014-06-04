<?php
// Grabbing data sent from the form and assigning it to variables
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

//*** Uniqid Session ***//
  $strSid = md5(uniqid(time()));
  
// Composing body of the message
$mail_to = ' emmyknox@gmail.com';
$subject = 'Report Request - ' . $field_first_name .  ' '. $field_last_name . ' - '. $field_suburb ;


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


// Creating headers of the message
$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//$mail_status = mail($mail_to, $subject, $body_message, $headers);
mail($mail_to,$subject,null, $headers);

    //AUTO REPLY		
	//$from = 'From:' .$email;	
  	$messagetostudent  = '<html><body>';
	$messagetostudent .=  "<p>Thank you for contacting us.</p>";
	$messagetostudent .=  "<p>This is an automatic email, please do not reply to this message.</p>";
	$messagetostudent .=  "<p>We will endeavour to get back to you within 48 hours, however it may take up to 5 business days, depending on the complexity of your request.</p>";	
	$messagetostudent .= "</body></html>";
		
    $headerstudent = "From: No Reply <noreply@centralsupportservice.com> \r\n" . "X-Mailer: PHP/" . phpversion();
    $headerstudent .= "MIME-Version: 1.0\r\n";
	$headerstudent .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
	$headerstudent .= "This is a multi-part message in MIME format.\n";	
	$headerstudent .= "--".$strSid."\n";
	$headerstudent .= "Content-type: text/html; charset=utf-8\n";
	$headerstudent .= "Content-Transfer-Encoding: 7bit\n\n";
    $headerstudent .= $messagetostudent."\n\n";
				
		
	$studentname = $email;
	$subjectstudent = 'Thank you for contacting us!';
		  
    mail($studentname,$subjectstudent,null, $headerstudent);
	
	//END OF AUTO REPLY				
	
    header("location: thank-you.html"); 
	
?>