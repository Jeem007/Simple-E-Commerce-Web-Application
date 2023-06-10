<?php
//session start
session_start();


if(isset($_POST['login'])){
//getting data
$username = $_POST['username'];
$password = $_POST['password'];
$remember = $_POST['remember'];

//cookie set
if($remember==1){
  setcookie('uname',$username,time()+60*60*24*10, "/");
}

//sql statement

$sql = "SELECT* FROM `users` where username ='$username' && password= '$password'";

//database connection

require_once('../model/connection.php');

//query

$qry = mysqli_query($conn, $sql) or die ("Login Problem");
$count =  mysqli_num_rows($qry);
if($count==1){
  //echo "Login Success";
  $_SESSION['user']=$username;
  header("Location: ../view/userdash.php");
}else{
    echo '<script>alert("!!! Please check your username and password !!!")</script>';
    echo '<script>window.location="systemlogin.php"</script>';
}

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../view/css/signin.css">
    <title>System LogIn</title>
</head>
<body>
    <div class="formcontainer" align ="center">
    <form method ="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="logo">
        <img src="../view/images/logo.png" alt="">
    </div>

    <h3 style=" color: white">E-COMMERCE WEB APPLICATION</h3>
  
       <!-- User Name -->

       <div>
        <label for="username">User Name</label>
        <i class="fas fa-user"></i>
        <input type="text" name= "username" placeholder="Enter your Username" value="<?php if(isset($_COOKIE['uname'])) echo $_COOKIE['uname'];?>" >
        </input>
       </div>
        


    <!-- Password-->

    <div>
    <label for="username">Password</label>
    <i class="fas fa-lock"></i>
    <input type="password" name= "password" placeholder="Enter your password" >
    </input>
    </div>
        

    <!-- checkbox -->
    <div>
    <label class="form_check">
        <input type="checkbox" name= "remember" value="1" class="form_tick">
        Keep me signed in
    </label>
    </div>





        <button type="submit" value="submit" name="login">LogIn</button>   

        <div>
        <p>Don't have an account ?<a href = "signup.php">SignUp</a></p>

        <p><a href="loginoption.php">More login option</a></p>
        </div>
        



        



    </div>
    <!-- <?php include('../view/footer.php');?> -->
</body>
</html>
<?php
date_default_timezone_set('Asia/Dhaka');
if(isset($_POST['login'])){
$ipaddress = $_SERVER['REMOTE_ADDR'];
$login_tym = date('d-m-Y H:i:s'); 
extract($_REQUEST);
$file = fopen("../view/txt_files/user_login_details.txt","a");
fwrite($file, "Name: ");
fwrite($file, $username. "\n");
fwrite($file, "IP Address: ");
fwrite($file,  $ipaddress. "\n");
fwrite($file, "Login time: ");
fwrite($file,  $login_tym. "\n");
fwrite($file, "--------------------------");
fwrite($file, "\n");
fclose($file);
}
?>
