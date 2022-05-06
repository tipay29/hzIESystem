<?php

namespace App\Listeners;

use App\Events\GetCutEffEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateCutUtilListener
{


    public function handle(GetCutEffEvent $event)
    {

        $total_work_hours = 0;
        $total_days = 0;
        for($i = $event->spread_start; $i <= $event->spread_end; $i->modify('+1 day')){
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
                    'table' => array(
                        1 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        2 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        3 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        4 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        5 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        6 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        7 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        8 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        9 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        10 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        11 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        12 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        13 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        14 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        15 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                    ),
                ),
                'D4' => array(
                    'table' => array(
                        1 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        2 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        3 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        4 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        5 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        6 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        7 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        8 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        9 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        10 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        11 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        12 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        13 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        14 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        15 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                    ),
                ),
                'E5' => array(
                    'table' => array(
                        1 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        2 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        3 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        4 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        5 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        6 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        7 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        8 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        9 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        10 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        11 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        12 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        13 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        14 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                        15 => array(
                            'days' => 0,
                            'work_hours' => 0,
                            'actual_yards' => 0,
                            'target_yards' => 0,
                            'table_util' => 0,
                        ),
                    ),
                ),

            ),
            'total_work_hours' => $total_work_hours,
        );

        foreach($event->cuts as $key => $cut)
        {
            $sundayCheck = new \DateTime($cut->spread_start);
            if($sundayCheck->format("l") === 'Sunday'){
                //nothing to do
            }else {
                $datas['building'][$cut->building->building]['table'][$cut->table_num]['days'] = $total_days;


                $datas['building'][$cut->building->building]['table'][$cut->table_num]['work_hours'] = $total_work_hours;

                $datas['building'][$cut->building->building]['table'][$cut->table_num]['actual_yards'] += round(($cut->marker_length * $cut->layer_count));
                $datas['building'][$cut->building->building]['table'][$cut->table_num]['target_yards'] = round(($total_work_hours * 319.55));
                $datas['building'][$cut->building->building]['table'][$cut->table_num]['table_util'] = round(
                    ($datas['building'][$cut->building->building]['table'][$cut->table_num]['actual_yards'] / $datas['building'][$cut->building->building]['table'][$cut->table_num]['target_yards'])
                    * 100);
            }
        }




        return $datas;


    }

}
