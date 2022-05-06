<?php

namespace App\Listeners;

use App\Events\GetTotalCutUtilEvent;
use App\Models\Cut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateTotalCutUtilListener
{

    public function handle(GetTotalCutUtilEvent $event)
    {


        $spread_start = new \DateTime($event->spread_start);
        $spread_start->format('Y-m-d H:i:s');
        $spread_end = new \DateTime($event->spread_end);
        $spread_end->format('Y-m-d H:i:s');

        $total_work_hours = 0;
        $total_days = 0;
        $tables_array = array();
        for($i = $spread_start; $i <= $spread_end; $i->modify('+1 day')){
            if($i->format("l") === 'Sunday'){
                $total_work_hours = $total_work_hours + 0;
            }elseif ($i->format("l") === 'Saturday'){
                $total_work_hours = $total_work_hours + 8;
            }else{
                $total_work_hours = $total_work_hours + 10;
            }
            $total_days++;
        }

        $datas = array(
            'building' => array(
                'B2' => array(

                ),
                'D4' => array(

                ),
                'E5' => array(

                ),
            ),
            'spread_start' => $this->formatDate($event->spread_start),
            'spread_end' => $this->formatDate($event->spread_end),
            'total_work_hours' => $total_work_hours,
            'total_days' => $total_days,

        );

        foreach($event->cuts as $key => $cut){


            $date = $this->formatDate($cut->spread_start);

            if(!in_array($cut->table_num, $tables_array, true)){
                array_push($tables_array, $cut->table_num);
            }


            if (array_key_exists($date, $datas['building'][$cut->building->building])){

                if(array_key_exists($cut->table_num,$datas['building'][$cut->building->building][$date])){
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['actual_yards'] =
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['actual_yards'] + ($cut->marker_length*$cut->layer_count);
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['work_hours'] =
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['work_hours'] + $cut->work_hours;
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['count'] =
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['count'] + 1;
                }else{
                    $datas['building'][$cut->building->building][$date][$cut->table_num] = array();
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['actual_yards'] = $cut->marker_length*$cut->layer_count;
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['work_hours'] = $cut->work_hours;
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['count'] = 1;
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['avg_work_hours'] = 0;
                }


            }else{
                $datas['building'][$cut->building->building][$date][$cut->table_num] = array();
                $datas['building'][$cut->building->building][$date][$cut->table_num]['actual_yards'] = $cut->marker_length*$cut->layer_count;
                $datas['building'][$cut->building->building][$date][$cut->table_num]['work_hours'] = $cut->work_hours;
                $datas['building'][$cut->building->building][$date][$cut->table_num]['count'] = 1;
                $datas['building'][$cut->building->building][$date][$cut->table_num]['avg_work_hours'] = 0;


            }



        }

//        dd($tables_array);

        $spread_start = new \DateTime($event->spread_start);
        $spread_start->format('Y-m-d H:i:s');
        $spread_end = new \DateTime($event->spread_end);
        $spread_end->format('Y-m-d H:i:s');

        for($i = $spread_start; $i <= $spread_end; $i->modify('+1 day')){

            $date = $i->format('m/d/Y');

            if($i->format("l") === 'Sunday'){
                $total_work_hour =  0;
            }elseif ($i->format("l") === 'Saturday'){
                $total_work_hour =  8;
            }else{
                $total_work_hour =  10;
            }

            if (array_key_exists($date, $datas['building']['B2'])){


                foreach($tables_array as $key => $table_array){
                    if (array_key_exists($tables_array[$key], $datas['building']['B2'][$date])){

                    }else{
                        $datas['building']['B2'][$date][$tables_array[$key]] = array();
                        $datas['building']['B2'][$date][$tables_array[$key]]['actual_yards'] = 0;
                        $datas['building']['B2'][$date][$tables_array[$key]]['work_hours'] = $total_work_hour;
                        $datas['building']['B2'][$date][$tables_array[$key]]['count'] = 1;
                        $datas['building']['B2'][$date][$tables_array[$key]]['avg_work_hours'] = 0;
                    }
                }


            }else{
                $datas['building']['B2'][$date] = array();

                for($tb = 0;$tb < count($tables_array);$tb++){
                    $datas['building']['B2'][$date][$tables_array[$tb]] = array();
                    $datas['building']['B2'][$date][$tables_array[$tb]]['actual_yards'] = 0;
                    $datas['building']['B2'][$date][$tables_array[$tb]]['work_hours'] = $total_work_hour;
                    $datas['building']['B2'][$date][$tables_array[$tb]]['count'] = 1;
                    $datas['building']['B2'][$date][$tables_array[$tb]]['avg_work_hours'] = 0;
                }
            }

        }



        return $datas;


    }

    protected function formatDate($date){
        $date = new \DateTime($date);
        return $date->format('m/d/Y');
    }
}
