
<?php


session_start();


require('../service/con.php');


if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    


    if ($email != null || $email != '' && $password != null || $password != '') {

        $sql = "SELECT * FROM user WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // check the password 
            $row= mysqli_fetch_assoc($result);



            if($row["password"]== $password){
                //get the id
                $sql= "SELECT id FROM user WHERE email ='$email'";

                $res= mysqli_query($conn, $sql);
                
                $row = mysqli_fetch_assoc($res);

                $user_id= $row["id"];

               
                $_SESSION["uid"]=$user_id;

                
                header("Location: ../pages/dashboard.php");
                exit;
            }


        } else {
          echo "You are not new to ProDex";
        }
        
    }
}

mysqli_close($conn);

?>