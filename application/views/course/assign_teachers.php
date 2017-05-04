<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div class="col-md-9" style="padding-left: 10px">

<h4 style="color:grey;"><strong>Edit User</strong></h4>
<br /><br />
<?php 
	echo form_open('Course_Management/assign_teachers/'.$course[0]['id']); 
	echo validation_errors();
?>
		<div class="form-group">
			<label class="form-label">
				Course Name
			</label>
			<input type="text" name="name" id="name" placeholder="Name" value="<?=$course[0]['name']?>" disabled class="form-control disable"/>
		</div>
		<div class="form-group">
			<label class="form-label">Select Employees</label>
			<select id="teacher-dropdown" class="form-control" name="teachers">
			<?php foreach ($teachers as $key => $value) { ?>
				<option value="<?= $value->id ?>"><?= $value->user_name ?></option>
			<?php } ?>	
			</select>
		</div>
		<br /><br />
		<input type="submit" value="Save" name="submit" id="submit" class="btn btn-primary">
		<button type="button" onclick="location.href='<?=site_url();?>/Course_Management'" class="btn btn-danger">Cancel</button>
<?php 
	form_close(); 
?>
<br /><br />
<?php
?>
</div>
  <!-- End page content -->
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
