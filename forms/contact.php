
<!--   
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'agrimsharma1995@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();

//...............................................................................................................
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//   $name = $_POST['name'];
//   $email = $_POST['email'];
//   $subject = $_POST['subject'];
//   $message = $_POST['message'];
  
//   $errors = array();

//   // Validate name
//   if(empty($name)){
//       $errors[] = "Name field is required";
//   }

//   // Validate email
//   if(empty($email)){
//       $errors[] = "Email field is required";
//   } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//       $errors[] = "Invalid email format";
//   }

//   // Validate subject
//   if(empty($subject)){
//       $errors[] = "Subject field is required";
//   }

//   // Validate message
//   if(empty($message)){
//       $errors[] = "Message field is required";
//   }

//   // If there are no errors, proceed with sending email
//   if(empty($errors)){
//       // Your email sending code here
//       // For example, using PHP's mail() function
//       $to = "agrimsharma1995@gmail.com";
//       $headers = "From: $name <$email>" . "\r\n";
//       $headers .= "Reply-To: $email" . "\r\n";
//       $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

//       $mailBody = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";

//       mail($to, $subject, $mailBody, $headers);

//       echo '<div class="alert alert-success">Your message has been sent. Thank you!</div>';
//   } else {
//       // Output errors
//       foreach($errors as $error){
//           echo '<div class="alert alert-danger">'.$error.'</div>';
//       }
//   }
// }

//.................................................................................................................. -->

<?php
// Cross-Origin Resource Sharing (CORS) Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Retrieve form data
$name = $_POST["name"];
$email = $_POST["email"];
// $email = $_POST["email"];
echo $email;
$subject = $_POST["subject"];
$message = isset($_POST["message"]) ? $_POST["message"] : "";



// Compose Email Message without Attachment
$headers = "From: $name <$email> \r\n";
$headers .= "Reply-To: $email \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$body = "
<html>
<head>
    <style>
        label { font-weight: bold; color:black }
    </style>
</head>
<body>
    <label><b>Name:</b></label> $name <br>
    <label><b>Email:</b></label>  $email <br> 
    <label><b>Subject:</b></label>  $subject  <br>
    <label><b>Message:</b></label>  $message <br>

</body>
</html>
";

// Email Configuration
$to = "yadavharsha00@gmail.com";
$subject = "Enquiry Details For - $name";

// Send Email
if (mail($to, $subject, $body, $headers)) {
    echo "success";
} else {
    echo "error";
}


// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
  // Server settings (replace with your SMTP details)
  $mail->isSMTP();                        // Send using SMTP
  $mail->Host       = 'smtp.example.com'; // Set the SMTP server to send through
  $mail->SMTPAuth   = true



}
?>