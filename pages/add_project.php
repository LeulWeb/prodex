
<?php



require('../service/con.php');



if (isset($_POST["submit"])) {
    $uid = $_POST["uid"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $dead_line = $_POST["dead_line"];
    $status = $_POST["status"];



    if ($title != null || $title != '' && $description != null || $description != '' && $date != null || $date != '') {

        //check if the file is sent
        if ($_FILES["logo"]["size"] > 0) {

            //checking the type and size

            if ($_FILES["logo"]["type"] == "image/png" || $_FILES["logo"]["type"] == "image/jpg" || $_FILES["logo"]["type"] == "image/jpeg" && $_FILES["logo"]["size"] < 30000) {
               $isUploaded=  move_uploaded_file($_FILES["logo"]["tmp_name"], "../Logos/" . $_FILES["logo"]["name"]);

               if($isUploaded){
                $logo_path= "../Logos/".$_FILES["logo"]["name"];
               }
                
            }
        }

        $sql = "INSERT INTO project (title, description, status, dead_line, uid, logo) VALUES ('$title', '$description', '$status', '$dead_line', $uid,'$logo_path')";

        $isDone = mysqli_query($conn, $sql);

        echo $isDone;

        if ($isDone) {
            header("Location: ../pages/dashboard.php");
            exit;
        }
    }
}


?>