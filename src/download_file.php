<?php
$filename = basename($_GET['filename']);
$filedir = basename($_GET['filedir']);
$path = '../uploads/';
$download_file = $path . $filedir . '/' . $filename;

// die($download_file);

if (!empty($filename)) {
    // first check file exists on given path.
    if (file_exists($download_file)) {
        header('Content-Disposition: attachment; filepath=' . $filename);
        readfile($download_file);
    } else {
        echo 'File not found on given path.';
    }
} else {
    echo 'No file path provided.';
}