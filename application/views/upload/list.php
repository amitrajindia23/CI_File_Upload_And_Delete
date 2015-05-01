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
			<h1>File List</h1>
			<a class="btn btn-success" href="<?php echo site_url('upload');?>">Upload Files</a>
			<hr>			
			<div class="col-sm-12">	
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>File Name</th>
							<th>File</th>
							<th>Date</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$index = 0;
							foreach ($fileList as $key => $value) {
						?>
								<tr>
									<td><?php echo $index+1; ?></td>
									<td><?php echo $value['file_name']; ?></td>
									<td>
										<a href="<?php echo base_url().$value['file_path']; ?>"><?php echo $value['file_name']; ?></a>
									</td>
									<td><?php echo $value['updated_at']; ?></td>
									<td>
										<a href="<?php echo site_url('upload/delete/'.$value['id']) ?>">Delete</a>
									</td>
								</tr>		
						<?php
							}
						?>		
					</tbody>
				</table>			
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