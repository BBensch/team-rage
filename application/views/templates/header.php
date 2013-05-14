<!DOCTYPE html>
<?php
  $this->load->helper('url');
?>
<html>
<head>
  <title><?php echo $title ?> Team Rage</title>

  <link href="../../../assets/css/bootstrap.css" rel="stylesheet">
  <style type="text/css">
    body {
      padding-top: 60px;
      padding-bottom: 40px;

    }
  </style>
  <link href="../../../assets/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
  
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	  <span class="icon-bar">
	  <span class="icon-bar">
	  <span class="icon-bar">
        </a>
        <a class="brand" href="#">Team Rage</a>
        <div class="nav-collapse">
          <ul class="nav">
	    <li><a href=<?php echo(site_url());?>>Rage Status</a></li>
            <li><a href=<?php echo(site_url("updaterage"));?>>Image Rage</a></li>
	    <li><a href=<?php echo(site_url("quoterage"));?>>Quote Rage</a></li>
	    <li><a href=<?php echo(site_url("ragemanagement"));?>>Rage Management</a></li>
          </ul>
	  <a href=<?php echo(site_url());?> class="brand" style="font-size:1em; margin-top:5px; float:right">Last Updated: <?php echo(date("n/j/Y - g:i A")); ?></a>
	<?php if($this->session->userdata('logged_in')) : ?>
	  <a href=<?php echo(site_url("logout"));?> class="brand" style="font-size:1em; margin-top:5px; float:right">Logout</a>
	<?php else : ?>
          <a href=<?php echo(site_url("login"));?> class="brand" style="font-size:1em; margin-top:5px; float:right">Login</a>
	<?php endif; ?>
	</div>
      </div>
    </div>
  </div>
