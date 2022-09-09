<?php
namespace PhpOffice\PhpSpreadsheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
$filename ="CS_AF_01.xlsx";
//make a new spreadsheet object
$spreadsheet = new Spreadsheet();
$spreadsheet -> getActiveSheet()->setTitle('CS_AF_01');
// set default font
$spreadsheet->getDefaultStyle()->getFont()->getName('Verdana');
//TABLE STYLE 
$tableHead = [
    'font'=>[
        'color'=>[
            'rgb'=>'FF000000'
        ],
    ],
    'fill'=>[
        'fillType'=>Fill::FILL_SOLID,
        'startColor'=>[
            'rgb'=>'f4c2c2'
        ]
    ],
    'borders' => [
        'diagonalDirection' => \PhpOffice\PhpSpreadsheet\Style\Borders::DIAGONAL_BOTH,
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'color'=>[
            'rgb'=>'FF000000'
        ]
    ],
    'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];
//END TABLE STYLE 
//set column dimemsion to auto size
foreach (range('A', 'K') as $letra) {            
    $spreadsheet->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
}
#drawing top header
$spreadsheet->getActiveSheet()->setCellValue('A1', __('devOne.csOne'));
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
//merge cell
$spreadsheet->getActiveSheet()->mergeCells("A1:K1");
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
//Header text
$spreadsheet->getActiveSheet()->setCellValue('A4', __('devOne.provinceCode'));
// $spreadsheet->getDefaultStyle()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
//FONT-STYLE
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
//END-FONT-STYLE
$spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("A4:A5");
$spreadsheet->getActiveSheet()->setCellValue('B4', __('devOne.provinceName'));
$spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("B4:B5");
$spreadsheet->getActiveSheet()->setCellValue('C4', __('devOne.districtCode'));
$spreadsheet->getActiveSheet()->getStyle('C4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('C4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("C4:C5");
$spreadsheet->getActiveSheet()->setCellValue('D4', __('devOne.districtName'));
$spreadsheet->getActiveSheet()->getStyle('D4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('D4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("D4:D5");
$spreadsheet->getActiveSheet()->setCellValue('E4', __('devOne.csCode'));
$spreadsheet->getActiveSheet()->getStyle('E4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('E4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("E4:E5");
$spreadsheet->getActiveSheet()->setCellValue('F4', __('devOne.csName'));
$spreadsheet->getActiveSheet()->getStyle('F4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('F4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("F4:F5");
$spreadsheet->getActiveSheet()->setCellValue('G4', __('devOne.round'));
$spreadsheet->getActiveSheet()->getStyle('G4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('G4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("G4:G5");
$spreadsheet->getActiveSheet()->setCellValue('H4', __('devOne.phase'));
$spreadsheet->getActiveSheet()->getStyle('H4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('H4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("H4:H5");
$spreadsheet->getActiveSheet()->setCellValue('I4', __('devOne.year'));
$spreadsheet->getActiveSheet()->getStyle('I4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('I4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("I4:I5");
$spreadsheet->getActiveSheet()->setCellValue('J4', __('devOne.csAR'));
$spreadsheet->getActiveSheet()->getStyle('J4')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('J4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('J4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells("J4:K4");
$spreadsheet->getActiveSheet()->setCellValue('J5', __('devOne.score'));
$spreadsheet->getActiveSheet()->getStyle('J5')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('J5')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('J5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->setCellValue('K5', __('devOne.percentage'));
$spreadsheet->getActiveSheet()->getStyle('K5')->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getStyle('K5')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('K5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
//BACKGROUND COLOR
$spreadsheet->getActiveSheet()->getStyle('A4:K4')->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getStyle('A5:K5')->applyFromArray($tableHead);
//READ THE DATA (START FROM A6)
$content_row=6;
foreach($results as $row){
    // $score = 0;
    
    // foreach ($columns as $item){
    //     $score+=(int)$row[$item];
    // }
    $percentage = $row->score/100;
    $spreadsheet->getActiveSheet()
                   
                    ->setCellValue("A".$content_row, $row->province)
                    ->setCellValue("B".$content_row, $row->provincename)
                    ->setCellValue("C".$content_row, $row->district)
                    ->setCellValue("D".$content_row, $row->districtname)
                    ->setCellValue("E".$content_row, $row->commune)
                    ->setCellValue("F".$content_row, $row->communename)
                    ->setCellValue("G".$content_row, $row->round)
                    ->setCellValue("H".$content_row, $row->phase)
                    ->setCellValue("I".$content_row, $row->year)
                    ->setCellValue("J".$content_row, $row->score)
                    ->setCellValue("K".$content_row, $percentage)->getStyle('K')->getNumberFormat()->setFormatCode('0.00%');
                    
    $content_row++;
}
#download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.str_replace(" ", "-", $filename));
header('Cache-Control: max-age=0');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');