<?php 
    $filename = "Contract of ".base64_decode($subjectname) ." by ". $user.".csv";
    header("Content-Type: application/csv"); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header("Cache-Control: max-age=0"); //no cache

    $file = fopen('php://output','w');
    foreach ($contract as $key=>$line){ 
        fputcsv($file,$line); 
    }
    fclose($file); 
    exit; 
?>  