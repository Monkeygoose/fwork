body{
	background-image:none;
	background-color:#3F4C6B;
	color:#231e18;
	background-repeat:no-repeat;
	margin:0;
	font-family: 'Roboto Condensed', sans-serif;
	font-size:12px;
}

@font-face {  
    font-family: "FontAwesome";  
    src: url("<?php echo base_url(); ?>assets/fonts/fontawesome/fontawesome-webfont.eot");  
    src: url("<?php echo base_url(); ?>assets/fonts/fontawesome/fontawesome-webfont.eot?#iefix") format("eot"),   
         url("<?php echo base_url(); ?>assets/fonts/fontawesome/fontawesome-webfont.woff") format("woff"),   
         url("<?php echo base_url(); ?>assets/fonts/fontawesome/fontawesome-webfont.ttf") format("truetype"),   
         url("<?php echo base_url(); ?>assets/fonts/fontawesome/fontawesome-webfont.svg#FontAwesome") format("svg");  
    font-weight: 400;  
    font-style: normal;  
}

.hidden {
	display: none;
}

.content {
	padding: 10px 20px;
}

#login{
	margin:0 auto;
	margin-left:40px;
}

.box{
	width:726px;
	margin:0;
	padding:0;
}

p{
	margin-left:40px;
}

input.clean{
	padding:4px;
	border:1px solid #231e18;
}

table{
	text-align:left;
	font-size: 18px;
	width: 100%;
	margin:20px 0 0 0;
	color: #eee;
	text-align: center;
}

table tr:first-child {
	background:#363F56;
	color: #C8781E;
}

table td {
	border:1px solid #252C3C;
	padding: 5px;
}

a{
	color:#231e18;
	margin-right:10px;
}

.infobar {
	color: #F68A0E;
	padding: 10px;
	background: #363F56;
	height: 46px;
	box-shadow: 0px 0px 4px #000;
}

.infobar p {
	padding: 5px;
	margin: 0;
	font-size: 16px;
}

.infobar a {
	color: #eee;
	float: left;
}

.infobar a span {
	color: #252C3C;
}

.infobar a:hover {
	color: #F68A0E;
}

.icon-fa {
	text-decoration: none;
	font-size: 26px;
	font-family: FontAwesome;
	cursor: pointer;
	transition: all 0.3s;
}

.menu-trigger:hover {
	transform: rotate(90deg);
}

.formitems button, .formitems input, .formitems select {
	width: 100%!important;
	margin-bottom: 10px;
	padding: 5px;
	font-size: 16px;
}

.formitems p {
	font-size: 16px;
}

#impressions {
	background: transparent;
	border: 0;
	text-align: center;
}

.adverttext {
	width: 100%;
	margin-bottom: 10px;
	padding: 5px;
	font-size: 16px;
	height: 90px;
}

.ui-slider {
	margin-bottom: 10px;
}

.ui-slider-handle {
	background: #F6803D!important;
}

#report {
	position: absolute;
	top: 0px;
	right: 0px;
	width: 200px;
	height: 500px;
	background: #eee;
}

#magadprice {
	width: 100%;
	color: #F6803D;
	text-align: center;
	padding: 5px;
	font-size: 16px;
}

/* LOGIN BOX STUFF NEEDS SEPARATING OR REFACTORING */

.loginbox {
  width: 50%;
  display: block;
  margin: 0 auto;
}

td {
  padding: 10px;
}

td input {
  width: 90%!important;
}

.loginbox input {
  margin: 0px!important;
}

.loginbox p {
  text-align: center;
  margin: 0;
}

/* COLUMN CODE */
[class*='col-'] {
	float: left;
}

.col-2-3 {
	width: 66.66%;
}

.col-1-3 {
	width: 33.33%;
}

.col-1-6 {
	width: 16.66%;
}

.col-1-2 {
	width: 50%;
}

.col-1-4 {
	width: 25%;
}

.col-3-4 {
	width: 75%;
}

.col-1-1 {
	width: 100%;
}

.grid:after {
	content: "";
	display: table;
	clear: both;
}

.clearfix {
	clear: both;
}

p {
	-ms-word-break: break-all;
	word-break: break-all;

     /* Non standard for webkit */
     word-break: break-word;

	-webkit-hyphens: auto;
	-moz-hyphens: auto;
	hyphens: auto;
}

*, *:after, *:before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

[class*='col-'] {
	padding-right: 0px;
}
[class*='col-']:last-of-type {
	padding-right: 0;
}
