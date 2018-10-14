<?
require_once('../../PHPExcel-1.8/Classes/PHPExcel.php');

$PHPEXcel = new PHPExcel();

$PHPExcel->getProperties()->setCreator('ORION');
$PHPExcel->getProperties()->setLastModifiedBy('Jan Zalesiński');
$PHPExcel->getProperties()->setTitle('Raport finansowy za ostatni rok');
$PHPExcel->getProperties()->setSubject('Sprawozdanie za trzeci kwartał 2018');
$PHPExcel->getProperties()->setDescription('Dużo zarobiliśmy, zarobimy jeszcze więcej');
$PHPExcel->getProperties()->setKeywords('raport zestawienie finanse');
$PHPExcel->getProperties()->setCategory('Finanse');
$PHPExcel->getActiveSheet()->setCellValue('A1', 'zawartość komórki');
$writer = new PHPExcel_Writer_Excel2007($PHPExcel);
$writer->save('raport finansowy.xls');


?>
