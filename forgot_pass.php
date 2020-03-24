<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
 require_once 'mailer/class.phpmailer.php';
 $mail = new PHPMailer(true);
if(isset($_POST['submit'])){
  // Storing Selected Value In Variable
include 'db_connection.php';
$conn = OpenCon();
echo "<br>";
echo "Connected to database Successfully"."<br>";
$user_id = $_POST['uname'];
    $result = mysqli_query($conn,"SELECT * FROM auth where uname='" . $_POST['uname'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['uname'];
	$email_id=$row['email_id'];
	$password=$row['passwd'];
	if($user_id==$fetch_user_id) {
				$to = $email_id;
                $subject = "Forgot Password";
                $txt = "<h1><b>Hello  ".$row["uname"]."<br>"."</b></h1>Your password is : $password."."<br>"."Click here to login  : ";
                #$headers = "From: maheshstores.vr@gmail.com" . "\r\n"."CC: rohitkumarlingala17@gmail.com";
              #  $email      = strip_tags($_POST['email']);
   #$subject    = strip_tags($_POST['subject']);
   #$text_message    = "Hello";
   #$message  = strip_tags($_POST['message']);
 try
   {
    $mail->IsSMTP();
    $mail->isHTML(true);
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port        = '465';
    $mail->AddAddress($email_id);
    $mail->Username   ="maheshstores.vr@gmail.com";
    $mail->Password   ="Ece@acumen";
    $mail->SetFrom('maheshstores.vr@gmail.com','Mahesh store admins');
    $mail->AddReplyTo('maheshstores.vr@gmail.com','Mahesh store admins');
    $mail->Subject    = $subject;
    $mail->Body    = $txt;
    $mail->AltBody    = $txt;

    if($mail->Send())
    {

     $msg = "Hi, Your mail successfully sent to : ".$email_id." ";
     echo $msg;
     #echo "<script>alert(mail sent)</script>";
     alert($msg);
     #header("Location:index.php");
     header( "Refresh:3; url=index.php", true, 303);

    }
    else {
      echo "Mail not sent";
      // code...
    }
   }
   catch(phpmailerException $ex)
   {
    $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
   }

			}
				else{
					echo 'invalid userid';
				}



}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Forgot password</title>
   </head>
   <body>
     <form  action="#" method="post">
       <label for="uname"><b>Username  :  </b></label>
         <input type="text" placeholder="Enter Username" name="uname" required>
         <input type="submit" name="submit" value="Get Mail" />
     </form>
   </body>
 </html>
