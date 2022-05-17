<?php

namespace App\Listeners;

use App\Events\GetTotalCutUtilEvent;
use App\Models\Building;
use App\Models\Cut;
use App\Models\ProductionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateTotalCutUtilListener
{

    public function handle(GetTotalCutUtilEvent $event)
    {


        $buildings = Building::select('id','cut_tables')->where('cutting',1)->get()->toArray();

        $datas = array();


        $dates = array();
        $daysBetween = 0;

        for($x = 0; $x < count($buildings);$x++){


            $datas[$buildings[$x]['id']] = array();
            $datas[$buildings[$x]['id']]['target_table'] = $buildings[$x]['cut_tables'];
            $datas[$buildings[$x]['id']]['dates'] = array();



            for($i = $event->spread_start; $i <= $event->spread_end; $i->modify('+1 day')){

                if($i->format("l") != 'Sunday'){
                    if($this->getWorkHoursWOInput($i,$buildings[$x]['id']) != 0){

                        $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')] = array();

                        foreach($event->cuts as $cut){

                            $cut_spread_start = new \DateTime($cut->spread_start);
                            if($cut->building_id == $buildings[$x]['id']){
                                if($cut_spread_start->format('Y-m-d') === $i->format('Y-m-d')){

                                        if(isset($datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['work_hour'])) {
                                            $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['work_hour'] =
                                                $this->getWorkHoursWithInput($i,$cut->work_hours,$buildings[$x]['id'])
//                                                $cut->work_hours
                                                ;
                                            $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['actual_yard'] +=
                                                $cut->marker_length*$cut->layer_count;
                                            $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['input'] = 1;
                                        }else{
                                            $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['work_hour'] =
                                                $this->getWorkHoursWithInput($i,$cut->work_hours,$buildings[$x]['id'])
//                                                $cut->work_hours
                                                ;
                                            $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['actual_yard'] =
                                                $cut->marker_length*$cut->layer_count;
                                            $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['input'] = 1;
                                        }

                                }else{
                                    if(!isset($datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['work_hour'])){
                                        $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['work_hour'] = $this->getWorkHoursWOInput($i,$buildings[$x]['id']);
                                        $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['actual_yard'] = 0;
                                        $datas[$buildings[$x]['id']]['dates'][$i->format('m/d/Y')][$cut->table_num]['input'] = 0;
                                    }
                                }
                            }

                        }


                    }
                }
                $daysBetween++;
            }

            $daysMinus = '-' . $daysBetween . ' day';
            $event->spread_start->modify($daysMinus);
            $daysBetween = 0;


        }








        return $datas;


    }

    protected function getWorkHoursWOInput($i,$bldg){

        $whs = ProductionEvent::pluck('work_hour','special_date')->toArray();
        $bldgs = ProductionEvent::pluck('bldg','special_date')->toArray();


        $work_hours = 10;

        if($i->format("l") == 'Saturday'){
            $work_hours = 8;
        }
        if(array_key_exists($i->format('Y-m-d'),$whs)){

            $bldgs = array_map('intval', explode(',',$bldgs[$i->format('Y-m-d')]));

            if(in_array($bldg,$bldgs)){
                $work_hours = $whs[$i->format('Y-m-d')];
            }

        }

        return $work_hours;
    }

    protected function getWorkHoursWithInput($i,$cut_work_hours,$bldg){

        $whs = ProductionEvent::pluck('work_hour','special_date')->toArray();
        $bldgs = ProductionEvent::pluck('bldg','special_date')->toArray();

        if(array_key_exists($i->format('Y-m-d'),$whs)){

            $bldgs = array_map('intval', explode(',',$bldgs[$i->format('Y-m-d')]));

            if(in_array($bldg,$bldgs)){
                return $whs[$i->format('Y-m-d')];
            }

        }

        return $cut_work_hours;

    }


}
