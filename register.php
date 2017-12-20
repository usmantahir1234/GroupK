<?php
include('connection.php');
include('header.php');

?>

<?php
if($_POST['submit'])
{
	
	$sql="select * from `registration` where `user_name`='".$_POST['user_name']."' and `password`='".$_POST['password']."'";
	$query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($query);
	//print_r($row); die;


	if(!$row)
	{
		$sql1="insert into registration(f_name,l_name,gender,user_name,password,c_password,email,dob,p_code) values ('".$_POST['f_name']."','".$_POST['l_name']."','".$_POST['gender']."','".$_POST['user_name']."','".$_POST['password']."','".$_POST['c_password']."','".$_POST['email']."','".$_POST['dob']."','".$_POST['p_code']."')";
		$abc=mysqli_query($con,$sql1);
		if($abc)
		{
			echo"<script>alert('Registration Successfully')</script>";
		}
		else
		{
			echo"<script>alert('Registration Fail')</script>";
		}
	}
	else
	{
		
		echo "<script> alert('Already Exits')</script>";
	}
}
?>


<div class="content">
	<div class="container">
			<h3 class="text-center"><b>REGISTRATION FORM</b></h3>
		<div class="row cus-row">
			<div class="col-sm-4">
				<img src="image/dummy.jpg" class="img-responsive"><br>
				<img src="image/dummy.jpg" class="img-responsive">
			</div>
			<div class="col-sm-4">
				<form method="post" action="">
				  <div class="form-group">
					<input type="text" class="form-control cus-input" id="" name="f_name" placeholder="FIRST NAME" required>
				  </div>
				  
				  <div class="form-group">
					<input type="text" class="form-control cus-input" id="" name="l_name" placeholder="LAST NAME" required>
				  </div>
				  
				   <div class="form-group">
					<label class="cus-gender"><b>GENDER</b></label>
					<label class="radio-inline"><input type="radio" name="gender" value="MALE" required>MALE</label>
					<label class="radio-inline"><input type="radio" name="gender" value="FEMALE" required>FEMALE</label>
				   </div>
				  
				   <div class="form-group">
					<input type="text" class="form-control cus-input" id="" name="user_name" placeholder="USERNAME" required>
				  </div>
				  
				   <div class="form-group">
					<input type="password" class="form-control cus-input" id="password" name="password" placeholder="PASSWORD" onkeyup='check();' required>
				  </div>
				  
				  <div class="form-group">
					<input type="password" class="form-control cus-input" id="confirm_password" name="c_password" placeholder="REPEAT PASSWORD" onkeyup='check();' required> <span id='message'></span>
				  </div>
				  
				  <div class="form-group">
					<input type="email" class="form-control cus-input" id="" name="email" placeholder="EMAIL ADDRESS" required>
				  </div>
				  
				  <div class="form-group">
					<input type="text" class="form-control cus-input" id="" name="dob" placeholder="DATE OF BIRTH" required>
				  </div>
				  
				  <div class="form-group">
					<input type="text" class="form-control cus-input" id="" name="p_code" placeholder="POSTCODE" required>
				  </div>
				  
				  <div class="form-group text-center">
					<input type="submit" class="btn btn-success " id="" name="submit" value="REGISTER">
				  </div>
				 
				</form>
			</div>
			<div class="col-sm-4">
				<img src="image/dummy.jpg" class="img-responsive"><br>
				<img src="image/dummy.jpg" class="img-responsive">
			</div>
		</div>
		
	</div>
</div>


<script>
 var check = function() {
      if (document.getElementById('password').value ==
          document.getElementById('confirm_password').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'Password Matching';
      } else {
      		document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'Password not matching';
      }
  }

</script>





<?php

include('footer.php');

?>