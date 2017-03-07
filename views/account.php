<h1 class="iconAccount"> Account</h1>
<p>Change your theme:</p>
<p><select onchange="location=this.value;">
    <option> -- SELECT A THEME -- </option>
<?php foreach(glob("css/theme*.php") as $theme): ?>
	<option value="/account?themeName=<?=substr($theme,4,strrpos($theme,'.php')-4)?>"><?=$theme?></option>
<?php endforeach; ?>
</select></p>
