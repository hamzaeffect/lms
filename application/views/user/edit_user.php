<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div class="col-md-9" style="padding-left: 10px">

<strong>Edit User</strong>
<br /><br />
<?php 
echo form_open('User_Management/edit_user/'.$user[0]['id']); 
echo validation_errors();
?>
Username
<input type="text" name="user_name" id="user_name" value="<?=$user['0']['user_name'];?>"/>
<br /><br />
Active
<select name="active" id="active">
<?php 
if($user[0]['active'] == '1')
{?>
	<option value="1">Yes</option>
	<option value="0">No</option><?php
}
else
{?>
	<option value="0">No</option>
	<option value="1">Yes</option><?php
}?>
</select>
<br /><br />
User Type
<select name="type" id="type">
<option value="student">Student</option>
<option value="teacher">Teacher</option>
<option value="parent">Parent</option>
</select>
<br /><br />
<input type="submit" value="Save" name="submit" id="submit">
<button type="button" onclick="location.href='<?=site_url();?>/User_Management'">Cancel</button>
<?php form_close(); ?>
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
