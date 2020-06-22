<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
<body>
    <article id="front">
		<section>
			<h1>Welcome to Setiawan Spooring Front Desk System</h1>
			<p>Pilih menu di atas untuk melanjutkan</p>

            <p>
                <h2>Data User</h2>
                <h4>Username</h4>
                <div><?= $user['username']; ?></div>
                <h4>Nama Lengkap</h4>
                <div><?= $user['pegawai_nama']; ?></div>
                <h4>Jabatan</h4>
                <div>
                    <?php foreach ($user['jabatan'] as $desc):?>
                    <?= $desc['jabatan_deskripsi'] ?><br>
                    <?php endforeach; ?>
                </div>
            </p>
		</section>
	</article>
</body>
</html>