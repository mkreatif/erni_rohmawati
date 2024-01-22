<?php
// Redirect to a specific page
$baseurl = base_url('login');
header("Location: ".$baseurl);
exit(); // Make sure to exit after a header redirect