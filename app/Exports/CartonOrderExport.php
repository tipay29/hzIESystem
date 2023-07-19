<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CartonOrderExport implements FromCollection,WithCustomStartCell,WithHeadings,
    WithColumnFormatting,WithTitle,WithEvents,WithDrawings
{

    protected $cartonorder;
    protected $headerstart;
    protected $contentstart;
    protected $contentcount;
    protected $contenttotalstart;
    protected $summarystart;
    protected $totalfob;
    protected $summarycontentcount;
    protected $summarycontentstart;
    protected $notestart;
    protected $signstart;

    public function __construct($cartonorder)
    {

        $this->cartonorder = $cartonorder;
//        dd();
    }


    public function collection()
    {

        $cartonorder = $this->getCartonFormExcel($this->cartonorder);

        return $cartonorder;
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event){

                $this->headerstart = 17;
                $this->contentstart = 19;
                $this->contentcount = count($this->cartonorder->carton_order_contents);
                $this->contenttotalstart = $this->contentstart+$this->contentcount;
                $this->summarystart = $this->contenttotalstart + 2;
                $this->summarycontentcount = count($this->cartonorder->carton_order_contents->unique('carton_id'));
                $this->summarycontentstart = $this->summarystart+ 3;
                $this->notestart = $this->summarystart+$this->summarycontentcount+6;
                $this->signstart = $this->notestart +12;
            },
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getColumnDimension('A')->setWidth(15);
                $event->sheet->getColumnDimension('B')->setWidth(8);
                $event->sheet->getColumnDimension('C')->setWidth(23);
                $event->sheet->getColumnDimension('D')->setWidth(12);
                $event->sheet->getColumnDimension('E')->setWidth(11);
                $event->sheet->getColumnDimension('F')->setWidth(17);
                $event->sheet->getColumnDimension('G')->setWidth(22);
                $event->sheet->getColumnDimension('H')->setWidth(7);
                $event->sheet->getColumnDimension('I')->setWidth(10);
                $event->sheet->getColumnDimension('J')->setWidth(10);
                $event->sheet->getColumnDimension('K')->setWidth(10);
                $event->sheet->getColumnDimension('L')->setWidth(13);
                $event->sheet->getColumnDimension('M')->setWidth(14);
                $event->sheet->getColumnDimension('N')->setWidth(7);
                $event->sheet->getColumnDimension('O')->setWidth(7);
                $event->sheet->getColumnDimension('P')->setWidth(8);
                $event->sheet->getColumnDimension('Q')->setWidth(10);
                $event->sheet->getColumnDimension('R')->setWidth(10);
                $event->sheet->getColumnDimension('S')->setWidth(10);

                //title
                $event->sheet->mergeCells('F1:K1');
                $event->sheet->mergeCells('F2:K2');
                $font = [
                    'font' => [
                        'size' => 18,
                        'bold' => true,
                    ],
                ];
                $event->sheet->setCellValue('F1','HORIZON CAMBODIA PURCHASE ORDER')->getStyle('F1:K1')
                    ->applyFromArray($font)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->setCellValue('F2','宏盛柬埔寨采购单')->getStyle('F2:K2')
                    ->applyFromArray($font)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                //left corner
                $event->sheet->setCellValue('A4','Bill# 采购单号:');
                $event->sheet->setCellValue('A5','Bill To 采购方:');
                $event->sheet->setCellValue('A10','ATTN 联系人:');
                $event->sheet->setCellValue('A11','TEL 电话:');
                $event->sheet->setCellValue('A12','E-mail 邮箱:');
                $event->sheet->setCellValue('A13','Remark备注:');

                $event->sheet->setCellValue('B4',$this->cartonorder->ctn_bill_code);
                $event->sheet->setCellValue('B5','HORIZON OUTDOOR (CAMBODIA) CO., LTD.');
                $event->sheet->setCellValue('B6','Phoum Psar Trach, National road NO.5,');
                $event->sheet->setCellValue('B7','Khum LoungVek, Srok Kompong Trach,');
                $event->sheet->setCellValue('B8','Kompong Chhnang Province,');
                $event->sheet->setCellValue('B9','Cambodia');
                $event->sheet->setCellValue('B10',$this->cartonorder->user->name);
                $event->sheet->mergeCells('B11:C11');
                $event->sheet->setCellValue('B11',$this->cartonorder->user->employee->phone)
                    ->getStyle('B11')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $event->sheet->setCellValue('B12',$this->cartonorder->user->email);
                $event->sheet->setCellValue('B13','VAT100186432');

                //MID corner
                $event->sheet->setCellValue('F4','Orderdate下单日:');
                $event->sheet->setCellValue('F5','Supplier供应方:');
                $event->sheet->setCellValue('F10','ATTN 联系人:');
                $event->sheet->setCellValue('F11','TEL 电话:');
                $event->sheet->setCellValue('F12','E-mail 邮箱:');
                $event->sheet->setCellValue('F13','Remark备注:');

                $event->sheet->setCellValue('G4',$this->cartonorder->ctn_order_date);
                $event->sheet->setCellValue('G5',$this->cartonorder->supplier->name_ch);
                $event->sheet->setCellValue('G6',$this->cartonorder->supplier->name_en);
                $event->sheet->setCellValue('G7',$this->cartonorder->supplier->address_one);
                $event->sheet->setCellValue('G8',$this->cartonorder->supplier->address_two);
                $event->sheet->setCellValue('G9',$this->cartonorder->supplier->address_three);
                $event->sheet->setCellValue('G10',$this->cartonorder->supplier->attn);
                $event->sheet->setCellValue('G11',$this->cartonorder->supplier->phone)
                    ->getStyle('G11')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $event->sheet->setCellValue('G12',$this->cartonorder->supplier->email);
                $event->sheet->setCellValue('G13',$this->cartonorder->supplier->remark);

                //right corner
                $event->sheet->setCellValue('M4','Del Date 交期:');
                $event->sheet->setCellValue('M5','Del To 送至:');
                $event->sheet->setCellValue('M10','ATTN 联系人:');
                $event->sheet->setCellValue('M11','TEL 电话:');
                $event->sheet->setCellValue('M12','E-mail 邮箱:');
                $event->sheet->setCellValue('M13','Remark备注:');

                $event->sheet->setCellValue('N4',$this->cartonorder->ctn_delivery_date);
                $event->sheet->setCellValue('N5','宏盛柬埔寨-7厂仓库');
                $event->sheet->setCellValue('N6','Phoum Psar Trach，National road NO.5,');
                $event->sheet->setCellValue('N7','Khum LoungVek, Srok Kompong Trach,');
                $event->sheet->setCellValue('N8','Kompong Chhnang Province,');
                $event->sheet->setCellValue('N9','Cambodia');
                $event->sheet->setCellValue('N10','YU Yang');
                $event->sheet->setCellValue('N11','+855 011 58 79 33')
                    ->getStyle('N11')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $event->sheet->setCellValue('N12',$this->cartonorder->supplier->email);
                $event->sheet->setCellValue('N13',$this->cartonorder->supplier->remark);

                // OTHER REMARKS
                $event->sheet->setCellValue('C15','OTHER INSTRUCTION 其它说明：');
                $border = [
                    'borders' => [
                        //outline all
                        'bottom' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];

                //headerborder
                $event->sheet->getStyle('E15:O15')->applyFromArray($border);

                $event->sheet->getStyle('B4:D4')->applyFromArray($border);
                $event->sheet->getStyle('B5:D5')->applyFromArray($border);
                $event->sheet->getStyle('B6:D6')->applyFromArray($border);
                $event->sheet->getStyle('B7:D7')->applyFromArray($border);
                $event->sheet->getStyle('B8:D8')->applyFromArray($border);
                $event->sheet->getStyle('B9:D9')->applyFromArray($border);
                $event->sheet->getStyle('B10:D10')->applyFromArray($border);
                $event->sheet->getStyle('B11:D11')->applyFromArray($border);
                $event->sheet->getStyle('B12:D12')->applyFromArray($border);
                $event->sheet->getStyle('B13:D13')->applyFromArray($border);

                $event->sheet->getStyle('G4:K4')->applyFromArray($border);
                $event->sheet->getStyle('G5:K5')->applyFromArray($border);
                $event->sheet->getStyle('G6:K6')->applyFromArray($border);
                $event->sheet->getStyle('G7:K7')->applyFromArray($border);
                $event->sheet->getStyle('G8:K8')->applyFromArray($border);
                $event->sheet->getStyle('G9:K9')->applyFromArray($border);
                $event->sheet->getStyle('G10:K10')->applyFromArray($border);
                $event->sheet->getStyle('G11:K11')->applyFromArray($border);
                $event->sheet->getStyle('G12:K12')->applyFromArray($border);
                $event->sheet->getStyle('G13:K13')->applyFromArray($border);

                $event->sheet->getStyle('N4:S4')->applyFromArray($border);
                $event->sheet->getStyle('N5:S5')->applyFromArray($border);
                $event->sheet->getStyle('N6:S6')->applyFromArray($border);
                $event->sheet->getStyle('N7:S7')->applyFromArray($border);
                $event->sheet->getStyle('N8:S8')->applyFromArray($border);
                $event->sheet->getStyle('N9:S9')->applyFromArray($border);
                $event->sheet->getStyle('N10:S10')->applyFromArray($border);
                $event->sheet->getStyle('N11:S11')->applyFromArray($border);
                $event->sheet->getStyle('N12:S12')->applyFromArray($border);
                $event->sheet->getStyle('N13:S13')->applyFromArray($border);
                //header border

                //header title border
                $border = [
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                    ],
                ];
                $event->sheet->getStyle('A'.$this->headerstart.':A'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('B'.$this->headerstart.':B'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('C'.$this->headerstart.':C'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('D'.$this->headerstart.':D'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('E'.$this->headerstart.':E'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('F'.$this->headerstart.':F'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('G'.$this->headerstart.':G'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('H'.$this->headerstart.':H'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('I'.$this->headerstart.':I'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('J'.$this->headerstart.':J'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('K'.$this->headerstart.':K'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('L'.$this->headerstart.':L'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('M'.$this->headerstart.':M'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('N'.$this->headerstart.':N'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('O'.$this->headerstart.':O'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('P'.$this->headerstart.':P'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('Q'.$this->headerstart.':Q'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('R'.$this->headerstart.':R'.($this->headerstart+1))->applyFromArray($border);
                $event->sheet->getStyle('S'.$this->headerstart.':S'.($this->headerstart+1))->applyFromArray($border);
                //header title border

                //content
                $border = [
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                for($x = $this->contentstart;$x < ($this->contentstart+$this->contentcount);$x++){
                    $event->sheet->getStyle('A'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('B'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('C'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('D'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('E'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('F'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('G'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('H'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('I'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('J'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('K'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('L'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('M'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('N'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('O'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('P'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('Q'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('R'. $x)->applyFromArray($border);
                    $event->sheet->getStyle('S'. $x)->applyFromArray($border);
                }
                //content
                $event->sheet->setCellValue('F' . $this->contenttotalstart,'Grand Total');
                $event->sheet->setCellValue('M' . $this->contenttotalstart,
                    $this->cartonorder->carton_order_contents->sum('ctn_quantity'));
                $event->sheet->setCellValue('Q' . $this->contenttotalstart,
                    '$' . $this->totalfob);
                $border = [
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                    ],
                ];
                $event->sheet->getStyle('A'. $this->contenttotalstart . ':S' . $this->contenttotalstart)->applyFromArray($border);


                //summary
                $event->sheet->mergeCells('E'. $this->summarystart . ':S' . $this->summarystart);
                $event->sheet->mergeCells('H'. ($this->summarystart+1) . ':I' . ($this->summarystart+1));
                $event->sheet->mergeCells('H'. ($this->summarystart+2) . ':I' . ($this->summarystart+2));
                $event->sheet->mergeCells('J'. ($this->summarystart+1) . ':K' . ($this->summarystart+1));
                $event->sheet->mergeCells('J'. ($this->summarystart+2) . ':K' . ($this->summarystart+2));
                $event->sheet->mergeCells('N'. ($this->summarystart+1) . ':O' . ($this->summarystart+1));
                $event->sheet->mergeCells('N'. ($this->summarystart+2) . ':O' . ($this->summarystart+2));
                $event->sheet->mergeCells('P'. ($this->summarystart+1) . ':Q' . ($this->summarystart+1));
                $event->sheet->mergeCells('P'. ($this->summarystart+2) . ':Q' . ($this->summarystart+2));
                $event->sheet->mergeCells('R'. ($this->summarystart+1) . ':S' . ($this->summarystart+1));
                $event->sheet->mergeCells('R'. ($this->summarystart+2) . ':S' . ($this->summarystart+2));

                $border = [
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                    ],
                ];
                $event->sheet->setCellValue('E' . $this->summarystart,'SUMMARY')
                    ->getStyle('E' . $this->summarystart . ':S' . $this->summarystart   )->applyFromArray($border)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
                $event->sheet->setCellValue('E' . ($this->summarystart+1),'No');
                $event->sheet->setCellValue('E' . ($this->summarystart+2),'序號');
                $event->sheet->getStyle('E' . ($this->summarystart+1) . ':E'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('F' . ($this->summarystart+1),'Description');
                $event->sheet->setCellValue('F' . ($this->summarystart+2),'描述');
                $event->sheet->getStyle('F' . ($this->summarystart+1) . ':F'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('G' . ($this->summarystart+1),'Ctn Spec');
                $event->sheet->setCellValue('G' . ($this->summarystart+2),'材料');
                $event->sheet->getStyle('G' . ($this->summarystart+1) . ':G'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('H' . ($this->summarystart+1),'Ctn Measurement');
                $event->sheet->setCellValue('H' . ($this->summarystart+2),'纸箱尺寸');
                $event->sheet->getStyle('H' . ($this->summarystart+1) . ':I'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('J' . ($this->summarystart+1),'CtnQty');
                $event->sheet->setCellValue('J' . ($this->summarystart+2),'數量');
                $event->sheet->getStyle('J' . ($this->summarystart+1) . ':K'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('L' . ($this->summarystart+1),'Unit');
                $event->sheet->setCellValue('L' . ($this->summarystart+2),'單位');
                $event->sheet->getStyle('L' . ($this->summarystart+1) . ':L'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('M' . ($this->summarystart+1),'Price USD');
                $event->sheet->setCellValue('M' . ($this->summarystart+2),'單價');
                $event->sheet->getStyle('M' . ($this->summarystart+1) . ':M'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('N' . ($this->summarystart+1),'Total Amount');
                $event->sheet->setCellValue('N' . ($this->summarystart+2),'金額');
                $event->sheet->getStyle('N' . ($this->summarystart+1) . ':O'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('P' . ($this->summarystart+1),'1%Allowance');
                $event->sheet->setCellValue('P' . ($this->summarystart+2),'額外');
                $event->sheet->getStyle('P' . ($this->summarystart+1) . ':Q'. ($this->summarystart+2))->applyFromArray($border);
                $event->sheet->setCellValue('R' . ($this->summarystart+1),'Total');
                $event->sheet->setCellValue('R' . ($this->summarystart+2),'总数');
                $event->sheet->getStyle('R' . ($this->summarystart+1) . ':S'. ($this->summarystart+2))->applyFromArray($border);
                //summary
                //summarycontent
                $border = [
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $total_allowance = 0 ;
                $total_all = 0;
                $total_amount = 0;
                $x = 0;
                foreach($this->cartonorder->carton_order_contents->unique('carton_id') as $key => $ctn){
                    $event->sheet->mergeCells('H'. ($this->summarycontentstart+$x) . ':I' . ($this->summarycontentstart+$x));
                    $event->sheet->mergeCells('J'. ($this->summarycontentstart+$x) . ':K' . ($this->summarycontentstart+$x));
                    $event->sheet->mergeCells('N'. ($this->summarycontentstart+$x) . ':O' . ($this->summarycontentstart+$x));
                    $event->sheet->mergeCells('P'. ($this->summarycontentstart+$x) . ':Q' . ($this->summarycontentstart+$x));
                    $event->sheet->mergeCells('R'. ($this->summarycontentstart+$x) . ':S' . ($this->summarycontentstart+$x));

                    $event->sheet->setCellValue('E' . ($this->summarycontentstart+$x),$x+1)
                        ->getStyle('E' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('F' . ($this->summarycontentstart+$x),'纸箱Carton')
                        ->getStyle('F' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('G' . ($this->summarycontentstart+$x),$ctn->carton->ctn_specification)
                        ->getStyle('G' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('H' . ($this->summarycontentstart+$x),$ctn->carton->ctn_size.'CM')
                        ->getStyle('H' . ($this->summarycontentstart+$x) .':I' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('J' . ($this->summarycontentstart+$x),
                        $this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity'))
                        ->getStyle('J' . ($this->summarycontentstart+$x) .':K' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('L' . ($this->summarycontentstart+$x),'pcs')
                        ->getStyle('L' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('M' . ($this->summarycontentstart+$x), '$'. $ctn->carton->ctn_fob)
                        ->getStyle('M' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('N' . ($this->summarycontentstart+$x),'$'.
                        ($ctn->carton->ctn_fob*
                            $this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')))
                        ->getStyle('N' . ($this->summarycontentstart+$x) .':O' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('P' . ($this->summarycontentstart+$x),
                        floor($this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')/100))
                        ->getStyle('P' . ($this->summarycontentstart+$x) .':Q' . ($this->summarycontentstart+$x))->applyFromArray($border);
                    $event->sheet->setCellValue('R' . ($this->summarycontentstart+$x),
                        (floor($this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')/100) +
                        $this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')))
                        ->getStyle('R' . ($this->summarycontentstart+$x) .':S' . ($this->summarycontentstart+$x))->applyFromArray($border);

                    $total_allowance = $total_allowance + floor($this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')/100);
                    $total_amount = $total_amount + ($ctn->carton->ctn_fob*
                            $this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity'));
                    $total_all = $total_all + floor($this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')/100) +
                        $this->cartonorder->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity');

                    $x++;
                }
                //summarycontenttotal
                $event->sheet->mergeCells('H'. ($this->summarycontentstart+$this->summarycontentcount) . ':I' . ($this->summarycontentstart+$this->summarycontentcount));
                $event->sheet->mergeCells('J'. ($this->summarycontentstart+$this->summarycontentcount) . ':K' . ($this->summarycontentstart+$this->summarycontentcount));
                $event->sheet->mergeCells('N'. ($this->summarycontentstart+$this->summarycontentcount) . ':O' . ($this->summarycontentstart+$this->summarycontentcount));
                $event->sheet->mergeCells('P'. ($this->summarycontentstart+$this->summarycontentcount) . ':Q' . ($this->summarycontentstart+$this->summarycontentcount));
                $event->sheet->mergeCells('R'. ($this->summarycontentstart+$this->summarycontentcount) . ':S' . ($this->summarycontentstart+$this->summarycontentcount));
                $event->sheet
                    ->getStyle('E' . ($this->summarycontentstart+$this->summarycontentcount). ':S' . ($this->summarycontentstart+$this->summarycontentcount))->applyFromArray($border);

                $event->sheet->setCellValue('H' . ($this->summarycontentstart+$this->summarycontentcount),'TOTAL')
                    ->getStyle('H' . ($this->summarycontentstart+$this->summarycontentcount) .':I' . ($this->summarycontentstart+$x))->applyFromArray($border);
                $event->sheet->setCellValue('J' . ($this->summarycontentstart+$this->summarycontentcount),$this->cartonorder->carton_order_contents->sum('ctn_quantity'))
                    ->getStyle('J' . ($this->summarycontentstart+$this->summarycontentcount) .':K' . ($this->summarycontentstart+$x))->applyFromArray($border);
                $event->sheet->setCellValue('L' . ($this->summarycontentstart+$this->summarycontentcount),'pcs')
                    ->getStyle('L' . ($this->summarycontentstart+$this->summarycontentcount))->applyFromArray($border);
                $event->sheet->setCellValue('N' . ($this->summarycontentstart+$this->summarycontentcount),'$' . $total_amount)
                    ->getStyle('N' . ($this->summarycontentstart+$this->summarycontentcount) .':O' . ($this->summarycontentstart+$x))->applyFromArray($border);
                $event->sheet->setCellValue('P' . ($this->summarycontentstart+$this->summarycontentcount),$total_allowance)
                    ->getStyle('P' . ($this->summarycontentstart+$this->summarycontentcount) .':Q' . ($this->summarycontentstart+$x))->applyFromArray($border);
                $event->sheet->setCellValue('R' . ($this->summarycontentstart+$this->summarycontentcount), $total_all)
                    ->getStyle('R' . ($this->summarycontentstart+$this->summarycontentcount) .':S' . ($this->summarycontentstart+$x))->applyFromArray($border);
                //summarycontent
                //carton paper
                $border = [
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                    ],
                ];
                $event->sheet->mergeCells('F'. ($this->summarycontentstart+$this->summarycontentcount+1). ':G' . ($this->summarycontentstart+$this->summarycontentcount+1));
                $event->sheet->mergeCells('H'. ($this->summarycontentstart+$this->summarycontentcount+1) . ':I' . ($this->summarycontentstart+$this->summarycontentcount+1));
                $event->sheet->mergeCells('J'. ($this->summarycontentstart+$this->summarycontentcount+1) . ':K' . ($this->summarycontentstart+$this->summarycontentcount+1));
                $event->sheet->mergeCells('N'. ($this->summarycontentstart+$this->summarycontentcount+1) . ':O' . ($this->summarycontentstart+$this->summarycontentcount+1));
                $event->sheet->mergeCells('P'. ($this->summarycontentstart+$this->summarycontentcount+1) . ':Q' . ($this->summarycontentstart+$this->summarycontentcount+1));
                $event->sheet->mergeCells('R'. ($this->summarycontentstart+$this->summarycontentcount+1) . ':S' . ($this->summarycontentstart+$this->summarycontentcount+1));

                $event->sheet->setCellValue('E' . ($this->summarycontentstart+$this->summarycontentcount+1),'汇总')
                    ->getStyle('E' . ($this->summarycontentstart+$this->summarycontentcount+1). ':S' . ($this->summarycontentstart+$this->summarycontentcount+1))->applyFromArray($border);
                $event->sheet->setCellValue('F' . ($this->summarycontentstart+$this->summarycontentcount+1),'天地版Carton Paper')
                    ->getStyle('F' . ($this->summarycontentstart+$this->summarycontentcount+1). ':G' . ($this->summarycontentstart+$this->summarycontentcount+1))->applyFromArray($border);
                $event->sheet->setCellValue('H' . ($this->summarycontentstart+$this->summarycontentcount+1),'60*30CM')
                    ->getStyle('H' . ($this->summarycontentstart+$this->summarycontentcount+1) .':I' . ($this->summarycontentstart+$this->summarycontentcount+1))->applyFromArray($border);
                $event->sheet->setCellValue('J' . ($this->summarycontentstart+$this->summarycontentcount+1),$this->cartonorder->carton_order_contents->sum('ctn_quantity'))
                    ->getStyle('J' . ($this->summarycontentstart+$this->summarycontentcount+1) .':K' . ($this->summarycontentstart+$this->summarycontentcount+1))->applyFromArray($border);
                $event->sheet->setCellValue('L' . ($this->summarycontentstart+$this->summarycontentcount+1),'pcs')
                    ->getStyle('L' . ($this->summarycontentstart+$this->summarycontentcount+1))->applyFromArray($border);
                $event->sheet->setCellValue('M' . ($this->summarycontentstart+$this->summarycontentcount+1),'$ 0.28' )
                    ->getStyle('M' . ($this->summarycontentstart+$this->summarycontentcount+1))->applyFromArray($border);
                $event->sheet->setCellValue('N' . ($this->summarycontentstart+$this->summarycontentcount+1),'$' . ($this->cartonorder->carton_order_contents->sum('ctn_quantity')*0.28))
                    ->getStyle('N' . ($this->summarycontentstart+$this->summarycontentcount+1) .':O' . ($this->summarycontentstart+$this->summarycontentcount+1))->applyFromArray($border);

                //carton paper
                //remarks
                $event->sheet->mergeCells('A'. $this->summarystart . ':C' . ($this->summarystart+5));
                $event->sheet->getStyle('A'. $this->summarystart . ':C' . ($this->summarystart+5))
                    ->applyFromArray($border)
                    ->getAlignment()
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP)
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $event->sheet->setCellValue('A'. $this->summarystart ,$this->cartonorder->ctn_remarks);
                //remarks

                //notes
                $bg = [
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => '1200B3']
                        ],
                        'font' => [

                            'bold'      =>  true,
                            'color' => ['argb' => 'FFFFFF'],
                        ],
                ];

                $event->sheet->mergeCells('A'. $this->notestart . ':G' . $this->notestart);
                $event->sheet->mergeCells('A'. ($this->notestart+1) . ':G' . ($this->notestart+1));
                $event->sheet->mergeCells('A'. ($this->notestart+2) . ':G' . ($this->notestart+2));
                $event->sheet->mergeCells('A'. ($this->notestart+3) . ':G' . ($this->notestart+3));
                $event->sheet->mergeCells('A'. ($this->notestart+4) . ':G' . ($this->notestart+4));
                $event->sheet->mergeCells('A'. ($this->notestart+5) . ':G' . ($this->notestart+5));
                $event->sheet->mergeCells('A'. ($this->notestart+6) . ':G' . ($this->notestart+6));
                $event->sheet->mergeCells('A'. ($this->notestart+7) . ':G' . ($this->notestart+7));
                $event->sheet->mergeCells('A'. ($this->notestart+8) . ':G' . ($this->notestart+8));
                $event->sheet->mergeCells('A'. ($this->notestart+9) . ':G' . ($this->notestart+9));

                $event->sheet->mergeCells('I'. $this->notestart . ':S' . $this->notestart);
                $event->sheet->mergeCells('I'. ($this->notestart+1) . ':S' . ($this->notestart+1));
                $event->sheet->mergeCells('I'. ($this->notestart+2) . ':S' . ($this->notestart+2));
                $event->sheet->mergeCells('I'. ($this->notestart+3) . ':S' . ($this->notestart+3));
                $event->sheet->mergeCells('I'. ($this->notestart+4) . ':S' . ($this->notestart+4));
                $event->sheet->mergeCells('I'. ($this->notestart+5) . ':S' . ($this->notestart+5));

                $event->sheet->getStyle('A'. $this->notestart . ':G' . $this->notestart)->applyFromArray($bg);
                $event->sheet->getStyle('I'. $this->notestart . ':S' . $this->notestart)->applyFromArray($bg);
                $event->sheet->setCellValue('A'. $this->notestart ,'要求注意事项');
                $event->sheet->setCellValue('A'. ($this->notestart+1) ,'※.确保纸箱材质选用正确与品质.');
                $event->sheet->setCellValue('A'. ($this->notestart+2) ,'※.印刷清晰，不能有污迹，注意上下距离和所要求的规格');
                $event->sheet->setCellValue('A'. ($this->notestart+3) ,'※.质量确保, 严格按我司要求尺寸来生产大货, 由于卖方生产问题和运输问题所发生的损失, 卖方负担由此产生的一切费用和损失.');
                $event->sheet->setCellValue('A'. ($this->notestart+4) ,'※.数量依照采购数量加工制作.');
                $event->sheet->setCellValue('A'. ($this->notestart+5) ,'※.箱唛印刷选择根据采购单上出口国家，在纸箱工艺说明中查找进行印刷.');
                $event->sheet->setCellValue('A'. ($this->notestart+6) ,'※.所有运送纸箱，需注明批号、型体、数量、PO号等相关信息,便于出货及点收.');
                $event->sheet->setCellValue('A'. ($this->notestart+7) ,'※.注意供应交期、配货地址等相关信息.');
                $event->sheet->setCellValue('A'. ($this->notestart+8) ,'※.如不能及时供货配送，请提前1-2天通知.');
                $event->sheet->setCellValue('A'. ($this->notestart+9) ,'※.如果在最后出口到直流仓库，因纸箱遭到客诉索赔，此费用将全部由供应商承担.');

                $event->sheet->setCellValue('I'. $this->notestart ,'款项说明');
                $event->sheet->setCellValue('I'. ($this->notestart+1) ,'*** 交货地点： 买方工厂');
                $event->sheet->setCellValue('I'. ($this->notestart+2) ,'*** 交货方式： 卖方负责安排货物运至买方工厂');
                $event->sheet->setCellValue('I'. ($this->notestart+3) ,'*** 请款时限： 每月月底前提交请款材料，超过次月5日的将自动转入次月月底，与次月一同请款');
                $event->sheet->setCellValue('I'. ($this->notestart+4) ,'*** 请款后隔月第三周礼拜五,上午8:30~10:30财务室结款 ');
                $event->sheet->setCellValue('I'. ($this->notestart+5) ,'*** 结款时请连同送货单、请款单、本采购单一同交至');

                $border = [
                    'borders' => [
                        //outline all
                        'bottom' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                    ],
                ];
                $event->sheet->getStyle('A' . ($this->notestart+10) . ':S' . ($this->notestart+10))->applyFromArray($border);
                //notes

                //sign

                $event->sheet->setCellValue('C'. $this->signstart ,$this->cartonorder->supplier->name_ch);
                $event->sheet->setCellValue('J'. $this->signstart ,'HORIZON OUTDOOR(CAMBODIA) CO., LTD');
                $event->sheet->getStyle('B' . ($this->signstart+1) . ':E' . ($this->signstart+1))->applyFromArray($border);
                $event->sheet->getStyle('I' . ($this->signstart+1) . ':M' . ($this->signstart+1))->applyFromArray($border);
                $event->sheet->setCellValue('C'. ($this->signstart+2) ,'Seller Signature')->getStyle('C'. ($this->signstart+2))
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('k'. ($this->signstart+2) ,'Buyer Signature');
                //sign


            },
        ];
    }

    public function startCell(): string
    {
        return 'A' . 17;
    }
    public function columnFormats(): array
    {
        return [

        ];
    }




    public function headings(): array
    {
        return [
           [ 'Factory PO',
            'DCode',
            'Customer',
            'Destination',
            'PO#',
            'Material',
            'Description',
            'Size',
            'TtlQty',
            'Qty/Ctn',
            'CtnSpec',
            'CtnMsrmnt',
            'CtnQty',
            'NW',
            'GW',
            'CtnPrice',
           'TTLamount',
           'CtnCode',
           'Clllctn',
           ],
            [ '批号',
                'DC',
                '客人名称',
                'គ目的地',
                'PO 号',
                '款号',
                '颜色全称',
                '尺码',
                '成品数量',
                '单箱件数',
                '材质规格',
                '纸箱尺寸',
                '纸箱数量',
                '净重',
                '毛重',
                '单价',
                '金额',
                '纸箱代号',
                '纸箱代号',
            ],
        ];
    }

    protected  function getCartonFormExcel($cartonform){

        $newcartonform = collect();

        foreach($cartonform->carton_order_contents as $carton_order_content){
            $cartonform = collect($carton_order_content)
                ->only(['ctn_factory_po','ctn_dc_code','ctn_customer_name','ctn_destination','ctn_master_po','ctn_material',
                    'ctn_description','ctn_style_size','ctn_po_quantity','ctn_quantity_per_carton']);
            $cartonform['ctn_specification'] = $carton_order_content->carton->ctn_specification;
            $cartonform['ctn_size'] = $carton_order_content->carton->ctn_size . 'CM';
            $cartonform['ctn_quantity'] = $carton_order_content->ctn_quantity;
            $cartonform['ctn_nw'] = $carton_order_content->ctn_nw_one;
            $cartonform['ctn_gw'] = $carton_order_content->ctn_gw_one;
            $cartonform['ctn_fob'] = $carton_order_content->carton->ctn_fob;
            $cartonform['ctn_total_fob'] = $carton_order_content->carton->ctn_fob*$carton_order_content->ctn_quantity;
            $this->totalfob = $this->totalfob + $cartonform['ctn_total_fob'];
            $cartonform['ctn_code'] = $carton_order_content->ctn_code;
            $cartonform['ctn_collection'] = $carton_order_content->ctn_collection;
//            dd($cartonform);
            $newcartonform->add($cartonform);
        }
        return $newcartonform;
    }

    public function title(): string
    {
        return 'CartonForm';
    }

    public function drawings()
    {
        $drawings = new Drawing();
        $drawings->setName('Horizon');
        $drawings->setDescription('Horizon Logo');
        $drawings->setPath(public_path('storage\images\horizonlogo-small.png'));
        $drawings->setCoordinates('A1');


        return [$drawings];
    }
}
