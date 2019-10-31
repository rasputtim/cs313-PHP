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
										$image_list = trim ($row['icon']);
										echo "<option data-img-src='images/$image_list' value='$image_list'>$image_list</option>";
									}
									?>
                                    
									</optgroup>
									<optgroup label="Outcomes">
									<?php
									$stmt = get_db()->prepare('SELECT icon FROM public.ezfin_category WHERE operation=1');

									$stmt->execute();
									$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
									
									foreach ($rows as $row)
									{
										$image_list = trim ($row['icon']);
										echo "<option data-img-src='images/$image_list' value='$image_list'>$image_list</option>";
									}
									?>
									</optgroup>
									<optgroup label="Informatives">
									<?php
									$stmt = get_db()->prepare('SELECT icon FROM public.ezfin_category WHERE operation=2');

									$stmt->execute();
									$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
									
									foreach ($rows as $row)
									{
										$image_list = trim ($row['icon']);
										echo "<option data-img-src='images/$image_list' value='$image_list'>$image_list</option>";
									}
									?>
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