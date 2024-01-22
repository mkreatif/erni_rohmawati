        <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
        <script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>
        <script src="<?=base_url('assets/js/additional-methods.min.js');?>"></script>

        <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>

        <?php if (isset($scripts)) {
    foreach ($scripts as $path) {?>
                    <script src="<?=base_url($path);?>"></script>
        <?php }}?>
    </body>
</html>