<?php
    $handle = fopen("f_x.txt", "w");
    fwrite($handle, "text1.....");
    fclose($handle);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename('f_x.txt'));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('f_x.txt'));
    readfile('f_x.txt');
    exit;
?>
