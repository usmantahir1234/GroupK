<?php
include('connection.php');
include('header.php');

?>

<?php
if($_POST['book'])
{
	 
	 $sql6="select * from `event_book` where id = '".$_GET['up']."'";
	 $query6=mysqli_query($con,$sql6);
	 while($row6=mysqli_fetch_array($query6))
	 { 
		$tick = $row6['tickets'];
		
	 }
	 if($tick > 0)
	 {
		$sql2="UPDATE `event_book` SET tickets = tickets - 1 WHERE id = '".$_GET['up']."'";  
		$query2=mysqli_query($con,$sql2);
 		 
		$sql3="INSERT INTO `user_event` (user_id,event_id) VALUES ('".$_SESSION['id']."' ,'".$_GET['up']."')";
		mysqli_query($con,$sql3);
			
		
		echo"<script> alert('Booking Sucessfully ')</script>";
		?>
		<script type="text/javascript">
			<!--
			   window.location="my-account.php";
			//-->
		</script>
		<?php
			 
		 
	} else {
		
		echo"<script> alert('Tickets Not Available')</script>";
	}
}
?>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="text-left"><b>BOOK THIS EVENT</b></h3><br>
				<div class="select-event">
					<div class="row">
						<div class="col-sm-12">
                        	<div class="events table-responsive">
                              <table class="table table-bordered">
								<thead>
									<tr>
										<th>SPORT</th>
										<th>DATE</th>
										<th>START TIME</th>
										<th>DURATION</th>
									</tr>
								</thead>
								<?php
								$sql="select * from `event_book` where `id`='$_GET[up]'";
								$query=mysqli_query($con,$sql);
								$row=mysqli_fetch_array($query);
								?>
								<tbody>
									<tr>
										<td><?php echo $row['sports'];?></td>
										<td><?php echo $row['date'];?></td>
										<td><?php echo $row['time'];?></td>
										<td><?php echo $row['rangeInput'];?> Minutes</td>
									</tr>
								</tbody>
                    		  </table>
                            <br>
							</div>
							<br>
						</div>
                        <div class="col-sm-12">
                        	<h4 class="bold">Description Of Event</h4>
                        	<div class="events">
                            	<?php echo $row[descriptions];?>
                            </div>
                        </div>
                        
						</div>
						<div class="row">
						<div class="col-sm-4">
							<br><br>
							<p><b>LOCATION DETAILS OF VENUE</b></p><br>
							<p><b>Address :</b> <?php echo $row['address'];?></p>
							<p><b>CITY/TOWN : </b><?php echo $row['city'];?></p>
							<p><b>COUNTY : </b><?php echo $row['country'];?></p>
							<p><b>POSTCODE : </b><?php echo $row['postcode'];?></p>
							 <br>
							<p><b>OPENING TIME : </b><?php echo $row['opening_time'];?></p>
							<p><b>CLOSING TIME : </b><?php echo $row['closing_time'];?></p>
							<p><b>COST OF VENUE : </b><?php echo $row['cost_of_venue'];?></p>
							
							<br>
                        </div>
						<div class="col-sm-8">
							<?php echo $row['map'];?>
						</div>
                       <div class="col-sm-12">
							
						<a href="available-events.php" class="btn btn-success pull-left">RETURN</a>
						
					  <?php if($_SESSION['user_name']==""){?>
                       
					   <form method="post" action="index.php">    
						
						<span class="pull-right"><h5><b>FIRST <a href="index.php">LOGIN</a> THEN BOOKED EVENTS</b></h5></span>
						
						
						</form>
						
						<?php } else{?>
						
							<form method="post" action="">    
							<input type="hidden" name="hid" value="<?php echo $row['tickets'];?>">
							<input type="submit" name="book" class="btn btn-success btn-marg pull-right" value="BOOK">
							</form>
						<?php } ?>	
						
			              </div>
					   </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if($_SESSION['id']==""){?>
<?php } ?>

 
 
 



<?php

//$sql1="select * from `event_book` where `id`='$_GET[up]'";
//$query1=mysql_query($sql1);
//while($row1=mysql_fetch_array($query1))
//{
//echo"<tr><td>$row1[tickets]</td>
//			</tr>";
//	}	
//?>



<?php
//if($_POST[book]){
	
//	$sql2="UPDATE `event_book` SET tickets = tickets - 1 WHERE id = '$_GET[up]'";
//	$query2=mysql_query($sql2);
//	while($row2=mysql_fetch_array($query2))
//	{
//		echo"<tr><td>$row2[tickets]</td>
//			</tr>";
//	}
	
//}
//?>






<?php

include('footer.php');

?>
