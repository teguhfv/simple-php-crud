<?php 
$id = isset($_GET['id'])?$_GET['id']:'notfound';
if ($id != 'notfound'): 
	$result = mysqli_query($mysqli, "SELECT a.* , b.display_name FROM employees a join employee_types b on a.employee_types_id = b.id where a.id = $id "); 
	while ($res = mysqli_fetch_array($result)) {

		?>
		<div class="row justify-content-center">
			<h2>Edit Employee</h2>
		</div> 
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-8">
				<form method="POST" >
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="hidden" class="form-control" id="id" name="id" placeholder="id" required="required" value="<?php echo $res['id'] ?>">
							<input type="textbox" class="form-control" id="name" name="name" placeholder="Name" required="required" value="<?php echo $res['name'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required"  value="<?php echo $res['email'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="phone" class="col-sm-2 col-form-label">Phone</label>
						<div class="col-sm-10">
							<input type="textbox" class="form-control" id="phone" name="phone" placeholder="Phone"  value="<?php echo $res['phone'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"> <?php echo $res['address'] ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="sex" class="col-sm-2 col-form-label">Sex</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="sex1" value="1" <?php echo ($res['sex'] == 'M' ?  'checked':'')?> >
								<label class="form-check-label" for="sex1">M</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="sex2" value="2" <?php echo ($res['sex'] == 'F' ? 'checked':'') ?> >
								<label class="form-check-label" for="sex2">F</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="employee_types" class="col-sm-2 col-form-label">Employee Type</label>
						<div class="col-sm-10">
							<select id="employee_types" name="employee_types" class="form-control" required="required">
								<option selected>Choose...</option>
								<?php 
								$result = mysqli_query($mysqli, "SELECT a.* FROM employee_types a "); 
								while($employee = mysqli_fetch_array($result)) {
									$selected = $employee['id'] == $res['employee_types_id'] ? 'selected="selected"':''; 		
									echo '<option value = '.$employee['id'].' '.$selected.'>'.$employee['display_name'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="justify-content-center">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="index.php"><button class="btn btn-danger">Cancel</button></a>

					</div>
				</form>
			</div>
		</div>
	<?php }
endif ?>
