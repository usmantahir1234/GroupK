<?php
include('connection.php');
include('header.php');

?>
<?php if($_SESSION['user_name']==""){?> 







<div class="content">
	<div class="container">
		<div class="row cus-row">
			<div class="col-sm-12">
				<h3 class="text-left"><b>HOSTING AN EVENT</b></h3><br>
				<div class="select-event">
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
							 
							  <select class="form-control cus-input" id="sel1">
								<option>VENUE</option>
								<option>VENUE</option>
								<option>VENUE</option>
								<option>VENUE</option>
							  </select>
							</div>
							<br>
						</div>
						<div class="col-sm-9">
							<p class="text-right"><b>PLEASE LOG IN TO HOST AN EVENT</b></p>
						</div>
						</div>
					<div class="row">
						<div class="col-sm-12">
							<ul class="cus-event-cate">
								<li>VENUE NAME</li>
								<li>CAPACITY</li>
								<li class="dropdown">
									<span data-toggle="dropdown">SPORTS ACCOMODATED</span>
									<ul class="dropdown-menu">
										<li><a href="#">Link 1</a></li>
										<li><a href="#">Link 2</a></li>
										<li><a href="#">Link 3</a></li>
									</ul>
								</li>
								<li class="dropdown">
								<span data-toggle="dropdown">DATES AVAILABLE</span>
									<ul class="dropdown-menu">
										<li><a href="#">02.05.2017</a></li>
										<li><a href="#">03.05.2017</a></li>
										<li><a href="#">04.05.2017</a></li>
									</ul>
								</li>
							</ul><br>
							
						</div>
						</div>
						<div class="row">
						<div class="col-sm-4">
							<br><br>
							<p><b>LOCATION DETAILS OF VENUE</b></p><br>
							<p><b>Address :</b> FIRST LINE OF ADDRESS<br>
								SECOND LINE OF ADDRESS</p>
							<p><b>CITY/TOWN : </b>CITY/TOWN</p>
							<p><b>COUNTY : </b>COUNTY</p>
							<p><b>POSTCODE : </b>POSTCODE</p>
							
							
							<br>
							<p><b>OPENING TIME : </b>OPENING TIME</p>
							<p><b>CLOSING TIME : </b>CLOSING TIME</p>
							<p><b>COST OF VENUE : </b>COST OF VENUE</p>
							
							<br>
							
						</div>
						
						<div class="col-sm-8">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.27991336986!2d-74.25987500875648!3d40.697670063849436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1512453623159" width="100%" height="330" frameborder="0" style="border:0" allowfullscreen></iframe>
							<br><br>
							
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php } else{?>
	
<?php
if(isset($_POST['submit']))
{	
		$description = addslashes($_POST['description']);
		$address = addslashes($_POST['address']);
		$sports = implode(', ', $_POST['sports']);
		if(trim($_POST['tickets'])==trim($_POST['capacity']))
		{
		
			$sql1="insert into `event_book` (sess_name,venue,rangeInput,capacity,sports,date,time,event_name,descriptions,address,city,country,postcode,opening_time,closing_time,cost_of_venue,tickets,map) values ('".$_POST['sess_name']."','".$_POST['venue']."','".$_POST['rangeInput']."','".$_POST['capacity']."','".$sports."','".$_POST['date']."','".$_POST['time']."','".$_POST['event_name']."','".$description."','".$address."','".$_POST['city']."','".$_POST['country']."','".$_POST['postcode']."','".$_POST['opening_time']."','".$_POST['closing_time']."','".$_POST['cost_of_venue']."','".$_POST['tickets']."','".$_POST['map']."')";
			$abc=mysqli_query($con,$sql1);
			if($abc)
			{
				echo"<script>alert('Registration Successfully')</script>";
			}
			else
			{
				echo"<script>alert('Registration Fail')</script>";
			}
		} else {
			echo"<script>alert('Available tickets are must be equal to capacity')</script>";
		}
}
?>

	
	<div class="content">
	<div class="container">
		<div class="row cus-row">
			<div class="col-sm-12">
			
				<h3 class="text-left"><b>HOSTING AN EVENT</b></h3><br>
				<form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
				
				
				<input type="hidden" name="sess_name" value="<?php echo $_SESSION['user_name']; ?>">
				
				
				<div class="select-event">
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
							 
							  <select class="form-control cus-input" id="" name="venue" required>
							    <option value="" style="display:none;">Select Venue</option>
								<option name="A" value="A">A</option>
								<option name="B" value="B">B</option>
								<option name="C" value="C">C</option>
								<option name="D" value="D">D</option>
							  </select>
							</div>
							<br>
						</div>
						</div>
					<div class="row">
						<div class="col-sm-12">
							<ul class="cus-event-cate">
								<li>
                        	
                            <input class="form-control marg-bot" placeholder="Select Duretion In Minutes" type="text" id="textInput" value="">
                            	<input class="form-control" type="range" name="rangeInput" min="0" max="90" onchange="updateTextInput(this.value+'&nbsp;Minutes');" required>
                               
                        		</li>
                                
                       			<li>
                        	
                            	<input type="number" class="form-control two" name="capacity" placeholder="Capacity" min="0" max="20" required>
                            
								</li>
                        
                        		<li>
                        	
  <div class="multiselect-new">
    <div class="selectBox selectBoxthree" onclick="showCheckboxes()">
      <select class="form-control">
        <option>Select Sports</option>
      </select>
      <div class="overSelect"></div>
    </div>
	
	
    <div id="checkboxes" class="checkboxes-two">
	  <label for="one">
        <input type="checkbox" name="sports[]" value="FOOTBALL" />FOOTBALL</label>
      <label for="two">
        <input type="checkbox" name="sports[]" value="BASKETBALL" />BASKETBALL</label>
      <label for="three">
        <input type="checkbox" name="sports[]" value="VOLLEYBOLL" />VOLLEYBOLL
        </label>
        
        <label for="four">
        <input type="checkbox" name="sports[]" value="TENNIS" />TENNIS
        </label>
        
        <label for="five">
        <input type="checkbox" name="sports[]" value="HANDBALL" />HANDBALL
        </label>
        
        <label for="six">
        <input type="checkbox" name="sports[]" value="HOCKEY" />HOCKEY
        </label>
        
        <label for="seven">
        <input type="checkbox" name="sports[]" value="TABLE TENNIS" />TABLE TENNIS
        </label>
    </div>
	
	
  </div>

                        </li>
                        
                        <li>
           <div class="form-group-ex">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="date" required />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
                        </li>
                        
        <li>
           <div class="form-group-ex">
                <div class='input-group'>
                    <input type='text' placeholder="Start Time" class="form-control" name="time" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
         </li>
          </ul><br>
				</div>
				
				
		 <div class="col-sm-12">
             <div class="form-group">
                	<label class="bold" for="event">Name Of Event</label>
                    <input type="text" class="form-control" id="" placeholder="Type Yourt Event Name " name="event_name">
             </div>
         </div>
         <div class="col-sm-12">
             <div class="form-group">
                	<label class="bold" for="event">Description Of Event</label>
                    <textarea id="event" rows="8" placeholder="Type Your Event Description" name="description" class="form-control"></textarea>
             </div>
           </div>
         </div>
	     <div class="row">
			<div class="col-sm-5">
					<p><b>LOCATION DETAILS OF VENUE</b></p><br>
								<div class="form-group">
								   <div class="col-sm-12">
									 <textarea id="" rows="5" placeholder="Address" name="address" class="form-control"></textarea>
								   </div>
								</div>
								<div class="form-group">
								 
								  <div class="col-sm-12">          
									<input type="text" class="form-control" id="" placeholder="City/Town" name="city">
								  </div>
								</div>
								<div class="form-group">
								 
								  <div class="col-sm-12">          
									<input type="text" class="form-control" id="" placeholder="Country" name="country">
								  </div>
								</div>
								<div class="form-group">
								 
								  <div class="col-sm-12">          
									<input type="text" class="form-control" id="" placeholder="Postcode" name="postcode">
								  </div>
								</div>
								<div class="form-group">
								  
								  <div class="col-sm-12">          
									<input type="text" class="form-control" id="" placeholder="Opening Time" name="opening_time">
								  </div>
								</div>
								<div class="form-group">
								  
								  <div class="col-sm-12">          
									<input type="text" class="form-control" id="" placeholder="Closing Time" name="closing_time">
								  </div>
								</div>
								<div class="form-group">
								  <div class="col-sm-12">          
									<input type="text" class="form-control" id="" placeholder="Cost of Venue" name="cost_of_venue">
								  </div>
								</div>
								
								<div class="form-group">
								  <div class="col-sm-12">          
									<input type="text" class="form-control" id="" placeholder="Available Tickets" name="tickets">
								  </div>
								</div>
						</div>
						
						<div class="col-sm-7">
							 <textarea  rows="8" placeholder="Location (map)" class="form-control" name="map"></textarea>
							<br><br>
							<span class="cus-book"><input type="submit" class="btn btn-success" value="BOOK" name="submit"></span>
						</div>
						
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<?php } ?>
<script>
function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
        }
</script>

 <script type="text/javascript">
		var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
        </script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datepicker();
            });
</script>
	
<?php

include('footer.php');

?>