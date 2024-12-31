<?php
    $inserted =false;
   if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $conn =mysqli_connect($server,$username,$password);

    if(!$conn){
        die("Connection to Database Failed");
    }

    $name = $_POST['name'] ;
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $other = $_POST['other'];

    $sql="INSERT INTO `trip`.`pccoer_trip`( `name`, `address`, `phone`, `email`, `password`, `other`, `dt`) VALUES ('$name', '$address', '$phone', '$email', '$password', '$other',current_timestamp());";

    if($conn->query($sql)==TRUE){
        //echo("Values Inserted");
        $inserted=true;
    }else{
        //echo("Error: $conn->error");
    }
    $conn->close();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body  >
    <img src="https://www.pccoer.com/images/about-pcet.png" alt="pccoer" class="absolute object-cover w-screen h-screen -z-6  blur-sm ">
    <div class=" w-screen relative rounded-md font-serif flex flex-col justify-center items-center h-screen">
        <h1 class="text-2xl font-semibold mt-10 ">Welcome to PCCOER Travel Fun</h1>
        <p>Enter Your Details in the below Form </p>
        <?php
        if($inserted==true){
            echo("<p class='text-green-600'>Thanks For Submitting the Form. Your Response is Recorded</p>");
        }
        ?>

        
            <form action="index.php" method="post" class="flex flex-col mx-auto w-[70%]  gap-4 md:w-[30%] my-10">
                <input type="text" name="name" placeholder="Enter Name" class="h-10 rounded-md px-1">
                <input type="text" name="address" placeholder="Enter Address" class=" h-10 rounded-md px-1">
                <input type="tel" name="phone" placeholder="Enter Phone Number" class=" h-10 rounded-md px-1">
                <input type="email" name="email" placeholder="Enter Email" class=" h-10 rounded-md px-1">
                <input type="password" name="password" placeholder="Enter Password" class=" h-10 rounded-md px-1">
                <textarea name="other"  id="other" placeholder="Other Information" class=" h-14 rounded-md px-1"></textarea>
                <button type="submit" class="bg-violet-800 text-white rounded-full p-1 hover:bg-violet-700 w-[50%] mx-auto">Submit</button>
                


            </form>
        


    </div>
</body>
</html>