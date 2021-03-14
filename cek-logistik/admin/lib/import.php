<?php
require_once('db_login.php');
require '../../../vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
if(isset($_FILES['myfile']['name']) && in_array($_FILES['myfile']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['myfile']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['myfile']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 0;$i < count($sheetData);$i++)
	{
        $kode_brg = $sheetData[$i]['0'];
        $jenis_brg = $sheetData[$i]['1'];
        $nama_brg = $sheetData[$i]['2'];
        $tahun = $sheetData[$i]['3'];
        $lokasi = $sheetData[$i]['4'];
        $pic = $sheetData[$i]['5'];
        $result = $db->query(" INSERT INTO barang VALUES ('".$kode_brg."', '".$jenis_brg."', '".$nama_brg."', '".$tahun."', 
                    '".$lokasi."', '".$pic."') ");
    }
    if (!$result) {
        die ("could not query the database: <br>".$db->error);
      }else {
        // close connection
        $db->close();
        header('Location: ../tabel-barang.php');
      }
}
?>