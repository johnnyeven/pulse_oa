<?php

class ExcelAdapter {
	public function ParseExcel($file)
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
					'pay_base'						=>	$objPHPExcel->getActiveSheet()->getCell("E$j")->getValue() * 100,
					'pay_gangwei'				=>	$objPHPExcel->getActiveSheet()->getCell("F$j")->getValue() * 100,
					'pay_jingtie'					=>	$objPHPExcel->getActiveSheet()->getCell("G$j")->getValue() * 100,
					'pay_gongling'				=>	$objPHPExcel->getActiveSheet()->getCell("H$j")->getValue() * 100,
					'pay_baomi'					=>	$objPHPExcel->getActiveSheet()->getCell("I$j")->getValue() * 100,
					'pay_canbu'					=>	$objPHPExcel->getActiveSheet()->getCell("J$j")->getValue() * 100,
					'pay_jiaban'					=>	$objPHPExcel->getActiveSheet()->getCell("K$j")->getValue() * 100,
					'pay_basetotal'				=>	$objPHPExcel->getActiveSheet()->getCell("L$j")->getOldCalculatedValue() * 100,
					'pay_yanglao'					=>	$objPHPExcel->getActiveSheet()->getCell("M$j")->getValue() * 100,
					'pay_yiliao'						=>	$objPHPExcel->getActiveSheet()->getCell("N$j")->getValue() * 100,
					'pay_shiye'						=>	$objPHPExcel->getActiveSheet()->getCell("O$j")->getValue() * 100,
					'pay_gongjijin'				=>	$objPHPExcel->getActiveSheet()->getCell("P$j")->getValue() * 100,
					'pay_shuitotal'				=>	$objPHPExcel->getActiveSheet()->getCell("Q$j")->getOldCalculatedValue() * 100,
					'pay_fakuan'					=>	$objPHPExcel->getActiveSheet()->getCell("R$j")->getValue() * 100,
					'pay_shuiqian'				=>	$objPHPExcel->getActiveSheet()->getCell("S$j")->getOldCalculatedValue() * 100,
					'pay_geshui'					=>	$objPHPExcel->getActiveSheet()->getCell("T$j")->getValue() * 100,
					'pay_total'						=>	$objPHPExcel->getActiveSheet()->getCell("U$j")->getOldCalculatedValue() * 100
				);
				array_push($result, $row);
			}
			unlink($file);
		}
		return $result;
	}
	
	public function RemoveNull($array)
	{
		for($i=0; $i<count($array); $i++)
		{
			foreach($array[$i] as $key=>$value)
			{
				if(empty($value))
				{
					$array[$i][$key] = '';
				}
			}
		}
		return $array;
	}
}

?>