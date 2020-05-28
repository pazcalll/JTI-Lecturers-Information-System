<?php 
    // var_dump($result);
    $filename = "DPA2019.csv";
    header("Content-Type: application/csv"); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header("Cache-Control: max-age=0"); //no cache

    $file = fopen('php://output','w');
    // $header = array("Kode","Full Name","Class ID"); 
    // fputcsv($file, $header);
    foreach ($result as $key){ 
        fputcsv($file,[$key['kode'],$key['nama'],$key['classid']]); 
    }
    fclose($file); 
    exit; 
?>  