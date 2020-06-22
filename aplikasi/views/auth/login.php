<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login <?= $site['title'] ?></title>
    <link rel="shortcut icon" href="<?= asset_url('img/favicon.png'); ?>" type="image/x-icon">
	<?php if (isset($css)) : foreach ($css as $link) :?>
    <link rel="stylesheet" href="<?= asset_url('css/'.$link.'.css'); ?>">
    <?php endforeach;endif;?>
</head>
<body class="body">
	<div class="kotak-login">
		<div class="judul-login">
			<img src="<?= asset_url('img/logo.png'); ?>" width="60%"><br>
			Login Pegawai<br>
            <small><?= getFlash('login-error'); ?></small>
		</div>
		<form action="<?= site_url('auth/verify'); ?>" method="post">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" class="form-login" placeholder="Username" autofocus required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" class="form-login" placeholder="Password" required> 
			<div><button type="submit" class="tombol-login">Masuk</button></div>
	 	</form>
	</div>
    <?php if (isset($js)) : foreach ($js as $link) :?>
    <script type="text/javascript" src="<?= asset_url('js/'.$link.'.js'); ?>"></script>
    <?php endforeach;endif;?>
</body>
</html>