<?php 
    // connecting our database with php

    $conn = mysqli_connect("localhost","root","","prodex");

    if(!$conn){
        die("Error connecting to database "+ mysqli_connect_error());
    }

        
?>