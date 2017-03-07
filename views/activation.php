<?php
if(isset($_GET['code'])&&
   strlen($_GET['code'])==40):
$con=new Db();
$activationCode=$con->escape($_GET['code']);
$result=$con->query("SELECT code,usersEmail as userEmail
		     FROM activations
		     WHERE code='$activationCode' LIMIT 1");
if($result->num_rows==1):
	$row=$result->fetch_assoc();
	$con->query("DELETE
		     FROM activations
		     WHERE code='$activationCode' LIMIT 1");
	$con->query("UPDATE users
		     SET groupsId=1
		     WHERE email='".$row['userEmail']."'");

?>
    <h1>Success!</h1>
    <p>Correct activation code! It should be possible to log in.</p>
<?php else: ?>
    <h1>Error</h1>
    <p>Incorrect activation code.</p>
<?php endif; ?>
<?php else: ?>
<h1>Error</h1>
<p>Something is not right.</p>
<?php endif; ?>
