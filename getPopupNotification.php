<?php
	include('connection.php'); 
	$userid = $_POST['userid'];
	$sql4="select * from `user_event` where `user_id` = '".$userid."'";
	$query4=mysqli_query($con,$sql4);
	if(mysqli_num_rows($query4)>0)
	{
		$msg = "<table width='100%' border='1' cellpadding='20'>\n";
		$msg.="<tr>\n
				  <td class='col-xs-1'><strong>EVENT</strong></td>\n
				  <td class='col-xs-2'><strong>VENUE</strong></td>\n
				  <td class='col-xs-3'><strong>DATE</strong></td>\n
				  <td class='col-xs-3'><strong>TIME</strong></td>\n
				</tr>\n";
		while($row4=mysqli_fetch_array($query4))
		{
			$v1 = $row4['event_id'];
			$tomorrowDt = date('m/d/Y', time()+86400);
			$sql5="select * from `event_book` where `id` = '".$v1."' and date='".$tomorrowDt."'";
			$query5=mysqli_query($con,$sql5);
			while($row5=mysqli_fetch_array($query5))
			{
				$msg .= "<tr>\n
				  <td class='col-xs-1'>".$row5['event_name']."</td>\n
				  <td class='col-xs-1'>".$row5['venue']."</td>\n
				  <td class='col-xs-1'>".$row5['date']."</td>\n
				  <td class='col-xs-1'>".$row5['time']."</td>\n
				</tr>";	
				
			}
		}
		$msg .="</table>";
		echo $msg;
	} else {
		echo 'Error';	
	}
	//select * from `event_book` where `id` = '3' and date='12/17/2017'
	//select * from `event_book` where `id` = '2' and date='12/17/2017'
	//select * from `event_book` where `id` = '10' and date='12/17/2017'
	//select * from `event_book` where `id` = '11' and date='12/17/2017'
?>