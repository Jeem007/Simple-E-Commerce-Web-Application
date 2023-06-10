<?php

include("../model/connection.php");
$errors = array();
if($_SERVER["REQUEST_METHOD"]=="POST"){

    //image

    $imagename = $_FILES['uploadFile']['name'];
    $tmpname=  $_FILES['uploadFile']['tmp_name'];
    $folder = '../view/images/'.$imagename;

	

		$fullname  = mysqli_real_escape_string($conn, $_POST['fullname']);
		$username  = mysqli_real_escape_string($conn, $_POST['username']);
		$email     = mysqli_real_escape_string($conn, $_POST['email']);
		$mobile    = mysqli_real_escape_string($conn, $_POST['mobile']);
		$gender    = mysqli_real_escape_string($conn, $_POST['gender']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);

        //username existency check
		$search_query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $search_query);
		$count = mysqli_num_rows($result);
		if($count >0 ){
			$errors['username'] = "* Username  is unavailable.";

        }
        
        else{
			$sql = "INSERT INTO users (fullname, username, email, mobile, gender, image, password) VALUES ('$fullname','$username','$email','$mobile','$gender','$imagename','$password1')";
            move_uploaded_file($tmpname,$folder);
            $query = mysqli_query($conn, $sql);
			$_POST['fullname'] = '';
			$_POST['username'] = '';
			$_POST['email'] = '';
            $_POST['mobile'] = '';
			$_POST['gender'] = '';
            $_POST['password'] = '';
            
            echo '<script>alert("Successfully Registered")</script>';
            echo '<script>window.location="signup.php"</script>';
			
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
    <link rel="stylesheet" href="../view/css/signup.css">
    <title>User SignUp</title>

</head>
<body>
    <div class="form_container" align ="center">
    <form name="signupData" method ="post" onsubmit="return validateForm()" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h3 style="color: white;">Sign Up</h3>

        <!-- Full Name -->

        <div>
        <label for="fullname">Full Name</label>
        <i class="fas fa-user"></i>
        <input type="text" name= "fullname" id="fullname" placeholder="Enter your Full Name" >
        </input>
        <p id="fname"></p>
        </div>

        <!-- User Name -->
        <div>
        <label for="username">User Name</label>
        <i class="fas fa-user-circle"></i>
        <input type="text" name="username" placeholder="Enter your Username" >
        </input>
        <?php if(isset($errors['username'])){echo "<p>" .$errors['username']. "</p>"; } ?>
        <p id="uname"></p>
        </div>
        

        <!-- Email -->

        <div>
        <label for="email">Email</label>
        <i class="fas fa-envelope"></i>
        <input type="text" name="email" placeholder="Enter your email">
            </input>
            <p id="uemail"></p>
        </div>

        <!-- Mobile -->
        <div>
        <label for="email">Mobile</label>
        <i class="fas fa-mobile"></i>
        <input type="text" name="mobile" id="mobile2" placeholder="Enter your Mobile No." >
            </input>
            <p id="umobile"></p>
        </div>

        <!-- Gender -->
            <label>Gender</label>
                <select name="gender" id="gender">
                    <option value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                  </select>
                  <p id="ugender"></p>


        <!-- Image -->

        <div>
        <label for="uploadFile">Image</label></td>

        <input style="color: bisque;" type="file" name="uploadFile" accept=".jpg, .jpeg, .png"/> 
        </div>
        
        <!-- Password -->
        <div>
        <label for="password">Password</label>
        <i class="fas fa-lock"></i>
        <input type="password" name="password1" id="password1" placeholder="Enter your password" >
            </input>
            <p id="pass1"></p>
        </div>

        <!-- Confirm Password -->
        <div>
        <label for="password">Confirm Password</label>
        <i class="fas fa-lock"></i>
        <input type="password" name="password2" id="password2" placeholder="Retype your password" >
            </input>
            <p id="pass2"></p>
        </div>

        <button type="submit" value="submit">SignUp</button>   

        <p style="color: white;">Already a member ? <a href = "systemlogin.php">LogIn</a></p>
	</form>




    </div>
    <?php include('../view/footer.php');?>
</body>
<script src="../view/js/signup.js"></script>
</html>
