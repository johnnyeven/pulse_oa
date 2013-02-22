<?php

class ExcelAdapter {
	function ParseExcel($file)
	{
		set_include_path(get_include_path() . PATH_SEPARATOR . BASEPATH . 'libraries/excel');
	
		require_once 'PHPExcel.php';
		require_once 'PHPExcel/IOFactory.php';
		require_once 'PHPExcel/Reader\Excel5.php';

		$result = array();
		if(!empty($file)) //如果上传文件成功，就执行导入excel操作
		{
			$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
			$objPHPExcel = $objReader->load($file);
			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow(); // 取得总行数
			$highestColumn = $sheet->getHighestColumn(); // 取得总列数
			
			for($j=1; $j<=$highestRow; $j++)
			{
				$row = array(
					'account_name'				=>	$objPHPExcel->getActiveSheet()->getCell("C$j")->getValue(),
					'account_department'		=>	$objPHPExcel->getActiveSheet()->getCell("D$j")->getValue(),
					'pay_base'						=>	$objPHPExcel->getActiveSheet()->getCell("E$j")->getValue(),
					'pay_gangwei'				=>	$objPHPExcel->getActiveSheet()->getCell("F$j")->getValue(),
					'pay_gongling'				=>	$objPHPExcel->getActiveSheet()->getCell("G$j")->getValue(),
					'pay_baomi'					=>	$objPHPExcel->getActiveSheet()->getCell("H$j")->getValue(),
					'pay_canbu'					=>	$objPHPExcel->getActiveSheet()->getCell("I$j")->getValue(),
					'pay_jiaban'					=>	$objPHPExcel->getActiveSheet()->getCell("J$j")->getValue(),
					'pay_basetotal'				=>	$objPHPExcel->getActiveSheet()->getCell("K$j")->getOldCalculatedValue(),
					'pay_yanglao'					=>	$objPHPExcel->getActiveSheet()->getCell("M$j")->getValue(),
				);
				array_push($result, $row);
			}
			unlink($file);
		}
		return $result;
	}
}

?>