<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div class="col-md-9" style="padding-left: 10px">

<h4 style="color:grey;"><strong>Create Course</strong></h4>
<br /><br />
<?php 
echo form_open('Course_Management/create_course'); 
echo validation_errors();
?>
<div class="form-group">
	<label class="form-label" >Name</label>
	<input type="text" name="name" id="name" placeholder="Name" class="form-control"/>
</div>
<div class="form-group">
	<label class="form-label" >
		Short Name
	</label>
	<input type="text" name="short_name" id="short_name" placeholder="Short Name" class="form-control"/>
</label>
<div class="form-group">
	<label class="form-label" >
		Code
	</label>
<input type="text" name="code" id="code" placeholder="Code" class="form-control"/>
</label>
<div class="form-group">
	<label class="form-label" >
		Credit Hours
	</label>
	<input type="text" name="credit_hours" id="credit_hours" placeholder="Credit Hours" class="form-control"/>
</div>
<div class="form-group">
	<label class="form-label" >
		Course Description
	</label>
	<textarea name="description" id="description" class="form-control"></textarea>
</div>
<br /><br />
<br /><br />
<input type="submit" value="Save" name="submit" id="submit" class="btn btn-success">
<button type="button" onclick="location.href='<?=site_url();?>/Course_Management'" class="btn btn-danger">Cancel</button>

<?php form_close(); ?>
<br /><br />
<?php
if (isset($message))
{
	echo $message;
}
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
