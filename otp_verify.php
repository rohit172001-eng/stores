<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>otp verification</title>
  </head>
  <body>
    <form  action="#" method="post">
      <input type="password" placeholder="Enter otp" name="otp" required>
      <input type="submit" name="submit" value="verify" />
    </form>

  </body>
</html>


<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
$rand = rand(99999,999999);
if (isset($_POST['otp_verify'])) {

  include 'db_connection.php';
  $conn = OpenCon();
  echo "<br>";
  echo "Connected to database Successfully"."<br>";

    // Print
    #print_r($rand);
  // From URL to get webpage contents.
$phno = $_POST['phno'];
  #$phno=916301838078;
  $msg=$rand." is Your Mahesh Stores verification code";
  echo $msg;
  #$url = "https://platform.clickatell.com/messages/http/send?apiKey=tTYQiO0ORcqurKzrjbfebw==&to=.$phno.&content=.$msg";
  #$url ="https://platform.clickatell.com/messages/http/send?apiKey=tTYQiO0ORcqurKzrjbfebw==&to=916301838078&content=hiffhfhjghjgjhghjhjvgfghcgcgcxghchjvjvjkjbjkhbkjhkhkhklhkhhkhklgkgkgklhklhjmfvfgsff";
  $msg = urlencode($msg);
  $url ="https://platform.clickatell.com/messages/http/send?apiKey=tTYQiO0ORcqurKzrjbfebw==&to=/$phno&content={$msg}";

  // Initialize a CURL session.
  $ch = curl_init();

  // Return Page contents.
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  //grab URL and pass it to the variable.
  curl_setopt($ch, CURLOPT_URL, $url);

  $result = curl_exec($ch);
  alert("OTP Sent....");
  echo $result;
}
  if(isset($_POST['submit'])){
    $otp = $_POST['otp'];
    if ($rand==$otp) {
      $text="OTP verified redirecting to Homepage..";
      alert($text);
      $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
      $phno = mysqli_real_escape_string($conn, $_POST['phno']);
      $return_date = mysqli_real_escape_string($conn, $_POST['date']);
      $comp_name = mysqli_real_escape_string($conn, $_POST['comps']);
      $no = mysqli_real_escape_string($conn, $_POST['count']);// Attempt insert query execution
      if ($no==0) {
        $no=1;// code...
      }
      $sql = "INSERT INTO data (roll_no, comp_name, no, phno, return_date) VALUES ('$roll_no', '$comp_name', '$no', '$phno', '$return_date')";
        if(mysqli_query($conn, $sql)){
            echo "Records added successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

      header("Location:home.php");
      // code...
}
    else {
      echo "OTP NOT VERIFIED";
      // code...
    }
  }

  // code...

?>
