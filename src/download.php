<?php
if (isset($_GET["filename"])) {
    // Get parameters
    $file = "thump_" . $_GET["filename"]; // Decode URL-encoded string

    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */

    $filepath = "resized_images/" . $file;

    // Process download
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        // flush(); // Flush system output buffer
        readfile($filepath);
        exit();
    } else {
        echo "<br>error for now";
        exit();
    }
}
