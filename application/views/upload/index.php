<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css';?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-migrate-1.2.1.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>File Upload</h1>
			<a class="btn btn-success" href="<?php echo site_url('upload/filelist');?>">File List</a>
			<hr>			
			<div class="col-sm-8">
				<form name="file-upload" id="file-upload" action="<?php echo site_url('upload/do_upload');?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="file-name">File Name</label>
						<input type="text" id="file-name" name="file-name" class="form-control">
					</div>
					<div class="form-group">
						<label for="file">File</label>
						<input type="file" id="userfile" name="userfile">
					</div>
					<div class="form-group">
						<input type="submit" name="file-upload" id="file-upload" class="btn btn-primary" value="upload">
					</div>
				</form>
				<div class="form-group">
					<?php 
						if($message != ''){							
					?>
						<h3><?php echo $message; ?></h3>
					<?php
						}
					?>
				</div>
			</div>			
		</div>
	</div>
</body>
</html>