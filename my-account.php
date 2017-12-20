<?php
include('connection.php');
include('header.php');


if(count($_POST))
{
	$sql1="insert into feedback(Participant_ID,Rating,Description,Feedback_Date) values ('".$_SESSION['id']."','".$_POST['ratting']."','".mysqli_real_escape_string($con,$_POST['comments'])."','".date('Y-m-d')."')";
	$abc=mysqli_query($con,$sql1);
	$lastid =  mysqli_insert_id($con);
	$sql2="insert into event_feedback(Event_ID,Feedback_ID) values ('".$_POST['sel1']."','".$lastid."')";
	$abc2=mysqli_query($con,$sql2);
	if($abc2)
	{
		echo"<script>alert('Registration Successfully')</script>";
	}
	else
	{
		echo"<script>alert('Registration Fail')</script>";
	}
	 
}


 
?>

<?php if($_SESSION['user_name']!=''){?>
<link rel="stylesheet" href="css/jquery-confirm.min.css">
<script src="js/jquery-confirm.min.js"></script> 
<script language="javascript">
$(document).ready(function(){
	var userid = "<?php print($_SESSION['id']);?>";
  	$.post( "getPopupNotification.php", { userid: userid}, 
	function( data )
	{
		if(data)
		{	  
			if(data!='Error')
			{
				$.confirm({
					title: 'Upcomming Events',
					content: data,
					type: 'blue',
					typeAnimated: true,
					buttons: {
						tryAgain: {
							text: 'Close',
							btnClass: 'btn-blue',
							action: function(){
							}
						} 
					}
				});
			}
		}
	});
});
</script>
<?php } ?>
<div class="content">
	<div class="container">
		<div class="row cus-row">
			<div class="col-sm-12">
			<?php if($_SESSION[user_name]==""){?> 
				<div class="row">
					<div class="col-sm-6">
					<h3 class="text-left"><b>MY ACCOUNT</b></h3>
					</div>
					<div class="col-sm-6 text-right">
						<a href="host.php" class="btn btn-primary host-ac">HOST ACCOUNT</a>
					</div>
				</div><br>
				<div class="cus-my-account">
				  <h5><b>FIRST <a href="index.php">LOGIN</a> THEN BOOKED EVENTS</b></h5><br>
				</div>		
					
					<?php } else{?>
					
				<div class="row">
					<div class="col-sm-6">
					<h3 class="text-left"><b>MY ACCOUNT</b></h3>
					</div>
					<div class="col-sm-6 text-right">
						<a href="host.php" class="btn btn-primary host-ac">HOST ACCOUNT</a>
						<a href="logout.php" class="btn btn-primary host-ac">LOG OUT</a>
					</div>
				</div><br>
					<div class="cus-my-account">
							<h5><b>BOOKED EVENTS</b></h5><br>
								   <table class="table table-fixed">
									  <thead>
										<tr>
										  <th class="col-xs-1">EVENT Name</th>
										  <th class="col-xs-2">VENUE NAME</th>
										  <th class="col-xs-3">DURATION OF EVENT</th>
										  <th class="col-xs-3">DATE OF EVENT</th>
										  <th class="col-xs-3">TIME OF EVENT</th>
										</tr>
									  </thead>
									  <tbody>
									  
									  
									  <?php
										$sql4="select * from `user_event` where `user_id` = '".$_SESSION['id']."'";
										$query4=mysqli_query($con,$sql4);
										while($row4=mysqli_fetch_array($query4))
										{
											$v1 = $row4['event_id'];
											$sql5="select * from `event_book` where `id` = '".$v1."'";
										
											$query5=mysqli_query($con,$sql5);
											while($row5=mysqli_fetch_array($query5))
											{
										echo"<tr>
										  <td class='col-xs-1'>".$row5['event_name']."</td>
										  <td class='col-xs-2'>".$row5['venue']."</td>
										  <td class='col-xs-3'>".$row5['rangeInput']." Minutes</td>
										  <td class='col-xs-3'>".$row5['date']."</td>
										  <td class='col-xs-3'>".$row5['time']."</td>
										</tr>";
										
									} 
									}	

								?>	
										
										
									  </tbody>
									</table><br>
						<div class="row">
                        <form name="feedbackForm" id="feedbackForm" method="post" method="post">
							<div class="col-sm-5">
								<div class="form-group">
								  <label for="sel1">GIVE FEEDBACK</label>
								  <select class="form-control" id="sel1" name="sel1">
                                 <?php 
                                  	$sqlSelQry="select * from `user_event` where `user_id` = '".$_SESSION['id']."'";
										$sqlSelQry2=mysqli_query($con,$sqlSelQry);
										while($sqlSelRow=mysqli_fetch_array($sqlSelQry2))
										{
											$v2 = $sqlSelRow['event_id'];
											$sqlSel1="select * from `event_book` where `id` = '".$v2."'";
										
											$sqlSel2=mysqli_query($con,$sqlSel1);
											while($sqlSelRow5=mysqli_fetch_array($sqlSel2))
											{
												$edt = explode('/',$sqlSelRow5['date']);
												$newdt = $edt[2].''.$edt[0].''.$edt[1];
												if(strtotime($newdt)<strtotime(date('Y-m-d')))
												{
													echo"<option value=\"".$sqlSelRow5['id']."\">".$sqlSelRow5['event_name']."</option>";
												}
											} 
										}	
								?>
  								  </select>
								</div>
								<div class="form-group">
								  <label for="comment">ANY COMMENTS</label>
								  <textarea class="form-control" rows="9" name="comments" id="comments"></textarea>
								</div>
							</div>
							<div class="col-sm-7">
								<div class="form-group">
									<label >1. HOW WAS YOUR EXPERIENCE AT THE EVENT?</label><br>
									<label class="radio-inline"><input type="radio" name="optradio1" value="EXCELLENT">EXCELLENT</label>
									<label class="radio-inline"><input type="radio" name="optradio1" value="GOOD">GOOD</label>
									<label class="radio-inline"><input type="radio" name="optradio1" value="SATISFACTORY">SATISFACTORY</label>
									<label class="radio-inline"><input type="radio" name="optradio1" value="POOR">POOR</label>
								</div>
								<div class="form-group">
									<label >2. HOW WAS THE PRICE FOR THE EVENT?</label><br>
									<label class="radio-inline"><input type="radio" name="optradio2" value="EXCELLENT">EXCELLENT</label>
									<label class="radio-inline"><input type="radio" name="optradio2" value="GOOD">GOOD</label>
									<label class="radio-inline"><input type="radio" name="optradio2" value="SATISFACTORY">SATISFACTORY</label>
									<label class="radio-inline"><input type="radio" name="optradio2"value="POOR">POOR</label>
								</div>
								<div class="form-group">
									<label>3. HOW LIKELY ARE YOU TO RECOMMEND BOOKASPORT ?</label><br>
									<label class="radio-inline"><input type="radio" name="optradio3" value="VERY LIKELY">VERY LIKELY</label>
									<label class="radio-inline"><input type="radio" name="optradio3" value="LIKELY">LIKELY</label>
									<label class="radio-inline"><input type="radio" name="optradio3" value="MAYBE">MAYBE</label>
									<label class="radio-inline"><input type="radio" name="optradio3" value="NOT AT ALL">NOT AT ALL</label>
								</div>
								<div class="form-group">
									<label >4. HOW EASY DID YOU FIND IT TO BOOK AN EVENT?</label><br>
									<label class="radio-inline"><input type="radio" name="optradio4" value="VERY EASY">VERY EASY</label>
									<label class="radio-inline"><input type="radio" name="optradio4" value="EASY">EASY</label>
									<label class="radio-inline"><input type="radio" name="optradio4" value="DIFFICULT">DIFFICULT</label>
									<label class="radio-inline"><input type="radio" name="optradio4" value="VERYDIFFICULT">VERYDIFFICULT</label>
								</div>
								<div class="form-group cus-rateings">
									<label class="cus-rat">5. HOW MANY STARS WOULD YOU RATE BOOKASPORT OUT OF 5?</label>
									<label class="col-xs-3 ">
										<!--<input type="number" class="form-control cus-input" name="ratting" id="ratting" value="5" max="5" min="1">-->
                                        <select class="form-control" id="ratting" name="ratting">
                                            <option value="5">5</option>
                                            <option value="4">4</option>
                                            <option value="3">3</option>
                                            <option value="2">2</option>
                                            <option value="1">1</option>
                                        </select>
									</label>
								</div><br>
								<div class="form-group text-center">
									<input type="submit" name="submit" id="submit" class="btn btn-success" value="SUBMIT FEEDBACK">
								</div>
							</div>
                            </form>
						</div>			
								
					</div>	
					
					
				
					
					</div>
				<?php } ?>
		</div>
		
	</div>
</div>

<?php

include('footer.php');

?>