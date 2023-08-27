<?php
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mobile = $_POST['mobile'];

$Age = $_POST['Age'];
$gender = $_POST['gender'];
$sstate = $_POST['sstate'];
$pincode= $_POST['pincode'];
$addr = $_POST['addr'];

$edu = $_POST['edu'];
$university = $_POST['university'];
$field = $_POST['field'];
$job = $_POST['job'];
$passingyr = $_POST['passingyr'];



// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'survey');
if ($conn->connect_error) {
  die("Connection Failed : " . $conn->connect_error);
} else {
  


  $stmt = $conn->prepare("INSERT INTO information(email, fname,lname, mobile, gender, sstate, pincode, addr, edu, university, field, job, passingyr) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssssssssss",$email,$fname,$lname, $mobile, $gender, $sstate, $pincode, $addr, $edu, $university, $field, $job, $passingyr);
  
  
  if ($stmt->execute()) { 
    echo "<script> location.href='index.html' </script>";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
