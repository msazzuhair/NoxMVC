    <nav id="navigation">
		<img class="logo" src="<?= asset_url('img/logo.png'); ?>">
		<ul>
			<li><a href="<?= site_url(); ?>" class="cssmenu">Home</a></li>
			<li><a href="<?= site_url('kasir'); ?>" class="cssmenu">Kasir</a></li>
			<li class="has-sub"><a href="#" class="cssmenu">User</a>
				<ul>
					<li><a href="<?= site_url('auth/logout'); ?>" class="cssmenu">Logout</a></li>
				</ul>
			</li>
		</ul>
	</nav>