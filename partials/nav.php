<ul id="navList">
    <li><a href="/home" class="iconHome"> Home</a></li><li>
	<div class="dropdown">
	    <span class="dropIcon"></span><a href="/info" class="dropbtn iconForums"> Forums</a>
	    <div class="dropdown-content">
		<a href="/chat" class="iconChat"> Chat</a>
		<a href="/about" class="iconAbout"> About</a>
		<a href="/userlist" class="iconUserlist"> Userlist</a>
	    </div>
	</div></li><li>
	    <div class="dropdown">
		<?php if(Site::$u): ?>
		    <span class="dropIcon"></span><a href="/account" class="dropbtn iconAccount"> Account</a>
		    <div class="dropdown-content">
			<a href="/files" class="iconFiles"> Files</a>
			<a href="/logout" class="iconLogout"> Log out</a>
		    </div>
		<?php else: ?>
		    <span class="dropIcon"></span><a href="/login" class="dropbtn iconLogin"> Log in</a>
		    <div class="dropdown-content">
			<a href="/signup" class="iconSignup"> Sign up</a>
		    </div>
		<?php endif; ?>
	    </div></li>
</ul>
