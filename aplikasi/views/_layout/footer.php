    <?php if (isset($js)) : foreach ($js as $link) :?>
    <script type="text/javascript" src="<?= asset_url('js/'.$link.'.js'); ?>"></script>
    <?php endforeach;endif;?>
</body>
</html>