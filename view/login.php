<h1>Log in:</h1>
<form method="post" action="/login" id="signupForm">
    Username:<br>
    <input type="text" name="userName" pattern="[a-zA-Z0-9_]{3,16}" required title="3 to 16 characters and only alphanumeric characters." autofocus><br><br>
    Password:<br>
    <input type="password" name="userPassword" pattern="[^.*$]{8,32}" required title="8 to 32 characters.">
    <p>Keep me logged in for:<br>
    <select name="sessionLength">
	<option value=0>The end of the session</option>
	<option value=1>1 day</option>
	<option value=7>7 days</option>
	<option value=14>14 days</option>
	<option value=30>30 days</option>
    </select></p>
    <p><input type="submit" value="Log in"></p>
</form>
