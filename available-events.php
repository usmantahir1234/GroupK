<?php
include('connection.php');
include('header.php');

//print("<pre>");
//print_r($_POST);
?>

<div class="content">
	<div class="container">
		<div class="row cus-row">
			<div class="col-sm-12">
			<!--<h3 class="text-left"><b>AVAILABLE EVENTS</b></h3>--><br>
				<div class="tabs tabs-style-tzoid">
					<nav>
						<ul>
							<li><a href="#section-tzoid-1" ><h3>AVAILABLE EVENTS</h3></a></li>
							
						</ul>
					</nav>
					<div class="content-wrap">
					
						<section id="section-tzoid-1">
							<div id="custom-search-input">
								<div class="input-group col-md-3 cus-input-grp">
									<!--<input type="text" class="  search-query form-control" placeholder="Search" />-->
									<!--<span class="input-group-btn">
										<button class="btn btn-danger" type="button">
											<span class=" glyphicon glyphicon-search"></span>
										</button>
									</span>-->
								</div>
							</div>
                   <form name="searchEvent" id="searchEvent" action="" method="post">         
                    <div class="col-md-12">
                    	<ul class="criteria">
                        <li>CRITERIA:</li>
                        
                        <li>
                    
                        <div class="multiselect">
                            <div class="selectBox" onclick="showCheckboxes()">
                                <select class="form-control">
                                	<option>Select Sports</option>
                                </select>
                                <div class="overSelect"></div>
                            </div>
                            <div id="checkboxes">
                                <label for="one">
                                	<input type="checkbox" id="one" name="sports[]" value="FOOTBALL" />FOOTBALL</label>
                                <label for="two">
                                	<input type="checkbox" id="two" name="sports[]" value="BASKETBALL" />BASKETBALL</label>
                                <label for="three">
                               	 <input type="checkbox" id="three" name="sports[]" value="VOLLEYBOLL" />VOLLEYBOLL
                                </label>
                                <label for="four">
                                    <input type="checkbox" id="four" name="sports[]" value="TENNIS" />TENNIS
                                </label>
                                 <label for="five">
                                    <input type="checkbox" id="five" name="sports[]" value="HANDBALL" />HANDBALL
                                </label>
                                 <label for="six">
                                    <input type="checkbox" id="six" name="sports[]" value="HOCKEY" />HOCKEY
                                </label>
                                 <label for="seven">
                                    <input type="checkbox" id="seven" name="sports[]" value="TABLE TENNIS" />TABLE TENNIS
                                </label>
                             </div> 
                        </div>
                         </li>
                        
                        <li>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input placeholder="Form" type='text' name="fromDate" id="fromDate" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input placeholder="To" type='text' name="toDate" id="toDate" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                             <button class="btn btn-success" type="submit">Search</button>
                         </li>
                     </ul>
                     </div>
                    
                    </form>                     
                            
							<div class="events">
							<?php 
								if(count($_POST)>0)
								{
									
									if($_POST['fromDate']!='' && $_POST['toDate']!='')
									{
 										$qry = "select * from event_book where ";
										if(count($_POST['sports'])>0)
										{
											$qry.='(';
											foreach($_POST['sports'] as $sp)
											{
												$qry .= " (sports LIKE '$sp%') OR";
											}
											
											$qry = preg_replace('/OR$/is',') and ',$qry);
											 
										}
										if($_POST['fromDate']!='' && $_POST['toDate'])
										{
											$qry .= " date between '".$_POST['fromDate']."' and  '".$_POST['toDate']."'";
										} else {
											$qry = preg_replace('/and\s*$/is','',$qry);
										}
										//echo $qry;
										
										?>
                                        
                                        
                                        <table class="table table-fixed cus-table">
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
                                            $searchQry=mysqli_query($con, $qry);
                                            while($searchRow=mysqli_fetch_array($searchQry))
                                            {
            
                                           echo"<tr>
                                              <td class='col-xs-3'><a href='book-event.php?up=".$searchRow['id']."'>".$searchRow['event_name']."</a></td>
                                              <td class='col-xs-3'><a href='book-event.php?up=".$searchRow['id']."'>".$searchRow['date']."</a></td>
                                              <td class='col-xs-3'><a href='book-event.php?up=".$searchRow['id']."'>".$searchRow['venue']."</a></td>
                                              <td class='col-xs-3'><a href='book-event.php?up=".$searchRow['id']."'>".$searchRow['tickets']."</a></td>
                                            </tr>";
                                      
                                            }
            
                                            ?>								
                                          </tbody>
                                        </table><br>
                                        
                                        
										
										<?php
									} else {
										
										echo 'Please select From and To date';
									}
									 
									
									//
							?>
                            	 
                            <?php } else {?>
							<table class="table table-fixed cus-table">
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
								$sql="select * from `event_book`";
								$query=mysqli_query($con, $sql);
								while($row=mysqli_fetch_array($query))
								{

	                           echo"<tr>
								  <td class='col-xs-3'><a href='book-event.php?up=".$row['id']."'>".$row['event_name']."</a></td>
								  <td class='col-xs-3'><a href='book-event.php?up=".$row['id']."'>".$row['date']."</a></td>
								  <td class='col-xs-3'><a href='book-event.php?up=".$row['id']."'>".$row['venue']."</a></td>
								  <td class='col-xs-3'><a href='book-event.php?up=".$row['id']."'>".$row['tickets']."</a></td>
								</tr>";
                          
								}

								?>								
							  </tbody>
							</table><br>
                            <?php } ?>
							</div>
							<div class="row">
								<div class="col-sm-10 col-sm-offset-1">
									<div class="row">
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
								</div>
							</div>
						</section>
						
						<section id="section-tzoid-2"><p>2</p></section>
						<section id="section-tzoid-3"><p>3</p></section>
						<section id="section-tzoid-4"><p>4</p></section>
						<section id="section-tzoid-5"><p>5</p></section>
						<section id="section-tzoid-6"><p>6</p></section>
						<section id="section-tzoid-7"><p>7</p></section>
					</div><!-- /content -->
				</div><!-- /tabs -->
			</div>
		</div>
		
	</div>
</div>
<?php

include('footer.php');

?>

<script src="js/cbpFWTabs.js"></script>
	<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
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
				$('#datetimepicker2').datepicker();
            });
		</script>
        