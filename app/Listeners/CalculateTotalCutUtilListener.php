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

        $total_work_hours = 0;

        for($i = $event->spread_start; $i <= $event->spread_end; $i->modify('+1 day')){
            if($i->format("l") === 'Sunday'){
                $total_work_hours = $total_work_hours + 0;
            }elseif ($i->format("l") === 'Saturday'){
                $total_work_hours = $total_work_hours + 8;
            }else{
                $total_work_hours = $total_work_hours + 10;
            }
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


        );

        foreach($event->cuts as $key => $cut){


            $date = $this->formatDate($cut->spread_start);


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



        return $datas;


    }

    protected function formatDate($date){
        $date = new \DateTime($date);
        return $date->format('m/d/Y');
    }
}
