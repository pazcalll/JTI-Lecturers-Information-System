<?php 
    $filename = "Study Program List.csv";
    header("Content-Type: application/csv"); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header("Cache-Control: max-age=0"); //no cache

    $file = fopen('php://output','w');
    // $header = array("Study Program ID","Study Program Name"); 
    // fputcsv($file, $header);
    foreach ($result as $key=>$line){ 
        fputcsv($file,$line); 
    }
    fclose($file); 
    exit; 
?>  