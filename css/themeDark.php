<?php
header("Content-type: text/css; charset: UTF-8");
?>
body{
    background-color:black;
    color:white;
}
hr{
    border-color:lightgreen;
}
/* EOS */

/* Style for the <header> tag */
#title{
    color:white;
}
#plus{
    color:lightgreen;
}
/* EOS */

/* Style for the <nav> tag */
/* Styling for the links inside the items. */
nav ul li a{
    color:white;
}
/* When user hovers over the items, change background color. */
nav ul li a:hover{
    background-color:#1C1C1C;
}
/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display:none;
    position:absolute;
    background-color:#1C1C1C;
    width:100%;
    z-index:1;
}
/* Links inside the dropdown */
.dropdown-content a {
    border-top:1px solid black;
}
/* Change color of dropdown links on hover */
.dropdown-content a:hover{
    background-color: #3A3A3A;
}
/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content,
.dropdown:focus .dropdown-content,
.dropdown:active .dropdown-content{
    display: block;
}
/* Show the dropdown menu on hover */
.dropdown:hover .dropbtn,
.dropdown:focus .dropbtn,
.dropdown:active .dropbtn{
    background-color:#1F1F1F;
}
.dropdown:hover .dropbtn:hover{
    background-color:#333333;
}
@media only screen
 and (max-width : 620px) {
     .dropIcon{
	 right:5%;
     }
}
/* EOS */
