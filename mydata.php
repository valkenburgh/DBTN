 <?php
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address1'];
$zip = $_POST['zip'];
$comment = $_POST['action_comment'];

//this is where the creating of the csv takes place
$cvsData = $name . "," . $email . "," . $address . "," . $zip ."\n";
$fp = fopen("data.csv","a"); // $fp is now the file pointer to file $filename

if($fp){
fwrite($fp,$cvsData); // Write information to the file
fclose($fp); // Close the file
}
?> 

<?php
 
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "pvanvalkenburgh@techfreedom.org";
    $email_subject = "Open Internet Reply Comment";
    $first_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $comment = $_POST['action_comment']; // required
    $email_message = "";
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Address: ".clean_string($address)."\n";
	$email_message .= "Zip: ".clean_string($zip)."\n\n\n";
    $email_message .= "".clean_string($comment)."\n";
	
	
	
	$address = $_POST['address1'];
$zip = $_POST['zip'];
	
	$name = $_POST['name'];
$email = $_POST['email'];

$comment = $_POST['action_comment'];
     
 // create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 
 
?>
 
<!-- include your own success html here -->
<script type="text/javascript">
            window.location.href = "thank_you.html"
        </script>
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
 
?>