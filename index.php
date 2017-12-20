<?php
include('connection.php');
include('header.php');
?>

<?php
if($_POST['login'])
{
	 $n=$_POST['user_name'];
	 $p=$_POST['password'];
	 $sql2="select * from `registration` where `user_name`='$n' and `password`='$p'";
	//echo $sql;
	//die;
	$query1=mysqli_query($con,$sql2);
	$row1=mysqli_fetch_array($query1);
	if(!$row1)
	{
		echo"<script> alert('Does not match.. Please Try Again !!!!!!')</script>";
	}
	else
	{
		$_SESSION['id']=$row1['id'];
		$_SESSION['user_name']=$row1['user_name'];
		$_SESSION['CHK']=true;
		echo"<script> alert('Sucessfully ')</script>";
		?><script type="text/javascript">
<!--
   window.location="my-account.php";
//-->
</script><?php
	}
}

	
?>

<div class="content">
	<div class="container">
	
<?php if($_SESSION[user_name]==""){?> 	
	
		<div class="row">
			<div class="col-md-9 col-sm-9 col-md-offset-2 col-sm-offset-2 col-lg-8 col-lg-offset-2">
			<form method="post" action="">
				<ul class="user-link">
				  <li><input type="text" class="form-control cus-log" placeholder="USERNAME" name="user_name"></li>
				  <li><input type="password" class="form-control cus-log" placeholder="PASSWORD" name="password"></li>
				  <li><input type="submit" class="btn cus-log-btn" value="LOGIN" name="login"></li>
				  <li><a href="register.php">REGISTER</a></li>
				</ul>
			</form>
		 
			</div>
		</div>
		
	<?php } else{?>	
		
		<p class="text-center"><b>WELCOME <span>"<?php 
						  $sqluname="select f_name,l_name from `registration` where id='".$_SESSION['id']."'";
						  $queryuname=mysqli_query($con,$sqluname);
						  $rowuname=mysqli_fetch_array($queryuname);
						   echo ucwords($rowuname['f_name']).' '.ucwords($rowuname['l_name']); ?>"</span></b></p>
		
		
	<?php } ?>	
		
		
		<div class="row cus-row">
			<div class="col-sm-4">
				<img src="image/dummy.jpg" class="img-responsive">
			</div>
			<div class="col-sm-4">
				<img src="image/dummy.jpg" class="img-responsive">
			</div>
			<div class="col-sm-4">
				<img src="image/dummy.jpg" class="img-responsive">
			</div>
		</div>
		<div class="row cus-row">
			<div class="col-sm-12">
				<h3 class="about-heading">ABOUT US</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
			
		</div>
	</div>
</div>


<?php

include('footer.php');

?>