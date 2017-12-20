<?php
include('connection.php');
include('header.php');

function getUserName($id)
{
	global $con;
	$sql2="select * from registration where id='".$id."'";
 	$query1=mysqli_query($con,$sql2);
	$row1=mysqli_fetch_array($query1);
	return ucwords($row1['f_name']).' '.ucwords($row1['l_name']);
}
?>
 <script src="js/starr.js"></script>

<div class="content">
	<div class="container">
		<div class="row cus-row">
			<div class="col-sm-12">
				<h3 class="text-left"><b>FEEDBACK</b></h3><br>
				<div class="cus-faq" >
					
					  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						
                        <?php 
						
							$sql2="select * from feedback order by Feedback_Date desc";
							$query1=mysqli_query($con,$sql2);
							while($row1=mysqli_fetch_array($query1))
							{
						?>
                        <div class="panel panel-default">
						  <div class="panel-heading" role="tab" id="heading<?php print($row1['Feedback_ID']);?>">
							<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print($row1['Feedback_ID']);?>" aria-expanded="true" aria-controls="collapse<?php print($row1['Feedback_ID']);?>">
							  <?php print(getUserName($row1['Participant_ID']));?>
							</a>
						  </h4>
						  </div>
						  <div id="collapse<?php print($row1['Feedback_ID']);?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php print($row1['Feedback_ID']);?>">
							<div class="panel-body">
							 <?php print($row1['Description']);?>
							</div>
                             
							 <div id="stars-existing" class="starrr" data-rating='<?php print($row1['Rating']);?>'></div>
							 
						  </div>
						</div>
                         <?php } ?>
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