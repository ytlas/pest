<h1>Sign up</h1>
<form method="post" action="/signup" id="signupForm">
    Username:
    <br>
    <input value="<?=flash($mess['userName'])?>" type="text" placeholder="Username" name="userName" pattern="[a-zA-Z0-9_]{3,16}" required title="3 to 16 characters and only alphanumeric characters." autocomplete="off" autofocus>
    <br><br>
    Email:
    <br>
    <input value="<?=flash($mess['userEmail'])?>" type="email" placeholder="Email address" name="userEmail" required autocomplete="off">
    <br><br>
    Password:
    <br>
    <input type="password" placeholder="Password" name="userPassword" id="userPassword1" pattern="[^.*$]{8,32}" required title="8 to 32 characters.">
    <br><br>
    Repeat your password:
    <br>
    <input type="password" placeholder="Password" id="userPassword2" onkeyup="checkPass();return false;" pattern="[^.*$]{8,32}" required title="8 to 32 characters."><span id="userPasswordMessage"></span>
    <br><br>
    Captcha: (Case-insensitive)
    <input type="text" placeholder="Captcha" name="signupCaptcha" size="10" pattern=".{6}" required title="6 characters needed." autocomplete="off"><br><br>
    <img id="signupCaptcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image"><br>
    <a href="#" onclick="document.getElementById('signupCaptcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
    <p><input type="checkbox" name="cookieConsent" required> I consent to the use of cookies when maintaining user sessions on this website.</p>
    <input type="submit" value="Sign up">
</form>
<script>
 function checkPass(){
     // Store the password field objects into variables ...
     var pass1 = document.getElementById('userPassword1');
     var pass2 = document.getElementById('userPassword2');
     // Store the Confimation Message Object ...
     var message = document.getElementById('userPasswordMessage');
     // Set the colors we will be using ...
     var goodColor = "#66cc66";
     var badColor = "#ff6666";
     // Compare the values in the password field
     // and the confirmation field
     if(pass1.value == pass2.value){
	 // The passwords match.
	 // Set the color to the good color and inform
	 // the user that they have entered the correct password
	 pass2.style.backgroundColor = goodColor;
	 message.style.color = goodColor;
	 message.innerHTML = "Passwords Match!<br>"
     }else{
	 // The passwords do not match.
	 // Set the color to the bad color and
	 // notify the user.
	 pass2.style.backgroundColor = badColor;
	 message.style.color = badColor;
	 message.innerHTML = "Passwords Do Not Match!<br>"
     }
 }
</script>
