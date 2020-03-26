<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_POST['update'])){
#$roll_no = $_POST['roll_no'];
#$phno = $_POST['phno'];
#$return_date = $_POST['date'];
#$comp_name = $_POST['comps'];
#$no = $_POST['count'];// Storing Selected Value In Variable
include 'db_connection.php';
$conn = OpenCon();
echo "<br>";
echo "Connected to database Successfully"."<br>";
  // Displaying Selected Value
  $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
  $phno = mysqli_real_escape_string($conn, $_POST['phno']);
  $return_date = mysqli_real_escape_string($conn, $_POST['date']);
  $comp_name = mysqli_real_escape_string($conn, $_POST['comps']);
  $no = mysqli_real_escape_string($conn, $_POST['count']);// Attempt insert query execution
  if ($no==0) {
    $no=1;// code...
  }
  $sql = "SELECT * FROM data WHERE phno='".$phno."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $sql = "INSERT INTO data (roll_no, comp_name, no, phno, return_date) VALUES ('$roll_no', '$comp_name', '$no', '$phno', '$return_date')";
    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    // code...
  }
  else {

            $temp= $phno." not verified ...";
            alert($temp);
            $rand = rand(9,99);
            #$phno=916301838078;
            $phno = $_POST['phno'];
            echo strlen($phno);
            if(strlen($phno)==10)
            {
              $phno="91".$phno;
            }
           $msg=$rand." is Your Mahesh Stores verification code";
            echo $msg;
            // $msg = urlencode($msg);
            // $url ="https://platform.clickatell.com/messages/http/send?apiKey=tTYQiO0ORcqurKzrjbfebw==&to=/$phno&content={$msg}";
            // // Initialize a CURL session.
            // $ch = curl_init();
            // // Return Page contents.
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // //grab URL and pass it to the variable.
            // curl_setopt($ch, CURLOPT_URL, $url);
            // $result = curl_exec($ch);
            // alert("OTP Sent....");
            // // echo $result;

            // if(array_key_exists('button1', $_POST)) {
            // button1($rand);
            // }
            // function button1($rand){
            // $otp = $_POST["otp"];
            // if ($rand==$otp)
            // {
            //   echo "OTP Verified";
            // }
            // else {
            //   echo $rand;
            //   echo $otp;
            //   echo "OTP not verified";
            //   // code...
            // }  }
            // if (isset($_POST['button1'])) {
            //   button1($rand);
            // }
            echo'<form method="post">';
            echo'<input type="password" placeholder="Enter otp" name="otp" required>';
            echo'<input type="submit" name="button1" value="Verify Number" />';
            echo'</form>';




    // code...



}
}
#$conn -> close();
#CloseCon($conn);
?>
