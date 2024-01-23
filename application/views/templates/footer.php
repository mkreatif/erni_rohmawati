        <div id="loading-overlay">
            <div class="spinner"></div>
        </div>

        <!-- The Modal -->
        <div class="modal" id="modal-info">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 id="modalTitleContent" class="modal-title">
                        <!-- Modal Title -->
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" id="modalBodyContent">
                    <!-- Dynamic content will be added here -->
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>


        <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
        <script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>
        <script src="<?=base_url('assets/js/additional-methods.min.js');?>"></script>
        <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
        <script src="<?=base_url('assets/js/jquery.datatables.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables.bootstrap.min.js');?>"></script>
        <script src="<?=base_url('assets/js/chart.umd.min.js');?>"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script> -->

        <script>
            function showInfo( message, title = "Informasi"){
                // Update modal body content
                $("#modalTitleContent").html(`<p>${title}</p>`);
                $("#modalBodyContent").html(`<p class='text-center'>${message}</p>`);

                // Open the modal
                $("#modal-info").modal();
            };

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