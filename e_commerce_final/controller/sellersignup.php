<?php

include("../model/connection.php");
$errors = array();
if($_SERVER["REQUEST_METHOD"]=="POST"){

    //image

    $imagename = $_FILES['uploadFile']['name'];
    $tmpname=  $_FILES['uploadFile']['tmp_name'];
    $folder = '../view/images/'.$imagename;



    if(preg_match("/\S+/", $_POST['fullname']) === 0){
		$errors['fullname'] = "* Full Name is required.";
	}
    
    if(preg_match("/\S+/", $_POST['username']) === 0){
		$errors['username'] = "* Username is required.";
	}

    if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])=== 0){
		$errors['username'] = "* Only letters and number allowed ";
	}

    if(preg_match("/\S+/", $_POST['email']) === 0){
		$errors['email'] = "* Email is required.";
	}

	if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
		$errors['email'] = "* Not a valid e-mail address.";
	}

    if(preg_match("/\S+/", $_POST['mobile']) === 0){
		$errors['mobile'] = "* Mobile number is required.";
	}

    if(preg_match("/^[0-9]{11}$/", $_POST['mobile']) === 0){
		$errors['mobile'] = "* Mobile number can contain only 11 digits.";
	}

    if(empty($_POST['gender']))
    {
		$errors['gender'] = "* Please confirm your gender";
	}


	if(preg_match("/.{8,}/", $_POST['password1']) === 0){
		$errors['password1'] = "* Password Must Contain at least 8 Chanacters.";
	}

	if(strcmp($_POST['password1'], $_POST['password2'])){
		$errors['password2'] = "* Password do not much.";
	}
	
	if(count($errors) === 0){
		$fullname  = mysqli_real_escape_string($conn, $_POST['fullname']);
		$username  = mysqli_real_escape_string($conn, $_POST['username']);
		$email     = mysqli_real_escape_string($conn, $_POST['email']);
		$mobile    = mysqli_real_escape_string($conn, $_POST['mobile']);
		$gender    = mysqli_real_escape_string($conn, $_POST['gender']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);

        //username existency check
		$search_query = "SELECT * FROM sellers WHERE username = '$username'";
        $result = mysqli_query($conn, $search_query);
		$count = mysqli_num_rows($result);
		if($count >0 ){
			$errors['username'] = "* Username  is unavailable.";

        }
        
        else{
			$sql = "INSERT INTO sellers (fullname, username, email, mobile, gender, image, password) VALUES ('$fullname','$username','$email','$mobile','$gender','$imagename','$password1')";
            move_uploaded_file($tmpname,$folder);
            $query = mysqli_query($conn, $sql);
			$_POST['fullname'] = '';
			$_POST['username'] = '';
			$_POST['email'] = '';
            $_POST['mobile'] = '';
			$_POST['gender'] = '';
            $_POST['password'] = '';
            
            echo '<script>alert("Successfully Registered")</script>';
            echo '<script>window.location="sellersignup.php"</script>';
			
		}
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
    <title>Seller SignUp</title>

</head>
<body>
    <div class="form_container" align ="center">
    <form name="signupData" method ="post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h3 style="color: white;">Seller Sign Up</h3>

        <!-- Full Name -->

        <div>
        <label for="fullname">Full Name</label>
        <i class="fas fa-user"></i>
        <input type="text" name= "fullname" placeholder="Enter your Full Name" >
        </input>
        <?php if(isset($errors['fullname'])){echo "<p>" .$errors['fullname']. "</p>"; } ?>
        </div>

        <!-- User Name -->
        <div>
        <label for="username">User Name</label>
        <i class="fas fa-user-circle"></i>
        <input type="text" name="username" id="username" placeholder="Enter your Username">
            </input>
            <?php if(isset($errors['username'])){echo "<p>" .$errors['username']. "</p>"; } ?>
        </div>
        

        <!-- Email -->

        <div>
        <label for="email">Email</label>
        <i class="fas fa-envelope"></i>
        <input type="text" name="email" placeholder="Enter your email" >
            </input>
            <?php if(isset($errors['email'])){echo "<p>" .$errors['email']. "</p>"; } ?>
        </div>

        <!-- Mobile -->
        <div>
        <label for="email">Mobile</label>
        <i class="fas fa-mobile"></i>
        <input type="text" name="mobile" placeholder="Enter your Mobile No." >
            </input>
            <?php if(isset($errors['mobile'])){echo "<p>" .$errors['mobile']. "</p>"; } ?>
        </div>

        <!-- Gender -->
            <label>Gender</label>
                <select name="gender" id="gender">
                    <option value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                  </select>
                  <?php if(isset($errors['gender'])){echo "<p>" .$errors['gender']. "</p>"; } ?>


        <!-- Image -->

        <div>
        <label for="uploadFile">Image</label></td>

        <input style="color: bisque;" type="file" name="uploadFile" accept=".jpg, .jpeg, .png"/> 
        </div>
        
        <!-- Password -->
        <div>
        <label for="password">Password</label>
        <i class="fas fa-lock"></i>
        <input type="password" name="password1" placeholder="Enter your password" >
            </input>
            <?php if(isset($errors['password1'])){echo "<p>" .$errors['password1']. "</p>"; } ?>
        </div>

        <!-- Confirm Password -->
        <div>
        <label for="password">Confirm Password</label>
        <i class="fas fa-lock"></i>
        <input type="password" name="password2" placeholder="Retype your password" >
            </input>
            <?php if(isset($errors['password2'])){echo "<p>" .$errors['password2']. "</p>"; } ?>
        </div>

        <button type="submit" value="submit">SignUp</button>   

        <p style="color: white;">Already a seller? <a href = "sellerlogin.php">LogIn</a></p>
	</form>




    </div>
    <?php include('../view/footer.php');?>
</body>
</html>
