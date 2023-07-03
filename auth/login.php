<?php



// include_once('../util/tail.php');
include_once('../nav.php');



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <section class="w-screen h-screen bg-no-repeat flex justify-center items-center bg-global bg-cover bg-center">
        <div class="bg-black text-white border border-[#E98D30] w-5/12 mx-auto p-5 rounded-md shadow-md ring-offset-2">
            <div class="flex items-center  space-x-6">
                <p class="font-bold text-4xl bg-white-700">Continue your journey</p>
                <iconify-icon width="40" icon="material-symbols:conversion-path" style="color: white;"></iconify-icon>
            </div>
            <p class="font-light text-lg my-2">
                Track you progress with ease
            </p>

            <form class="py-2 grid grid-cols-1 place-content-start gap-3" action="./handle_login.php" method="POST">

                <!-- Email -->
                <label class="flex items-center space-x-2">
                    <iconify-icon width="20" icon="ic:outline-email" style="color: white;"></iconify-icon>
                    <div class="flex items-center space-x-5">
                        <span class="w-20">Email</span>
                        <input type="email" class="bg-transparent border border-white outline-none rounded-md p-2" name="email">
                    </div>
                </label>


                <!-- password -->
                <label class="flex items-center space-x-2">
                    <iconify-icon width="20" icon="carbon:password" style="color: white;"></iconify-icon>
                    <div class="flex items-center space-x-5">
                        <span class="w-20">Password</span>
                        <input type="password" class="bg-transparent border border-white outline-none rounded-md p-2" name="password">
                    </div>
                </label>

                <input class="bg-[#E98D30] py-2 w-full mt-5 text-xl fold rounded-md shadow-md" type="submit" value="Login" name="submit">

                <p class="text-center mx-auto">New to ProDex, <span class="text-blue-500 font-bold text-md">
                        <a href="http://localhost/prodex/auth/signup.php">Register</a>
                    </span></p>
            </form>
        </div>
    </section>
</body>

</html>