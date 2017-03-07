<?php
header("Content-type: text/css; charset: UTF-8");
?>
/* Initialize webfonts */
@font-face {
    font-family:FreeMono;
    src: url(freefont/FreeMono.ttf);
}
@font-face {
    font-family:FreeSans;
    src: url(freefont/FreeSans.ttf);
}
@font-face {
    font-family:FreeSerif;
    src: url(freefont/FreeSerif.ttf);
}
@font-face {
    font-family:awesome;
    src:url(fontAwesome.ttf);
}
/* "Global" settings on the body */
body{
    background-color:white;
    color:black;
    max-width:50em;
    margin:auto;
    font-family:FreeMono;
}
h1,h2,h3{
    font-family:FreeSerif;
}
hr{
    border:1px solid red;
}
a{
    color:darkgreen;
}
/* EOS */

/* Style for the <header> tag */
header{
    position:relative;
}
header a{
    text-decoration:none;
}
#title{
    color:#202020;
}
#plus{
    color:red;
    font-size:0.8em;
}
#userDisplay{
    position:absolute;
    top:2em;
    margin:auto;
    left:50%;
    color:gray;
}
/* EOS */

/* Style for the <section> tag */
section{
    padding-left:1em;
    padding-right:1em;
}
/* EOS */

/* Style for the <section> tag */
footer{
    padding-left:1em;
    padding-right:1em;
}
/* EOS */

/* Style for the <nav> tag */
/* Sets margin and padding of the unordered list to 0 pixels. */
nav ul{
    margin:0;
    padding:0;
}
/* Styling for the items in the unordered list. */
nav ul li{
    display:inline-block;
    text-align:center;
    width:33.3333%;
}
/* Styling for the links inside the items. */
nav ul li a{
    display:block;
    text-decoration:none;
    width:100%;
    height:1.5em;
    line-height:1.5em;
    color:black;
}
/* When user hovers over the items, change background color. */
nav ul li a:hover{
    background-color:lightgray;
}
/* Style for the dropdown menus in nav. */
/* Icon that indicates if menu is dropped down. */
.dropIcon{
    position:absolute;
    z-index:1;
    height:100%;
    padding:0.5em;
    top:-0.3em;
    right:1em;
}
.dropIcon:after{
    font-family:awesome;
    content:"\f0d7";
}
.dropdown:hover .dropIcon:after{
    font-family:awesome;
    content:"\f0d9";
}
/* Main div that contains all dropdown elements. */
.dropdown {
    position: relative;
    display: inline-block;
    width:100%;
}
/* Only link in dropdown that is always visible. */
.dropbtn {
    border:none;
}
/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display:none;
    position:absolute;
    background-color:white;
    width:100%;
    z-index:1;
}
/* Links inside the dropdown */
.dropdown-content a {
    text-decoration: none;
    display: block;
    border-top:1px solid black;
    box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
}
/* Change color of dropdown links on hover */
.dropdown-content a:hover{
    background-color:lightgray;
}
/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content,
.dropdown:focus .dropdown-content,
.dropdown:active .dropdown-content{
    display: block;
}
.dropdown:hover .dropbtn:hover{
    background-color:lightgray;
}
@media only screen
 and (max-width : 600px) {
     .dropIcon{
	 right:-0.2em !important;
     }
}
/* EOS */

/* ICON STYLES with font-awesome */
.iconHome:before,
.iconForums:before,
.iconChat:before,
.iconAbout:before,
.iconUserlist:before,
.iconAccount:before,
.iconFiles:before,
.iconLogout:before,
.iconLogin:before,
.iconSignup:before{
    font-family:awesome;
}
.iconHome:before{content:'\f015';}
.iconForums:before{content:'\f0e6';}
.iconChat:before{content:'\f27b';}
.iconAbout:before{content:'\f128';}
.iconUserlist:before{content:'\f022';}
.iconAccount:before{content:'\f0f0';}
.iconFiles:before{content:'\f0c5';}
.iconLogout:before{content:'\f08b';}
.iconLogin:before{content:'\f090';}
.iconSignup:before{content:'\f234';}
/* EOS */