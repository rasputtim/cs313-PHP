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
                                echo "<h1>Create a new Transaction</h1>";
                                echo'<form role="form" method="post" id="reused_form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).' " >';
                                echo'<input type="hidden" class="form-control" id="is_insert" name="create2" value="true">';
                      
                                
                            }else {
                                echo "<h1>Update existing Transaction</h1>";
                                echo'<form role="form" method="post" id="reused_form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).' " >';
                                echo'<input type="hidden" class="form-control" id="is_update" name="update2" value="true">';
                                echo '<input class="form-control" type=hidden name=id value="'.$id.'">';
                            }
                        ?>
                            <div class="row">
								<div class="col-sm-6 form-group">

									<label for="duedate"> Transaction Due Date:</label>
									<input type="text" class="form-control" id="duedate" name="duedate" value="<?php echo $my_duedate; ?>" required>
								</div>
								<div class="col-sm-6 form-group">

									<label for="amount"> Transaction Amount:</label>
									<input type="text" class="form-control" id="amount" name="amount" value="<?php echo $my_amount; ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group">
									<label for="idcat"> category:</label>
									<select class="form-control" id="category" name="idcat" required >
									<option value= "">Select one category</option>
									<option value= "<?php echo $my_idcat;>?>"><?php echo $my_catname;?></option>;
                                    <?php
                                    if($my_category != '')
                                    echo'<option value= " '.$my_idcat.'" selected >'.$my_category.'</option>';
									?>
									
									<?php 
									foreach ($db->query('SELECT * FROM public.ezfin_category') as $row)
									{
									echo '<option value="'.$row["catid"].'">'.$row["name"].'</option>';
									}
									?>
                                    
									</select>
									
									
								</div>
								
								<div class="col-sm-6 form-group">

								<label for="paydate"> Payment/Receive Date:</label>
								<input type="text" class="form-control" id="paydate" name="paydate" value="<?php echo $my_paydate; ?>" required>
								</div>
									
							
							</div>
							
							<div class="row">
										<p> </p>
								<div class="form-check">
								<input type="checkbox" class="form-check-input" id="iscurrent"   name="iscur" value="1" <?php echo $my_status_check; ?> >
								<label class="form-check-label" for="iscurrent">Payd / Received</label>
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