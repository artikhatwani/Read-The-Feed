<?php
session_start();
ini_set('memory_limit', '32M');
ini_set('max_execution_time', 300);
$htmlData=json_decode($_SESSION['htmlData']);
require_once("lib/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html($htmlData);
$dompdf->render();
$dompdf->stream('Rss_Feeds.pdf');

?>