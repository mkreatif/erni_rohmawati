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
        function generateSerialID(prefix='D',currentCount) {
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