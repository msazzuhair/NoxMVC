<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page['title'].' | '.$site['title']; ?></title>
    <link rel="shortcut icon" href="<?= asset_url('img/favicon.png'); ?>" type="image/x-icon">
	<?php if (isset($css)) : foreach ($css as $link) :?>
    <link rel="stylesheet" href="<?= asset_url('css/'.$link.'.css'); ?>">
    <?php endforeach;endif;?>
</head>
<body>
