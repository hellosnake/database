<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
	

	/** Include PHPExcel */
	require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';


	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

	// Set document properties
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
			 ->setLastModifiedBy("Maarten Balliauw")
			 ->setTitle("Office 2007 XLSX Test Document")
			 ->setSubject("Office 2007 XLSX Test Document")
			 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
			 ->setKeywords("office 2007 openxml php")
			 ->setCategory("Test result file");


	// set width    
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);  
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);  
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);  
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);  
  
    // 设置行高度    
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);  
  
    $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);  
  
    // 字体和样式  
    $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);  
    $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getFont()->setBold(true);  
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);  
  
    $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
    $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);  
  
    // 设置水平居中    
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
    $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
    $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
    $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
    $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
  
    //  合并  
    $objPHPExcel->getActiveSheet()->mergeCells('A1:D1');  

	// Add some data
	$objPHPExcel->setActiveSheetIndex(0)  
            ->setCellValue('A1', 'aaaaaaaaaaaaa')  
            ->setCellValue('A2', '序号')  
            ->setCellValue('B2', '姓名')  
            ->setCellValue('C2', '班级')  
            ->setCellValue('D2', '成绩');  

	// Miscellaneous glyphs, UTF-8
	/*
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A4', 'Miscellaneous glyphs')
				->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
	*/
	/*
    for ($i = 0, $len = count($list); $i < $len; $i++) {  
        $objPHPExcel->getActiveSheet(0)->setCellValue('A' . ($i + 3), $list[$i]['sc_rank']);  
        $objPHPExcel->getActiveSheet(0)->setCellValue('B' . ($i + 3), $list[$i]['a_nickname']);  
        $objPHPExcel->getActiveSheet(0)->setCellValue('C' . ($i + 3), $data['title']);  
        $objPHPExcel->getActiveSheet(0)->setCellValue('D' . ($i + 3), $list[$i]['sc_point']);  
        $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  
        $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);  
        $objPHPExcel->getActiveSheet()->getRowDimension($i + 3)->setRowHeight(16);  
    }  
	*/
	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle('aaaaaaaaaaaaa');


	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);


	// Redirect output to a client’s web browser (Excel2007)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="aaaaaaaaaaaaa.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	/*
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0
	*/
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');

