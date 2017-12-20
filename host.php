<?php
include('connection.php');
include('header.php');

?>

<div class="content">
	<div class="container">
		<div class="row cus-row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
					<h3 class="text-left"><b>MY ACCOUNT - HOST</b></h3>
					</div>
				</div>
				<br>
				<div class="cus-my-account">
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								  <select class="form-control cus-input" id="sel1">
									<option>ALL EVENTS</option>
									<option>ALL EVENTS</option>
									<option>ALL EVENTS</option>
									<option>ALL EVENTS</option>
								  </select>
							</div>
						</div>
					</div><br>
					 <?php if($_SESSION[id]==""){
						 ?>
					 
					  <?php } else{?>
						<table class="table table-fixed">
							  <thead>
								<tr>
								  <th class="col-xs-3">EVENT NAME</th>
								  <th class="col-xs-3">DATE OF EVENT</th>
								  <th class="col-xs-3">VENUE</th>
								  <th class="col-xs-3">TICKETS AVAILABLE</th>
								</tr>
							  </thead>
							  <tbody>
							 
							  
							 

								<?php
								$sql="select * from `event_book` where `sess_name` = '".$_SESSION['user_name']."' ";
								$query=mysql_query($sql);
								while($row=mysql_fetch_array($query))
								{
									echo"<tr>
									  <td class='col-xs-3'>$row[event_name]</td>
									  <td class='col-xs-3'>$row[date]</td>
									  <td class='col-xs-3'>$row[venue]</td>
									  <td class='col-xs-3'>$row[tickets]</td>
									</tr>";
								   }
								?>
													
							  </tbody>
							</table>
							
								<?php } ?>	
							<br>
						<div class="row">
							
							<div class="col-sm-12">
								<div class="form-group text-left">
									<a href="my-account.php" class="btn btn-success">RETURN</a>
								</div>
							</div>
						</div>			
								
					</div>		
			</div>
		</div>
		
	</div>
</div>

<?php
include('footer.php');
?>