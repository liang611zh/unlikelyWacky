<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css');?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/default.css');?>"/>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome-4.7.0/css/font-awesome.min.css');?>">
	</head>
	<body>
		<div class="wrapper">
			{menubar}
			<div class="container-fluid">
				<nav id="topbar" class="navbar navbar-light">
					<button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</button>
				</nav>
				<div id="content" class="row">
					<div class="col">
						{content}
						<!--<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. 
							{ci_version}</p>-->
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
			});
		});
	</script>
</html>