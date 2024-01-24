<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery.datatables.min.css'); ?>?v=<?=time()?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/main.css'); ?>?v=<?=time()?>" rel="stylesheet">
    <title><?php echo $title; ?></title>
    <script>
    var base_url = "<?php echo base_url(); ?>";
    var globalRefresh = false;
    // Function to generate a serial ID based on the current number of data items
    function generateSerialID(prefix = 'D', currentCount) {
        // Calculate the number of leading zeros needed
        var zeros = '000000';
        var leadingZeros = zeros.substring(0, zeros.length - currentCount.toString().length);

        // Combine the prefix, leading zeros, and current count to create the serial ID
        var serialID = prefix + leadingZeros + currentCount;

        return serialID;
    }
    </script>
</head>

<body>
    <!-- Page-specific content goes here -->
    <section>
        <?php $this->load->view($content_view, );?>
    </section>
    <section>
        <!-- The Confirmation Modal -->
        <div class="modal" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmTitleContent"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="confirmBodyContent">
                        <p>Are you sure you want to perform this action?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="confirmAction">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="loading-overlay">
            <div class="spinner"></div>
        </div>

        <!-- The Info Modal -->
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
    </section>


    <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>
    <script src="<?=base_url('assets/js/additional-methods.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.datatables.min.js');?>"></script>
    <script src="<?=base_url('assets/js/datatables.bootstrap.min.js');?>"></script>
    <script src="<?=base_url('assets/js/chart.umd.min.js');?>"></script>

    <script>
    function showInfo(message, title = "Informasi") {
        // Update modal body content
        $("#modalTitleContent").html(`<p>${title}</p>`);
        $("#modalBodyContent").html(`<p class='text-center'>${message}</p>`);

        // Open the modal
        $("#modal-info").modal();
    };

    function showConfrim(message, callback, title = "Konfirmasi") {
        // Update modal body content
        $("#confirmTitleContent").html(`<p>${title}</p>`);
        $("#confirmBodyContent").html(`<p class='text-center'>${message}</p>`);

        // Open the modal
        $("#confirmationModal").modal();

        $('#confirmAction').on('click', function() {
            $('#confirmationModal').modal('hide');
            if (typeof callback === 'function') {
                callback(true);
            }
        });
    };

    $("#modal-info").on('hide.bs.modal', function(e) {
        if (globalRefresh) {
            globalRefresh = false;
            location.reload();
        }
    });

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
        var table = new DataTable('#GeneralDataTable');
        table.on('click', 'tbody tr', (e) => {
            let classList = e.currentTarget.classList;

            if (classList.contains('selected')) {
                classList.remove('selected');
            } else {
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