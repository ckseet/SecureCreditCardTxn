<?php

        $to_root='/../../';
        $title = "Adstxt Engine - Domain Target";
        include __DIR__.$to_root.'view/common/head.php';
        include __DIR__.$to_root.'view/common/navbar.php';
        include __DIR__.$to_root.'controller/database.php';
	include __DIR__.$to_root.'controller/tables.php';
?>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-6">
	<form action="<?php echo $_GET['form_target']; ?>">
		<div class="form-group">
			<font color="red"><?php if(isset($_GET['error_message'])){ print urldecode($_GET['error_message']); } ?></font>
			<small id="dtHelp" class="form-text text-muted">Type in classification  or select from list of <a href="/portfolio/adstxtengine/view/classification/classifications.php">all classifications</a></small>
			<label for="classification">Classification</label>
    			<input type="text" class="form-control" id="dt_url" name="classification" aria-describedby="dtHelp" placeholder="e.g. news">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
	<div class="col-sm-4"></div>
	<div class="col-sm-1"></div>
</div>
<?php
        include __DIR__.$to_root.'view/common/foot.php';
?>
