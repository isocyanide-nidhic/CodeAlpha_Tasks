<?php
$F_USERNAME = $_POST['F_USERNAME'];
$F_PASWD = $_POST['F_PASWD'];

$conn = new mysqli('localhost', 'root', '', 'account',3306);
if($conn->connect_error){
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from details where F_USERNAME=?");
    $stmt->bind_param("s",$F_USERNAME);
    $stmt->execute();
   
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['F_PASWD']==$F_PASWD){
            
            echo'<script> alert(" Dear User, Login Successful !! "); alert(" Thank You "); location.href="index.html"</script>';
        }
        else{
            echo '<script>alert("invalid username and password Please Try again"); location.href="index.html";</script>';
        }
    }else{
        echo '<script>alert("invalid username and password Please Try again"); location.href="index.html"</script>';
    }

}
?>