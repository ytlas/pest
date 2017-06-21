<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/home">Home</a>
  <?php if(!$user): ?>
      <a href="/login">Log in</a>
      <a href="/signup">Sign up</a>
  <?php elseif($user): ?>
      <a href="/destroy">Log out</a>
      <a href="/notes">Notes</a>
  <?php endif; ?>
  <a href="/about">About this</a>
</div>

<span onclick="openNav()">= <?='/'.$this->getView()?></span>
<?=$this->ip?> --
<?php if($user) echo 'Logged in as: ['.$user->getTribeName().']'.' '.$user->getName(); ?>

<style>

 /* The side navigation menu */
 .sidenav {
     height: 100%; /* 100% Full-height */
     width: 0; /* 0 width - change this with JavaScript */
     position: fixed; /* Stay in place */
     z-index: 1; /* Stay on top */
     top: 0;
     left: 0;
     background-color: #111; /* Black*/
     overflow-x: hidden; /* Disable horizontal scroll */
     padding-top: 60px; /* Place content 60px from the top */
     transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
 }

 /* The navigation menu links */
 .sidenav a {
     padding: 8px 8px 8px 32px;
     text-decoration: none;
     font-size: 25px;
     color: #818181;
     display: block;
     transition: 0.3s
 }

 /* When you mouse over the navigation links, change their color */
 .sidenav a:hover, .offcanvas a:focus{
     color: #f1f1f1;
 }

 /* Position and style the close button (top right corner) */
 .sidenav .closebtn {
     position: absolute;
     top: 0;
     right: 25px;
     font-size: 36px;
     margin-left: 50px;
 }

 /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
 @media screen and (max-height: 450px) {
     .sidenav {padding-top: 15px;}
     .sidenav a {font-size: 18px;}
 }

 nav span{
     font-size:1.5em;
     text-decoration:underline;
     cursor: pointer;
 }
</style>
