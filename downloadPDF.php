<?php

$file = 'new.pdf';
header('Content-type:application/pdf');
header('Content-Disposition:attachment; filename="' . $file . '"');
readfile($file);
unlink('new.pdf');
exit();
?>
