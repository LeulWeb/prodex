<?php
require_once('../service/con.php');
session_start();
$user_id = intval($_SESSION["uid"]);

$sql = "SELECT * FROM project WHERE uid = '$user_id'";
$response = mysqli_query($conn, $sql);

$counter = 0;
while ($row = mysqli_fetch_assoc($response)) {
    $counter = $counter + 1;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>

    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 3px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #E98D30;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #000;
            border-radius: 5px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #000;
        }

        .cc:nth-child(even) {
            color: rgb(255, 255, 255);
            background-color: black;
        }

        .lg {
            background-color: red;
        }

        .delt {
            background-color: red;
            display: flex;
            justify-content: center;
            font-size: 18px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <main class="grid grid-cols-2 overflow-hidden h-screen">

        <section class="grid grid-cols-1  m-12 h-[100%] overflow-auto">
            <div class="flex justify-between my-3 items-center mr-2">
                <p class="font-bold text-3xl mb-4">Your projects <?php
                                                                    echo "(" . $counter . ")"; ?> </p>

            </div>
            <?php
            $sql = "SELECT * FROM project WHERE uid = '$user_id'";
            $response = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($response)) { ?>

                <div class="rounded-md  my-12 shadow-lg shadow-[#E98D30] p-2 grid place-content-center min-h-[40vh] cc hover:animate-pulse">
                    <img src="<?php echo  $row["logo"] != null ? $row["logo"]  : "../Logos/placeholder.jpeg"  ?>" alt="">
                    <p class="font-bold text-xl uppercase"> <?php echo $row["title"]; ?> </p>
                    <p class="font-light text-lg py-2">
                        <?php echo  $row["description"]; ?>
                    </p>
                    <p>
                        <?php echo  $row["created_at"] ?>
                    </p>
                    <p>
                        Deadline Date: <?php echo $row["dead_line"]; ?>
                    </p>

                    <p class="font-bold text-xl">
                        <?php
                        $date1 = $row["created_at"];
                        $date2 = $row["dead_line"];

                        // Convert the dates to timestamps
                        $timestamp1 = strtotime($date1);
                        $timestamp2 = strtotime($date2);

                        // Calculate the difference between the two timestamps
                        $diff_seconds = abs($timestamp2 - $timestamp1);
                        $diff_days = floor($diff_seconds / (60 * 60 * 24));

                        // Output the result
                        echo "$diff_days days left"; ?>
                    </p>

                    <p>
                        Status: <?php echo $row["status"] ?>
                    </p>

                   

                    <div class="bg-red-500 w-5 h-5 delt fl">
                        <?php
                        echo '<a class="del" href="?delete=' . $row['id'] . '">Delete</a></li>';
                        ?>
                    </div>

                </div>
            <?php }  ?>
        </section>

        <!-- Adding new project -->

        <div class=" h-screen  bg-black text-white  overflow-hidden flex justify-center items-center relative">
            <section>
                <pre class="font-bold text-3xl">Do you have,new project?</pre>
                <p>Fill in the following information to add a new project.</p>
                <form action="./add_project.php" method="POST" enctype="multipart/form-data">
                    <!-- title -->
                    <label class="flex items-center space-x-2 mt-7">
                        <iconify-icon width="20" icon="mdi:user" style="color: white;"></iconify-icon>
                        <div class="flex items-center space-x-5">
                            <span class="w-20">Title</span>
                            <input type="text" class="bg-transparent border border-white outline-none rounded-md p-2" name="title" required>
                        </div>
                    </label>

                    <!-- Description -->
                    <label class="flex items-center space-x-2 mt-3">
                        <iconify-icon width="20" icon="mdi:user" style="color: white;"></iconify-icon>
                        <div class="flex items-center space-x-5">
                            <span class="w-20">Description</span>
                            <textarea type="text" class="bg-transparent border border-white outline-none rounded-md p-2" name="description" required></textarea>
                        </div>
                    </label>

                    <input hidden type="text" value="<?php echo $user_id; ?>" name="uid">

                    <label class="flex items-center space-x-2 mt-7">
                        <iconify-icon width="20" icon="mdi:user" style="color: white;"></iconify-icon>
                        <div class="flex items-center space-x-5">
                            <span class="w-20">Status</span>
                            <input type="text" class="bg-transparent border border-white outline-none rounded-md p-2" name="status" required>
                        </div>
                    </label>

                    <!-- Dead line -->
                    <label class="flex items-center space-x-2 mt-3">
                        <iconify-icon width="20" icon="mdi:user" style="color: white;"></iconify-icon>
                        <div class="flex items-center space-x-5">
                            <span class="w-20">Dead Line</span>
                            <input type="date" class="bg-transparent border border-white outline-none rounded-md p-2" name="dead_line" required>
                        </div>
                    </label>
                    <label class="flex items-center space-x-2 mt-3">
                        <iconify-icon width="20" icon="mdi:user" style="color: white;"></iconify-icon>
                        <div class="flex items-center space-x-5">
                            <span class="w-20">Logo</span>
                            <input type="file" class="bg-transparent border border-white outline-none rounded-md p-2" name="logo">
                        </div>
                    </label>
                    <input type="submit" class="py-2 bg-[#E98D30] font-bold text-lg w-full mt-7 rounded-md shadow-md " name="submit" value="Add Project">



                    <a class="py-2 absolute bottom-0 left-0  bg-red-500  font-bold text-lg w-full mt-7 text-center shadow-md lg" href="handle_logout.php">Logout</a>
                </form>
            </section>
        </div>
    </main>


</body>

</html>


<?php



if (isset($_GET['delete'])) {
    // Sanitize the ID parameter
    $id = mysqli_real_escape_string($conn, $_GET['delete']);

    echo $id;

    // Construct the delete query
    $sql = "DELETE FROM project WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Deleted Successfully";
        // header("Location: dashboard.php");
        // exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}




?>