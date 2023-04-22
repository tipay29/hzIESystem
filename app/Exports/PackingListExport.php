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
    public function __construct($packinglists)
    {
        $this->packinglists = $packinglists;
        $this->shipmarkcount = 0 ;
        $this->mcqdetailcount = 0 ;
        $this->packcount = 0 ;
        $this->titleheadercount = 0;
        $this->contentcount = 0;
    }

    public function collection()
    {
//        dd($this->packinglists);
        $newpl = $this->getPackingListExcel($this->packinglists);
//        dd($newpl);
        return $newpl;
    }

    public function registerEvents(): array
    {
        return [

            BeforeSheet::class => function(BeforeSheet $event){
//                dd($this->packinglists);

                $this->mcqdetailcount = count($this->packinglists[count($this->packinglists)-1]['total_ctn_ctn']);
                $this->contentcount = count($this->packinglists);

                $this->packcount = 4 + $this->mcqdetailcount + 1;
                $this->titleheadercount = $this->packcount + 3;
                $this->shipmarkcount = $this->contentcount + $this->titleheadercount + 3;
            },
            AfterSheet::class => function(AfterSheet $event){
                //LEFT HEADER
                $event->sheet->setCellValue('A3','HORIZON OUTDOOR CAMBODIA Co. LTD');
                $event->sheet->setCellValue('A4','Phum Phsar Trach, Khum Longvek, Srok Kampong Tralach');
                $event->sheet->setCellValue('A4','Kampong Chnang Province, Cambodia');
                $event->sheet->setCellValue('A5','Tel: 855-78-210 076');
                $event->sheet->setCellValue('A6','Country of Origin: Cambodia');
                //LEFTHEADER

                //MID HEADER
                $event->sheet->mergeCells('G1:J1');
                $event->sheet->setCellValue('G1','PACKINGLIST');
                $event->sheet->mergeCells('G2:J2');
                $event->sheet->setCellValue('G2',$this->packinglists[0]['pl_factory_po']);
                $event->sheet->mergeCells('G3:J3');
                $event->sheet->setCellValue('G3',$this->packinglists[0]['pl_shipment_mode']);
                $event->sheet->mergeCells('H4:I4');
                $event->sheet->setCellValue('G4','MCQ');
                $event->sheet->setCellValue('H4','Carton');
                $event->sheet->setCellValue('J4','Total');
                $event->sheet->getDelegate()->getStyle('G')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('H4')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $startMCQDetail = 5;
                foreach($this->packinglists[count($this->packinglists)-1]['total_ctn_ctn'] as $key => $ctn){
                    $event->sheet->mergeCells('H' . $startMCQDetail . ':' . 'I' . $startMCQDetail);
                    $event->sheet->setCellValue('G'. $startMCQDetail,
                        $this->packinglists[count($this->packinglists)-1]['total_ctn_mcq'][$key]);
                    $event->sheet->setCellValue('H'. $startMCQDetail ,$key);
                    $event->sheet->setCellValue('J'. $startMCQDetail,$ctn);
                    $event->sheet->getDelegate()->getStyle('H' . $startMCQDetail)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $startMCQDetail++;
                }
                $event->sheet->setCellValue('H' . $this->packcount,'Special');
                $event->sheet->setCellValue('H' . ($this->packcount+1),'PrePack');
                $event->sheet->setCellValue('I' . $this->packcount,$this->packinglists[0]['pl_special_packs']);
                $event->sheet->setCellValue('I' . ($this->packcount+1),$this->packinglists[0]['pl_pre_pack']);
                //MID HEADER

                //RIGHT HEADER
                $event->sheet->mergeCells('N1:O1');
                $event->sheet->mergeCells('N2:O2');
                $event->sheet->mergeCells('N3:O3');
                $event->sheet->mergeCells('N4:O4');
                $event->sheet->mergeCells('N5:O5');
                $event->sheet->mergeCells('N6:O6');
                $event->sheet->setCellValue('N1','Status:')
                    ->getStyle('N1')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N2','MD:')
                    ->getStyle('N2')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N3','CRD:')
                    ->getStyle('N3')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N4','Customer Name:')
                    ->getStyle('N4')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N5','Destination Country:')
                    ->getStyle('N5')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $event->sheet->setCellValue('N6','Print Date:')
                    ->getStyle('N6')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

                $event->sheet->mergeCells('P1:Q1')->setCellValue('P1',$this->packinglists[0]['pl_status']);
                $event->sheet->mergeCells('P2:Q2')->setCellValue('P2',
                    User::where('id',$this->packinglists[0]['user_id'])->first()->name);
                $event->sheet->mergeCells('P3:Q3')->setCellValue('P3',$this->packinglists[0]['pl_crd']);
                $event->sheet->mergeCells('P4:Q4')->setCellValue('P4',$this->packinglists[0]['pl_country']);
                $event->sheet->mergeCells('P5:Q5')->setCellValue('P5',$this->packinglists[0]['pl_destination']);
                $event->sheet->mergeCells('P6:Q6')->setCellValue('P6','=now()');
                $event->sheet->getStyle('P6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_DDMMYYYY);
                $event->sheet->getStyle('P6')->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT);
                //RIGHT HEADER

                //BODY
                $event->sheet->getColumnDimension('A')->setWidth(16);
                $event->sheet->getColumnDimension('B')->setWidth(11);
                $event->sheet->getColumnDimension('C')->setWidth(10);
                $event->sheet->getColumnDimension('D')->setWidth(14);
                $event->sheet->getColumnDimension('E')->setWidth(25);
                $event->sheet->getColumnDimension('F')->setWidth(20);
                $event->sheet->getColumnDimension('G')->setWidth(8);
                $event->sheet->getColumnDimension('H')->setWidth(10);
                $event->sheet->getColumnDimension('I')->setWidth(10);
                $event->sheet->getColumnDimension('J')->setWidth(10);
                $event->sheet->getColumnDimension('K')->setWidth(13);
                $event->sheet->getColumnDimension('L')->setWidth(9);
                $event->sheet->getColumnDimension('M')->setWidth(10);
                $event->sheet->getColumnDimension('N')->setWidth(9);
                $event->sheet->getColumnDimension('O')->setWidth(10);
                $event->sheet->getColumnDimension('P')->setWidth(20);
                $event->sheet->getColumnDimension('Q')->setWidth(10);
                $event->sheet->getDelegate()->getStyle('K')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT)
                    ->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E:F')
                    ->getAlignment()->setWrapText(true);
                //BODY

                //BOTTOM
                //SHIPMARK
                $worksheet = $event->sheet->getDelegate();

                $this->setImage($worksheet);
                //SHIPMARK
                //REMARKS
                $event->sheet->setCellValue('J' . $this->shipmarkcount,'Remarks');
                $event->sheet->mergeCells('J' . ($this->shipmarkcount+1) . ':Q' . ($this->shipmarkcount+10))
                    ->setCellValue('J' . ($this->shipmarkcount+1),$this->packinglists[0]['pl_remarks'])
                    ->getStyle('J' . ($this->shipmarkcount+1))
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT)
                    ->setVertical(Alignment::VERTICAL_TOP)
                    ->setWrapText(true);
                //REMARKS
                //BOTTOM
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
            'PO',
            'Master PO',
            'Style',
            'Material',
            'Description',
            'Color',
            'Size',
            'TtlQty',
            'Qty/Ctn',
            'CtnNum',
            'CtnTtl',
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
         $drawings->setHeight(220);
         $drawings->setCoordinates('A' . $this->shipmarkcount);
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
