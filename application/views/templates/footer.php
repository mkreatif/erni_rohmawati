        <div id="loading-overlay">
            <div class="spinner"></div>
        </div>
        <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
        <script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>
        <script src="<?=base_url('assets/js/additional-methods.min.js');?>"></script>
        <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
        <script src="<?=base_url('assets/js/jquery.datatables.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables.bootstrap.min.js');?>"></script>

        <script>
            $(document).ready(function() {
                $(document).ajaxStart(function() {
                    // Show loading overlay when AJAX starts
                    $('#loading-overlay').show();
                });

                $(document).ajaxStop(function() {
                    // Hide loading overlay when AJAX stops (completed)
                    $('#loading-overlay').hide();
                });

	            // $("#GeneralDataTable").DataTable();
               var table= new DataTable('#GeneralDataTable');
               table.on('click', 'tbody tr', (e) => {
                    let classList = e.currentTarget.classList;

                    if (classList.contains('selected')) {
                        classList.remove('selected');
                    }
                    else {
                        table.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
                        classList.add('selected');
                    }
                });

            });

        </script>

        <?php if (isset($scripts)) {foreach ($scripts as $path) {?>
        <script src="<?=base_url($path);?>"></script>
        <?php }}?>
    </body>

</html>