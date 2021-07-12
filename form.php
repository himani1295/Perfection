<?php 
include 'connection/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Html</title>
<style>
* {box-sizing: border-box}
/* Add padding to containers */
.container {
  padding: 16px;
}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>	
</head>
<body>
<?php
$msg = "0";
$error = array();
if (isset($_POST['upload'])) {
  $fname = $_POST['ename'];
  $email = $_POST['email'];
  $psw = $_POST['psw'];

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];   
  $folder = "image/".$filename;
  // Now let's move the uploaded image into the folder: image
  if (move_uploaded_file($tempname, $folder))  {
    $msg = 1;
  }else{
    $error['image'] = "Error of image";
  }
  if (!empty($fname))  {
    $msg = 1;
  }else{
    $error['fname'] = "Error of name";
  }
  if (!empty($email))  {
    $msg = 1;
  }else{
    $error['email'] = "Error of email";
  }
  if (!empty($psw))  {
    $msg = 1;
  }else{
    $error['psw'] = "Error of psw";
  }

  if($msg == 1){
    $sql = "INSERT INTO employee (email , name, password , image , designation) VALUES ($email , $fname , $psw , $filename)";
    if ($db->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $db->error;
    }
  }
}
?>
<form method="POST" action="" enctype="multipart/form-data">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="ename"><b>Ename</b></label>
    <input type="text" placeholder="Enter Name" name="ename" id="ename" required>
    <span><?php if( isset($error['fname'])) { echo $error['fname']; } ?></span>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <span><?php if( isset($error['email'])) { echo $error['email']; } ?></span>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
    <span><?php if(isset($error['psw'])) { echo $error['psw']; } ?></span>

    <label for="ename"><b>Designation</b></label>
    <input type="text" placeholder="Enter Designation" name="designation" id="designation" required>
    
    <label for="eimage"><b>Image</b></label>
    <input type="file" name="uploadfile" id="fileToUpload" required>
    <span><?php if( isset($error['image'])) { echo $error['image']; } ?></span>
    <hr>
    <button type="submit" class="registerbtn" name="upload">Registers</button>
  </div>
</form>
</body>
</html>