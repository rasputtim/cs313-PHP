<div class="container">
	<div class="col-md-6 col-md-offset-3 " id="form_container">
                        <?php 
                            switch ($success){
							case 0:
							break;
							case 1:
								echo '<div id="" style="width:100%; height:100%;  "> <h3>SUCESS!</h3> </div>';
								break;
							case 2:
								echo'<div id="" style="width:100%; height:100%; "> <h3>Error</h3>ERROR </div>';
								break;
						    }
						 
                            if ($id == -1){   //CREATE NEW Record
                                echo "<h1>Create a Period</h1>";
                                echo'<form role="form" method="post" id="reused_form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).' " >';
                                echo'<input type="hidden" class="form-control" id="is_insert" name="create2" value="true">';
                      
                                
                            }else {
                                echo "<h1>Update existing Period</h1>";
                                echo'<form role="form" method="post" id="reused_form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).' " >';
                                echo'<input type="hidden" class="form-control" id="is_update" name="update2" value="true">';
                                echo '<input class="form-control" type=hidden name=id value="'.$id.'">';
                            }
                        ?>
							<div class="row">
								
								<div class="col-sm-6 form-group">

									<label for="title"> Title:</label>
									<input type="text" class="form-control" id="title" name="title" value="<?php echo $my_title; ?>" required>
								</div>
								<div class="col-sm-6 form-group">
								<div class="input-group date" data-provide="datepicker">
									<label for="keydate"> Kay Date:</label>
									<input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="keydate" name="keydate" value="<?php echo $my_keydate; ?>" required>
								</div>
								</div>
							</div>
							<div class="row">
							<div class="form-date-from form-icon">
								<label for="date_from">From</label>
								<input type="text" id="inidate" class="date_from" placeholder="Pick a date" />
								<!-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span> -->
							</div>
							<div class="form-date-to form-icon">
								<label for="date_to">To</label>
								<input type="text" id="enddate" class="date_to" placeholder="Pick a date" />
								<!-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span> -->
							</div>
								<div class="col-sm-6 form-group form-date-from">

									<label for="inidate"> Initial Date:</label>
									<input type="text" class="form-control date_from" id="date_from" name="inidate" value="<?php echo $my_inidate; ?>" required>
								</div>
								<div class="col-sm-6 form-group form-date-to">

									<label for="enddate"> End Date:</label>
									<input type="text" class="form-control date_to" id="date_to" name="enddate" value="<?php echo $my_enddate; ?>" required>
								</div>
							</div>
							<div class="row">
							
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="iscurrent"   name="iscur" value="1" <?php echo $my_iscur_check; ?> >
								<label class="form-check-label" for="iscurrent">Is Current</label>
							</div>
								
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<label for="descript"> Description:</label>
									<textarea class="form-control" type="textarea" name="descript" id="descript" maxlength="6000" rows="3" ><?php echo $my_description; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<button type="submit" class="btn btn-lg btn-default pull-left" >Send &rarr;</button>
								</div>
							</div>
						</form>
								
						
	</div>

	</div>