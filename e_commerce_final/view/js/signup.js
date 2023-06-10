function validateForm() {
	//fullname
	let fname = document.forms["signupData"]["fullname"].value;
	fn =/^[a-zA-Z ]*$/;
	if (fname == "") {
	document.getElementById("fname").innerHTML = "* Full Name is required";
	  return false;
	}else if(!fn.test(fname)){
		document.getElementById("fname").innerHTML = "* Only letters and whitespaces allowed";
	}else{
		document.getElementById("fname").innerHTML = "* ^_^ *";
	}

	//username
	let uname = document.forms["signupData"]["username"].value;
	un =/^[a-zA-Z0-9]*$/;
	if (uname == "") {
		document.getElementById("uname").innerHTML ="* User Name is required" ;
	  	return false;
	}else if(!un.test(uname)){
		document.getElementById("uname").innerHTML = "* Only letters and number allowed";
	}else{
		document.getElementById("uname").innerHTML = "* ^_^ *";
	}

	// email validation
	let umail = document.forms["signupData"]["email"].value;
	reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@(([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(umail == ""){
		document.getElementById("uemail").innerHTML ="* Email is required";
		return false;
	}else if(!reg.test(umail)){
		document.getElementById("uemail").innerHTML = "* Not a Valid Email Address";
	}else{
		document.getElementById("uemail").innerHTML = "* ^_^ *";
	}


	// Mobile number validation
	let mobile = document.forms["signupData"]["mobile"].value;
	um = /^[0-9]{11}$/;
	if(mobile == ""){
		document.getElementById("umobile").innerHTML ="* Mobile Number is required";
		return false;
	}else if(!um.test(mobile)){
		document.getElementById("umobile").innerHTML = "* Mobile number can contain 11 digits";
	}else{
		document.getElementById("umobile").innerHTML = "* ^_^ *";
	}

	//gender
	let gender = document.forms["signupData"]["gender"].value;
	if(gender == ""){
		document.getElementById("ugender").innerHTML ="* Gender is required";
		return false;
	}else{
		document.getElementById("ugender").innerHTML = "* ^_^ *";
	}


	// password

	pd = /.{8,}/;
	let pass1 = document.forms["signupData"]["password1"].value;
	if(pass1 ==""){
		document.getElementById("pass1").innerHTML ="* Password is required";
		return false;
	}else if(!pd.test(pass1)){
		document.getElementById("pass1").innerHTML ="* Password Must Contain at least 8 Chanacters.";
	}else{
		document.getElementById("pass1").innerHTML = "* ^_^ *";
	}

	//confirm password
	let pass2 = document.forms["signupData"]["password2"].value;
	if(pass2 ==""){
		document.getElementById("pass2").innerHTML ="* Please retype your password";
		return false;
	}else{
	}
	//password check
	var pw1 = document.getElementById("password1").value;
	var pw2 = document.getElementById("password2").value;
	if(pw1 != pw2){
		document.getElementById("pass2").innerHTML ="* Type your password correctly!";
		return false;
	}else if(pw1 = pw2){
		document.getElementById("pass2").innerHTML = "* ^_^ *";
	}
	else{
		
	}


}