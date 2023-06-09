<?php

namespace App\Exports;

use App\Models\PackingList;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;
use phpDocumentor\Reflection\Types\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PackingListExport implements FromCollection,WithCustomStartCell,WithHeadings,WithEvents,
    WithDrawings,WithColumnFormatting,WithTitle
{

    protected $packinglists;

    protected $shipmarkcount;
    protected $mcqdetailcount;
    protected $packcount;
    protected $titleheadercount;
    protected $contentcount;
    protected $summarycount;
    protected $contentsummarycount;

    public function __construct($packinglists)
    {
        $this->packinglists = $packinglists;
        $this->shipmarkcount = 0 ;
        $this->mcqdetailcount = 0 ;
        $this->packcount = 0 ;
        $this->titleheadercount = 0;
        $this->contentcount = 0;
        $this->summarycount = 0;
        $this->contentsummarycount = 0;
    }

    public function collection()
    {
//        dd($this->packinglists);
        $newpl = $this->getPackingListExcel($this->packinglists);
//        dd($newpl);
//        dd($newpl);
//        dd($this->packinglists);
        return $newpl;
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event){
//                dd($this->packinglists);
                $event->sheet
                    ->getPageSetup()
                    ->setScale(57)
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $this->mcqdetailcount = count($this->packinglists[count($this->packinglists)-1]['total_ctn_ctn']);
                $this->contentcount = count($this->packinglists);
                $this->contentsummarycount = count($this->packinglists[count($this->packinglists)-1]['summary']);

                $this->titleheadercount = 10;
                $this->summarycount = $this->contentcount + $this->titleheadercount + 1;
                $this->shipmarkcount = $this->summarycount + $this->contentsummarycount + 4;
            },
            AfterSheet::class => function(AfterSheet $event){

                $fontSize = [
                    'font' => [
                        'size' => 8,
                    ],
                ];
                $event->sheet->getStyle('E' . ($this->titleheadercount+1) . ':F' . ($this->titleheadercount+1+$this->contentcount))
                ->applyFromArray($fontSize);
                $event->sheet->getStyle('E' . ($this->summarycount+2) . ':F' . ($this->summarycount+2+$this->contentsummarycount))
                ->applyFromArray($fontSize);

                //LEFT HEADER
                $event->sheet->setCellValue('A3','HORIZON OUTDOOR CAMBODIA CO., LTD');
                $event->sheet->setCellValue('A4','National Highway 5, 43 Kilometers, Phum Phsar Trach, Khum Longvek, ');
                $event->sheet->setCellValue('A5','Srok Kampong Trolach,Kampong Chhnang Province, Cambodia');
                $event->sheet->setCellValue('A6','Tel:');
                $event->sheet->setCellValue('B6','855-78-210 076');
                $event->sheet->setCellValue('A7','Country of Origin: Cambodia')
                ->getStyle('A7')
                ->applyFromArray($fontSize);
                $event->sheet->setCellValue('B7','Cambodia');
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                ];
                $event->sheet->getStyle('A3')
                    ->applyFromArray($style);
                //LEFTHEADER

                //MID HEADER
                $font = [
                    'font' => [
                        'bold' => true,
                    ],
                ];
                $border = [
                    'borders' => [
                        //outline all
                        'bottom' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                    ],
                ];
                $borderall = [
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $fontBig = [
                    'font' => [
                        'size' => 18,
                        'bold' => true,
                    ],
                ];
                $event->sheet->mergeCells('G1:J1');
                $event->sheet->setCellValue('G1','PACKING LIST')->getStyle('G1')
                    ->applyFromArray($fontBig)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('G2:J2');
                $event->sheet->setCellValue('G2',$this->packinglists[0]['pl_factory_po'])->getStyle('G2')
                    ->applyFromArray($font)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


                $event->sheet->mergeCells('G3:H3');
                $event->sheet->setCellValue('G3','Ship Mode')->getStyle('G3:H3')
                    ->applyFromArray($font)->applyFromArray($borderall)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('I3:J3');
                $event->sheet->setCellValue('I3',$this->packinglists[0]['pl_shipment_mode'])
                    ->getStyle('I3:J3')
                    ->applyFromArray($font)->applyFromArray($borderall)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->mergeCells('G4:J7')
                    ->getStyle('G4:J7')
                    ->applyFromArray($borderall);

                $event->sheet->setCellValue('G4','Remarks:' . $this->packinglists[0]['pl_remarks'])
                    ->getStyle('G4')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT)
                    ->setVertical(Alignment::VERTICAL_TOP)
                    ->setWrapText(true);
                //MID HEADER

                //RIGHT HEADER
                $event->sheet->mergeCells('N2:O2');
                $event->sheet->mergeCells('N3:O3');
                $event->sheet->mergeCells('N4:O4');
                $event->sheet->mergeCells('N5:O5');
                $event->sheet->mergeCells('N6:O6');
                $event->sheet->mergeCells('N7:O7');
                $event->sheet->setCellValue('N2','Status:')
                    ->getStyle('N2')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N3','MD:')
                    ->getStyle('N3')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N4','Print Date:')
                    ->getStyle('N4')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N5','CRD:')
                    ->getStyle('N5')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N6','Customer Name:')
                    ->getStyle('N6')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N7','Destination Country:')
                    ->getStyle('N7')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


                $event->sheet->mergeCells('P2:Q2')->setCellValue('P2',$this->packinglists[0]['pl_status']);
                $event->sheet->mergeCells('P3:Q3')->setCellValue('P3',
                    User::where('id',$this->packinglists[0]['user_id'])->first()->name);
                $event->sheet->mergeCells('P4:Q4')->setCellValue('P4','=now()');
                $event->sheet->mergeCells('P5:Q5')->setCellValue('P5',$this->packinglists[0]['pl_crd']);
                $event->sheet->mergeCells('P6:Q6')->setCellValue('P6',$this->packinglists[0]['pl_country']);
                $event->sheet->mergeCells('P7:Q7')->setCellValue('P7',$this->packinglists[0]['pl_destination']);
                $event->sheet->getStyle('P4')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_DDMMYYYY);
                $event->sheet->getStyle('P4')->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                ];
                $event->sheet->getStyle('N2:N7')
                    ->applyFromArray($style);
                //RIGHT HEADER

                //BODY
                //TITLE
                $style = [
                    'font' => [
                      'bold' => true,
                    ],
                    'borders' => [
                        'top' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                        'bottom' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                    ],
                ];
                $event->sheet->getStyle('A' . $this->titleheadercount . ':Q' . $this->titleheadercount)
                    ->applyFromArray($style);

                //TITLE

                $event->sheet->getColumnDimension('A')->setWidth(12);
                $event->sheet->getColumnDimension('B')->setWidth(16);
                $event->sheet->getColumnDimension('C')->setWidth(10);
                $event->sheet->getColumnDimension('D')->setWidth(14);
                $event->sheet->getColumnDimension('E')->setWidth(25);
                $event->sheet->getColumnDimension('F')->setWidth(20);
                $event->sheet->getColumnDimension('G')->setWidth(8);
                $event->sheet->getColumnDimension('H')->setWidth(10);
                $event->sheet->getColumnDimension('I')->setWidth(10);
                $event->sheet->getColumnDimension('J')->setWidth(13);
                $event->sheet->getColumnDimension('K')->setWidth(10);
                $event->sheet->getColumnDimension('L')->setWidth(9);
                $event->sheet->getColumnDimension('M')->setWidth(10);
                $event->sheet->getColumnDimension('N')->setWidth(9);
                $event->sheet->getColumnDimension('O')->setWidth(10);
                $event->sheet->getColumnDimension('P')->setWidth(20);
                $event->sheet->getColumnDimension('Q')->setWidth(10);
                $event->sheet->getDelegate()->getStyle('J')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT)
                    ->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E:F')
                    ->getAlignment()->setWrapText(true);

                //TOTAL STYLE
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        'top' => [
                            'borderStyle' => Border::BORDER_THIN

                        ],
                        'bottom' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $event->sheet->setCellValue('A' . ($this->summarycount-1),'TOTAL');
                $event->sheet->getStyle('A' . ($this->summarycount-1) . ':Q' . ($this->summarycount-1))
                    ->applyFromArray($style);

//                dd($this->contentcount);
                for($ctn = 0; $ctn < ($this->contentcount-1);$ctn++){
                    $cellValue = $event->sheet->getCell('P'.($this->titleheadercount+1+$ctn))->getValue();
                    $event->sheet->setCellValue('P'.($this->titleheadercount+1+$ctn),($cellValue.'CM'));
                }

                //BODY

                //SUMMARY

                $summaries =  $this->packinglists[count($this->packinglists)-1]['summary'];
//                dd($summaries);
                $style = [
                  'font' => [
                    'bold' => true,
                  ] ,
                ];

                $event->sheet->setCellValue('A' . ($this->summarycount+1),'Material Summary')
                    ->getStyle('A' . ($this->summarycount+1))
                    ->applyFromArray($style);
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        'top' => [
                            'borderStyle' => Border::BORDER_THIN

                        ],
                        'bottom' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $event->sheet->setCellValue('C' . ($this->summarycount+1),'Style');
                $event->sheet->setCellValue('D' . ($this->summarycount+1),'Material');
                $event->sheet->setCellValue('E' . ($this->summarycount+1),'Style Desc');
                $event->sheet->setCellValue('F' . ($this->summarycount+1),'Color');
                if($this->packinglists[0]['pl_type'] == "APPAREL"){
                $event->sheet->setCellValue('G' . ($this->summarycount+1),'Size');
                }
                $event->sheet->setCellValue('H' . ($this->summarycount+1),'Quantity');
                $event->sheet->setCellValue('K' . ($this->summarycount+1),'Carton');
                $event->sheet->setCellValue('M' . ($this->summarycount+1),'TNW');
                $event->sheet->setCellValue('O' . ($this->summarycount+1),'TGW');
                $event->sheet->setCellValue('Q' . ($this->summarycount+1),'CBM');
                foreach($summaries as $key => $summary){
                    $event->sheet->setCellValue('C' . ($this->summarycount+2+$key),$summary['pl_sku']);
                    $event->sheet->setCellValue('D' . ($this->summarycount+2+$key),$summary['pl_material']);
                    $event->sheet->setCellValue('E' . ($this->summarycount+2+$key),$summary['pl_description']);
                    $event->sheet->setCellValue('F' . ($this->summarycount+2+$key),$summary['pl_color']);
                    if($this->packinglists[0]['pl_type'] == "APPAREL") {
                        $event->sheet->setCellValue('G' . ($this->summarycount + 2 + $key), $summary['pl_size']);
                    }
                    $event->sheet->setCellValue('H' . ($this->summarycount+2+$key),$summary['pl_quantity']);
                    $event->sheet->setCellValue('K' . ($this->summarycount+2+$key),$summary['pl_carton']);
                    $event->sheet->setCellValue('M' . ($this->summarycount+2+$key),$summary['pl_nw']);
                    $event->sheet->setCellValue('O' . ($this->summarycount+2+$key),$summary['pl_gw']);
                    $event->sheet->setCellValue('Q' . ($this->summarycount+2+$key),$summary['pl_cbm']);
                }
//                dd($this->packinglists);
                $event->sheet->setCellValue('H' . ($this->shipmarkcount-2),$this->packinglists[count($this->packinglists)-1]['total_qty_ship']);
                $event->sheet->setCellValue('K' . ($this->shipmarkcount-2),$this->packinglists[count($this->packinglists)-1]['total_carton']);
                $event->sheet->setCellValue('M' . ($this->shipmarkcount-2),$this->packinglists[count($this->packinglists)-1]['total_nw']);
                $event->sheet->setCellValue('O' . ($this->shipmarkcount-2),$this->packinglists[count($this->packinglists)-1]['total_gw']);
                $event->sheet->setCellValue('Q' . ($this->shipmarkcount-2),$this->packinglists[count($this->packinglists)-1]['total_cbm']);
                $event->sheet->setCellValue('A' . ($this->shipmarkcount-2),'TOTAL');

                $event->sheet->getStyle('A' . ($this->shipmarkcount-2) . ':Q' . ($this->shipmarkcount-2))
                    ->applyFromArray($style);

                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        //outline all
                        'top' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                        'bottom' => [
                            'borderStyle' => Border::BORDER_MEDIUM,

                        ],
                    ],
                ];
                $event->sheet->getStyle('A' . ($this->summarycount+1) . ':Q' . ($this->summarycount+1))
                    ->applyFromArray($style);


                //SUMMARY

                //BOTTOM
                //SHIPMARK
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    ];
                $event->sheet->setCellValue('A' . ($this->shipmarkcount),'Carton Marking')
                    ->getStyle('A' . ($this->shipmarkcount))
                    ->applyFromArray($style);
                $borderUp = [
                    'borders' => [
                        //outline all
                        'top' => [
                            'borderStyle' => Border::BORDER_THICK,

                        ],
                    ],
                ];



                $worksheet = $event->sheet->getDelegate();

                $this->setImage($worksheet);
                //SHIPMARK

                //PACKING METHOD
                if($this->packinglists[0]['pl_type'] == "APPAREL" || $this->packinglists[0]['pl_remarks_two'] !== null){
                    $event->sheet->setCellValue('A' . ($this->shipmarkcount+14),'Packing Method')
                        ->getStyle('A' . ($this->shipmarkcount+14))
                        ->applyFromArray($style);
                    $event->sheet->mergeCells('A' . ($this->shipmarkcount+15) . ':F' . ($this->shipmarkcount+27))
                        ->getStyle('A' . ($this->shipmarkcount+15) . ':F' . ($this->shipmarkcount+27))
                        ->applyFromArray($borderall);
                    if($this->packinglists[0]['pl_type'] == "APPAREL"){
                        $data = '***入箱方式:
    1.每一个纸箱用要印有"SECURITY SEAL"字样的6CMW胶带封口;
    2.纸箱上面要放一块三层纸板
    干燥剂在衣服右胸内里及左口袋内里各放一包。
    其中WHITE & MOONLIGHT IVORY&Vaporous Grey 颜色应纸箱
    上下对角各放三包，不放三层纸板。
    3.入箱要平整,规范。样衣请调头交换入箱.
    4.样衣入箱后,如纸箱尺寸有问题,请及时通知生管.
    5.因表布每缸会有色差。每箱入箱时，
     有色差的不可同时装在一箱内。
    6.请提供各尺寸的单件重量及各尺寸的装箱净毛重.
    7.纸箱侧需贴NGC,有记号点（贴纸要贴正）
    ';
                    }else{
                            $data = '';
                    }

                    $event->sheet->setCellValue('A'. ($this->shipmarkcount+15),
                        $data
                        . $this->packinglists[0]['pl_remarks_two'])
                        ->getStyle('A'.($this->shipmarkcount+15))
                        ->getAlignment()
                        ->setHorizontal(Alignment::HORIZONTAL_LEFT)
                        ->setVertical(Alignment::VERTICAL_TOP)
                        ->setWrapText(true);
                }
                //PACKING METHOD

                //SUMMARY DETAILS

                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $event->sheet->mergeCells('I'. $this->shipmarkcount . ':Q' . $this->shipmarkcount);
                $event->sheet->setCellValue('I'. $this->shipmarkcount,
                    'Summary')
                    ->getStyle('I'. $this->shipmarkcount . ':Q'. $this->shipmarkcount)
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('I'. ($this->shipmarkcount+1) . ':J' . ($this->shipmarkcount+1));
                $event->sheet->mergeCells('K'. ($this->shipmarkcount+1) . ':Q' . ($this->shipmarkcount+1));
                $event->sheet->setCellValue('I'. ($this->shipmarkcount+1),
                     'Factory PO')
                    ->getStyle('I'. ($this->shipmarkcount+1) . ':J'. ($this->shipmarkcount+1))
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->setCellValue('K'. ($this->shipmarkcount+1),
                    $this->packinglists[0]['pl_factory_po'])
                    ->getStyle('K'. ($this->shipmarkcount+1) . ':Q'. ($this->shipmarkcount+1))
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


                $event->sheet
                    ->getStyle('A' . ($this->shipmarkcount) . ':Q' . ($this->shipmarkcount))
                    ->applyFromArray($borderUp);
                $event->sheet
                    ->getStyle('A' . ($this->titleheadercount-1) . ':Q' . ($this->titleheadercount-1))
                    ->applyFromArray($borderUp);
                //SUMMARY DETAILS


                //PACK DETAILS
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $event->sheet->mergeCells('I'. ($this->shipmarkcount+3) . ':K' . ($this->shipmarkcount+3));
                $event->sheet->setCellValue('I'. ($this->shipmarkcount+3),
                    'Pack Details')
                    ->getStyle('I'. ($this->shipmarkcount+3) . ':K' . ($this->shipmarkcount+3))
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $borders = [
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $event->sheet->mergeCells('I'. ($this->shipmarkcount+4) . ':J' . ($this->shipmarkcount+4));
                $event->sheet->setCellValue('I'. ($this->shipmarkcount+4),
                    'Special Pack')
                    ->getStyle('I'. ($this->shipmarkcount+4) . ':J' . ($this->shipmarkcount+4))
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('K'. ($this->shipmarkcount+4) . ':K' . ($this->shipmarkcount+4));
                $event->sheet->setCellValue('K'. ($this->shipmarkcount+4),
                    $this->packinglists[0]['pl_special_packs'])
                    ->getStyle('K'. ($this->shipmarkcount+4) . ':K' . ($this->shipmarkcount+4))
                    ->applyFromArray($borders)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('I'. ($this->shipmarkcount+5) . ':J' . ($this->shipmarkcount+5));
                $event->sheet->mergeCells('K'. ($this->shipmarkcount+5) . ':K' . ($this->shipmarkcount+5));
                $event->sheet->setCellValue('I'. ($this->shipmarkcount+5),
                    'Pre Pack')
                    ->getStyle('I'. ($this->shipmarkcount+5) . ':J' . ($this->shipmarkcount+5))
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;
                $event->sheet->setCellValue('K'. ($this->shipmarkcount+5),
                    $this->packinglists[0]['pl_pre_pack'])
                    ->getStyle('K'. ($this->shipmarkcount+5) . ':K' . ($this->shipmarkcount+5))
                    ->applyFromArray($borders)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                //PACKDETAILS
                //CARTONDETAILS
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $event->sheet->mergeCells('I'. ($this->shipmarkcount+7) . ':K' . ($this->shipmarkcount+7));
                $event->sheet->setCellValue('I'. ($this->shipmarkcount+7),
                    'Carton Details')
                    ->getStyle('I'. ($this->shipmarkcount+7) . ':K' . ($this->shipmarkcount+7))
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $event->sheet->mergeCells('I'. ($this->shipmarkcount+8) . ':J' . ($this->shipmarkcount+8));
                $event->sheet->setCellValue('I'. ($this->shipmarkcount+8),
                    'Carton Size')
                    ->getStyle('I'. ($this->shipmarkcount+8) . ':J' . ($this->shipmarkcount+8))
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('K'. ($this->shipmarkcount+8) . ':K' . ($this->shipmarkcount+8));
                $event->sheet->setCellValue('K'. ($this->shipmarkcount+8),
                    'Quantity')
                    ->getStyle('K'. ($this->shipmarkcount+8) . ':K' . ($this->shipmarkcount+8))
                    ->applyFromArray($style)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $startCartonDetail = 9;

                $ctntotal_start = $this->shipmarkcount + $startCartonDetail + count($this->packinglists[count($this->packinglists)-1]['mcqcarton_details']['carton_details']);
                $ctntotal =0;
                foreach($this->packinglists[count($this->packinglists)-1]['mcqcarton_details']['carton_details'] as $key => $carton){
                    $event->sheet->mergeCells('I'. ($this->shipmarkcount+$startCartonDetail) . ':J' . ($this->shipmarkcount+$startCartonDetail));
                    $event->sheet->setCellValue('I'. ($this->shipmarkcount+$startCartonDetail),
                        $key . 'CM')
                        ->getStyle('I'. ($this->shipmarkcount+$startCartonDetail) . ':J' . ($this->shipmarkcount+$startCartonDetail))
                        ->applyFromArray($borders);
                    $event->sheet->mergeCells('K'. ($this->shipmarkcount+$startCartonDetail) . ':K' . ($this->shipmarkcount+$startCartonDetail));
                    $event->sheet->setCellValue('K'. ($this->shipmarkcount+$startCartonDetail),
                        $carton)
                        ->getStyle('K'. ($this->shipmarkcount+$startCartonDetail) . ':K' . ($this->shipmarkcount+$startCartonDetail))
                        ->applyFromArray($borders);;
                    $ctntotal = $ctntotal + $carton;
                    $startCartonDetail++;
                }
                $event->sheet->mergeCells('I'. $ctntotal_start . ':J' . $ctntotal_start);
                $event->sheet->mergeCells('K'. $ctntotal_start . ':K' . $ctntotal_start);
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                $event->sheet->setCellValue('I'. $ctntotal_start,'Total')
                    ->getStyle('I'. $ctntotal_start . ':J' . $ctntotal_start)
                     ->applyFromArray($style);
                $event->sheet->setCellValue('K'. $ctntotal_start,$ctntotal)
                    ->getStyle('K'. $ctntotal_start . ':K' . $ctntotal_start)
                    ->applyFromArray($style);

                //CARTONDETAILS
                //MCQ DETAILS
                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,

                    ],
                ];
                $event->sheet->mergeCells('O'. ($this->shipmarkcount+3) . ':Q' . ($this->shipmarkcount+3));
                $event->sheet->setCellValue('O'. ($this->shipmarkcount+3),
                    'MCQ Details')
                    ->getStyle('O'. ($this->shipmarkcount+3) . ':Q' . ($this->shipmarkcount+3))
                    ->applyFromArray($style)->applyFromArray($borderall)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $style = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        //outline all
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,

                        ],
                    ],
                ];
                if($this->packinglists[0]['pl_type'] == "APPAREL"){
                    $style_size = 'Size';
                }else{
                    $style_size = 'Style';
                }
                $event->sheet->setCellValue('O' .($this->shipmarkcount+4),$style_size)
                    ->getStyle('O'.($this->shipmarkcount+4))
                    ->applyFromArray($style)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->setCellValue('P' .($this->shipmarkcount+4),'Carton')->getStyle('P'.($this->shipmarkcount+4))
                    ->applyFromArray($style)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->setCellValue('Q' .($this->shipmarkcount+4),'MCQ')->getStyle('Q'.($this->shipmarkcount+4))
                    ->applyFromArray($style)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $startMCQDetail = 5;
                foreach($this->packinglists[count($this->packinglists)-1]['mcqcarton_details']['mcq_details'] as $key => $mcq){

                    $event->sheet->setCellValue('O' .($this->shipmarkcount+$startMCQDetail),$mcq['basis'])
                        ->getStyle('O' .($this->shipmarkcount+$startMCQDetail))
                        ->applyFromArray($borders);
                    $event->sheet->setCellValue('P' .($this->shipmarkcount+$startMCQDetail),$mcq['carton_size'] . 'CM')
                        ->getStyle('P' .($this->shipmarkcount+$startMCQDetail))
                        ->applyFromArray($borders);
                    $event->sheet->setCellValue('Q' .($this->shipmarkcount+$startMCQDetail),$mcq['mcq'])
                        ->getStyle('Q' .($this->shipmarkcount+$startMCQDetail))
                        ->applyFromArray($borders);
                    $startMCQDetail++;
                }
                //MCQ DETAILS

                //BOTTOM
                $this->columnFormats();
            }

        ];


    }


    public function startCell(): string
    {
        return 'A' . $this->titleheadercount;
    }

    public function headings(): array
    {
        return [
            'Master PO',
            'PO',
            'Style',
            'Material',
            'Style Desc',
            'Color',
            'Size',
            'TtlQty',
            'Qty/Ctn',
            'CtnNo',
            'CtnQty',
            'NW',
            'TNW',
            'GW',
            'TGW',
            'Ctn Measurement',
            'CBM'
        ];
    }


    protected function getPackingListExcel($packinglists){

        $newpl = collect();
        foreach($packinglists as $key => $packinglist){
//            dd($packinglist);

            if($key == count($this->packinglists)-1){
                $plp['pl_po_cut'] = '';
                $plp['pl_master_po'] = '';
                $plp['pl_sku'] = '';
                $plp['pl_material'] = '';
                $plp['pl_description'] = '';
                $plp['pl_color'] = '';
                $plp['pl_stlye_size'] = '';
                $plp['total_qty_ship'] = $packinglist['total_qty_ship'];
                $plp['pl_one_ctn_item_count'] = '';
                $plp['carton_number_display'] = '';
                $plp['total_carton'] = $packinglist['total_carton'];
                $plp['net_weight_one_ctn'] = '';
                $plp['total_nw'] = $packinglist['total_nw'];
                $plp['gross_weight_one_ctn'] = '';
                $plp['total_gw'] = $packinglist['total_gw'];
                $plp['carton_size'] = '';
                $plp['total_cbm'] = $packinglist['total_cbm'];

                $newplp = collect($plp)->toArray();

                $newpl->add($newplp);
            }else{
                $pl = collect($packinglist)
                    ->only(['pl_po_cut','pl_master_po','pl_sku',
                        'pl_material','pl_description',
                        'pl_color','pl_order_quantity_cut','pl_one_ctn_item_count','pl_style_size',
                        'carton_number_display','pl_number_of_carton',
                        'net_weight_one_ctn','net_weight_total',
                        'gross_weight_one_ctn','gross_weight_total',
                        'carton_size','cbm'])
                    ->toArray();
                $newpl->add($pl);
            }
        }
        return $newpl;
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'B' => NumberFormat::FORMAT_NUMBER,
        ];
    }


    public function setImage($worksheet){



        $drawings = new Drawing();
         $drawings->setName('sm');
         $drawings->setDescription('sm Logo');
         try {
             $drawings->setPath(public_path('storage\images\shipmark\\' . $this->packinglists[0]['pl_brand'] . '\\'
                 . $this->packinglists[0]['pl_type'] . '\\' . trim($this->packinglists[0]['pl_country'] . " "
                     . $this->packinglists[0]['pl_country_two']) . '.png'));
         }catch (\Exception $e){
             $drawings->setPath(public_path('storage\images\sm.png'));
         }
         $drawings->setHeight(250);
         $drawings->setCoordinates('A' . ($this->shipmarkcount+1));
         $drawings->setWorksheet($worksheet);
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

     public function title(): string
     {
        return $this->packinglists[0]['pl_destination'] . ' ' . $this->packinglists[0]['pl_crd'];
     }
}
