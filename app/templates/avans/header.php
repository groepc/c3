<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>

	<!-- CSS -->
	<?php
		helpers\Assets::css(array(
			helpers\Url::template_path() . 'css/bootstrap.min.css',
			helpers\Url::template_path() . 'css/login.css',
			helpers\Url::template_path() . 'css/dashboard.css',
		))
	?>

</head>
<body>

<div class="container">
