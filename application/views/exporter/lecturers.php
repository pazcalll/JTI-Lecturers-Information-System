<?php 
    $filename = "LecturersData.csv";
    header("Content-Type: application/csv"); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header("Cache-Control: max-age=0"); //no cache

    $file = fopen('php://output','w');
    $header = array("NIP","NIDN","KODE","Prodi ID","Accreditation ID","Team ID","Full Name","Status","Lecturing Quota","Lecturing Hours","Credit","Distribution","Even Quota in 19/20","Matkul Total","Homebase","Homebase for D3 Accreditation"); 
    fputcsv($file, $header);
    foreach ($result as $key=>$line){ 
        fputcsv($file,$line); 
    }
    fclose($file); 
    exit; 
?>  