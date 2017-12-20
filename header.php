<?php
include('connection.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/tabs.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" />
<script src="js/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
<div class="head-logo">
	<div class="container-fluid">
		<div class="logo">
			<a href="#">
				<img src="image/logo.png" class="img-responsive">
			</a>
		</div>
	</div>
</div>
<div class="header">
	<div class="container">
		<h1 class="text-center">WELCOME TO BOOKASPORT</h1><br>
		<p class="text-center cus-per">THE PERFECT WEBSITE TO BOOK OR HOST AN EVENT</p></br>
		<div class="row">
			<div class="col-md-9 col-sm-9 col-md-offset-2 col-sm-offset-2 col-lg-8 col-lg-offset-2">
			<nav class="navbar my-nav" id="aab">
		 
				<ul class="nav navbar-nav cus-nav ">
				  <li ><a href="index.php">Home</a></li>
				  <li><a href="available-events.php">AVAILABLE EVENTS</a></li>
				  <li><a href="hosting-an-event.php">HOSTING AN EVENT</a></li>
				  <li ><a href="feedback.php">FEEDBACK</a></li>
				  <li><a href="my-account.php">MY ACCOUNT</a></li>
				  
				  
				  
				  
				
				</ul>
		 
			</nav>
			</div>
		</div>
	</div>
	
</div>


<script type="text/javascript">
   $('#aab ul li a').click(function() {
  $('li a').removeClass("active");
  $(this).addClass("active");
  localStorage.setItem('active', $(this).parent().index());
});

var ele = localStorage.getItem('active');
$('#aab ul li:eq(' + ele + ')').find('a').addClass('active');
</script>