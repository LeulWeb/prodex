
<?php


require('../service/con.php');


if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $password = $_POST["password"];

  if($name != null || $name != '' && $email != null || $email != '' && $phone != null || $phone != '' && $password != null || $password != ''){
     
        $sql = "SELECT email FROM user WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
              echo "This email is already taken";
        } else {
            $sql = "INSERT INTO user (name, phone, email,password)  VALUES ('$name','$phone','$email','$password')";

            $isDone = mysqli_query($conn, $sql);

            if($isDone){
              header("Location: ./login.php");
              exit;
            }
        }
  }
  
  
}

?>