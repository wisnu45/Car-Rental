 <div class="form-group has-feedback">
							  <label>Model</label>
								<select class="form-control" style="width: 100%;" name="model" required="" >
								 <option value="" disabled selected>Select your Option</option>
									<?php
									foreach($models as $data){	
									 ?>
									<option value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
								<?php
									}
								  ?>
								</select>
						   </div>