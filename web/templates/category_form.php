<?php
require_once('inc/functions_db.php');
?>
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
                                echo "<h1>Create a new Category</h1>";
                                echo'<form role="form" method="post" id="reused_form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).' " >';
                                echo'<input type="hidden" class="form-control" id="is_insert" name="create2" value="true">';
                      
                                
                            }else {
                                echo "<h1>Update existing Category</h1>";
                                echo'<form role="form" method="post" id="reused_form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).' " >';
                                echo'<input type="hidden" class="form-control" id="is_update" name="update2" value="true">';
                                echo '<input class="form-control" type=hidden name=id value="'.$id.'">';
                            }
                        ?>
                            <div class="row">
								<div class="col-sm-6 form-group">

									<label for="name"> Category Name:</label>
									<input type="text" class="form-control" id="name" name="name" value="<?php echo $my_name; ?>" required>
								</div>
								<div class="col-sm-6 form-group">

									<label for="alias"> Category Alias:</label>
									<input type="text" class="form-control" id="alias" name="alias" value="<?php echo $my_alias; ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="icon"> Icon:</label>
									<select class="form-control image-picker show-html" id="icon" name="icon" required >
                                    <option value= "">Select one icon</option>
                                    <?php
                                    if($my_icon != '')
                                    echo'<option data-img-src="images/'.$my_icon.'" value= " '.$my_icon.'" selected >'.$my_icon.'</option>';
									?>
									<optgroup label="Incomes">
									<?php
									$stmt = get_db()->prepare('SELECT icon FROM public.ezfin_category WHERE operation=0');

									$stmt->execute();
									$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
									
									foreach ($rows as $row)
									{
										$image_list = $row['icon'];
										echo "<option data-img-src='images/$image_list' value='$image_list'>$image_list</option>";
									}
									?>
                                    
									</optgroup>
									<optgroup label="Outcomes">
									<option data-img-src="images/cat_gambling_inc.png" value="cat_gambling_inc.png">cat_gambling_inc.png</option>
									<option data-img-src="images/cat_general_inc.png" value="cat_general_inc.png">cat_general_inc.png</option>
									<option data-img-src="images/cat_general_out.png" value="cat_general_out.png">cat_general_out.png</option>
									<option data-img-src="images/cat_groceries.png" value="cat_groceries.png">cat_groceries.png</option>
									<option data-img-src="images/cat_housing.png" value="cat_housing.png">cat_housing.png</option>
									<option data-img-src="images/cat_income.png" value="cat_income.png">cat_income.png</option>
									<option data-img-src="images/cat_income_green.png" value="cat_income_green.png">cat_income_green.png</option>
									<option data-img-src="images/cat_income_green_peq.png" value="cat_income_green_peq.png">cat_income_green_peq.png</option>
									<option data-img-src="images/cat_informative.png" value="cat_informative.png">cat_informative.png</option>
									<option data-img-src="images/cat_informative_bw.png" value="cat_informative_bw.png">cat_informative_bw.png</option>
									<option data-img-src="images/cat_informative_peq.png" value="cat_informative_peq.png">cat_informative_peq.png</option>
									<option data-img-src="images/cat_informative_round.png" value="cat_informative_round.png">cat_informative_round.png</option>
									<option data-img-src="images/cat_insurance.png" value="cat_insurance.png">cat_insurance.png</option>
									<option data-img-src="images/cat_investments.png" value="cat_investments.png">cat_investments.png</option>
									<option data-img-src="images/cat_medical.png" value="cat_medical.png">cat_medical.png</option>
									<option data-img-src="images/cat_pets.png" value="cat_pets.png">cat_pets.png</option>
									<option data-img-src="images/cat_rent_bill.png" value="cat_rent_bill.png">cat_rent_bill.png</option>
									<option data-img-src="images/cat_rent_inc.png" value="cat_rent_inc.png">cat_rent_inc.png</option>
									<option data-img-src="images/cat_retirement.png" value="cat_retirement.png">cat_retirement.png</option>
									<option data-img-src="images/cat_retirement_plan.png" value="cat_retirement_plan.png">cat_retirement_plan.png</option>
									<option data-img-src="images/cat_salary.png" value="cat_salary.png">cat_salary.png</option>
									<option data-img-src="images/cat_savings.png" value="cat_savings.png">cat_savings.png</option>
									<option data-img-src="images/cat_taxes.png" value="cat_taxes.png">cat_taxes.png</option>
									<option data-img-src="images/cat_tax_refunds.png" value="cat_tax_refunds.png">cat_tax_refunds.png</option>
									<option data-img-src="images/cat_transportation.png" value="cat_transportation.png">cat_transportation.png</option>
									<option data-img-src="images/cat_unknown.png" value="cat_unknown.png">cat_unknown.png</option>
									<option data-img-src="images/cat_utilities.png" value="cat_utilities.png">cat_utilities.png</option>
									<option data-img-src="images/cat_working.png" value="cat_working.png">cat_working.png</option>
									</optgroup>
									</select>
									
									
								</div>
								

									
							
							</div>
							
							    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="operation" id="inlineRadio1" value="0" <?php echo $my_checked_income;?>>
                                    <label class="form-check-label" for="inlineRadio1">INCOME</label>
                                </div>
								<div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="operation" id="inlineRadio2" value="1" <?php echo $my_checked_outcome;?>>
                                    <label class="form-check-label" for="inlineRadio2">OUTCOME</label>
								</div>
								<div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="operation" id="inlineRadio3" value="2" <?php echo $my_checked_informative;?>>
                                    <label class="form-check-label" for="inlineRadio3">INFORMATIVE</label>
								</div>
							
							<div class="row">
								<div class="col-sm-12 form-group">
									<label for="descript"> Description:</label>
									<textarea class="form-control" type="textarea" name="descript" id="descript" maxlength="6000" rows="3" ><?php echo $my_description; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<button type="submit" class="button2" >Send &rarr;</button>
									<?php
									if (!$is_create)
										echo "<a class='button2' id= 'mylink' href='inccats.php?delete_data=".$id."'>DELETE</a>";
									?>
								</div>
								
							</div>
						</form>
								
						
	</div>

	</div>