<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<title><?=$data['title'].' - '.SITETITLE;?></title>

	<!-- CSS -->
	<?php
		helpers\Assets::css(array(
			helpers\Url::template_path() . 'css/bootstrap.min.css',
            helpers\Url::template_path() . 'css/bootstrap-theme.min.css',
			helpers\Url::template_path() . 'css/login.css',
			helpers\Url::template_path() . 'css/dashboard.css',
		))
	?>

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Project Score - Welkom <?=$data['firstname'].' '.$data['middlename'].' '.$data['lastname'];?></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/auth/logout">Uitloggen</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li><a href="/administration">Dashboard</a></li>
				<li><a href="/administration/plan-exam">Planning Tentamens</a></li>
				<li><a href="/administration/prepare-exam">Voorbereiden Tentamens</a></li>
				<li><a href="/administration/evaluate-exam">Evaluatie Tentamens</a></li>
				<li><a href="/administration/management-reporting">Management Rapportage</a></li>
			</ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
