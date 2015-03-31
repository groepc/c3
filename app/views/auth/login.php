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
	<form class="form-signin" method="post" action="">
		<h2 class="form-signin-heading">Project Score - Administratie</h2>
		<label for="username" class="sr-only">Gebruikersnaam</label>
		<input type="text" id="username" name="username" class="form-control" placeholder="Gebruikersnaam" required autofocus>
		<label for="password" class="sr-only">Wachtwoord</label>
		<input type="password" id="password" name="password" class="form-control" placeholder="Wachtwoord" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Inloggen</button>
	</form>
</div>

<!-- JS -->
<?php
helpers\Assets::js(array(
	helpers\Url::template_path() . 'js/jquery-2.1.3.min.js',
	helpers\Url::template_path() . 'js/bootstrap.js',
));
?>

</body>
</html>