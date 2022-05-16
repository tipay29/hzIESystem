<?php

namespace App\Listeners;

use App\Events\PushCutEffSheetEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use SheetDB\SheetDB;

class PushCutEffSheetListener implements ShouldQueue
{
    protected $cutsheets;

    public function __construct()
    {
        $this->cutsheets = new SheetDB('htc0dij9nkz59','CutEff');
    }

    public function handle(PushCutEffSheetEvent $event)
    {
        foreach($event->datas[0] as $k_b => $building){

            if($k_b == 2){

                foreach($building['dates'] as $k_d => $date){

                    $yard_total = 0;
                    $yard_total_r = 0;
                    $work_hour_divider = 0;
                    $work_hour = 0;
                    $avg_work_hour = 0;
                    $target_yard = 0;
                    $total_target_yard = 0;
                    $total_target_yard_r = 0;
                    $table_count = 0;
                    $table_target = $building['target_table'];
                    $table_util = 0;

                    foreach($date as $k_t => $table){

                        $yard_total = $yard_total + $table['actual_yard'];
                        $work_hour = $work_hour + $table['work_hour'];
                        $work_hour_divider = $work_hour_divider + 1;
                        if($table['input'] == 1){
                            $table_count = $table_count + 1;
                        }

                    }

                    $yard_total_r = round($yard_total);
                    $avg_work_hour = $work_hour/$work_hour_divider;
                    $target_yard = $avg_work_hour*319.5;
                    $total_target_yard = $table_target*$target_yard;
                    $total_target_yard_r = round($total_target_yard);
                    $table_util = round(($yard_total/$total_target_yard)*100);

                    $this->cutsheets->create([
                        'Spread Date Start' => $k_d,
                        'Building' => $k_b,
                        'SumOfSumOfSumOfSumOfSumOfYardRate11' => $yard_total_r,
                        'AvgOfSumOfMaxOfMaxOfWork Hours' => $avg_work_hour,
                        'Actual Output' => $yard_total,
                        'WorkHours' => $avg_work_hour,
                        'TargetOutput' => $target_yard,
                        'Table Utilization' => $table_util . '%',
                        'MaxDate' => $k_d,
                        'MinDate' => $k_d,
                        'Operation' => 'Spreading',
                        'Days' => '1',
                        'Total Workhours' => $avg_work_hour,
                        'SumOfTotal target' => $total_target_yard_r,
                        'TotalTable' => $table_target,
                        'ActiveTbl' => $table_target,
                        'CountOfTable No' => $table_count,
                        'Total Target 2' => $total_target_yard
                    ]);

                }

            }

            if($k_b == 4){

                foreach($building['dates'] as $k_d => $date){

                    $yard_total = 0;
                    $yard_total_r = 0;
                    $work_hour_divider = 0;
                    $work_hour = 0;
                    $avg_work_hour = 0;
                    $target_yard = 0;
                    $total_target_yard = 0;
                    $total_target_yard_r = 0;
                    $table_count = 0;
                    $table_target = $building['target_table'];
                    $table_util = 0;

                    foreach($date as $k_t => $table){

                        $yard_total = $yard_total + $table['actual_yard'];
                        $work_hour = $work_hour + $table['work_hour'];
                        $work_hour_divider = $work_hour_divider + 1;
                        if($table['input'] == 1){
                            $table_count = $table_count + 1;
                        }

                    }

                    $yard_total_r = round($yard_total);
                    $avg_work_hour = $work_hour/$work_hour_divider;
                    $target_yard = $avg_work_hour*319.5;
                    $total_target_yard = $table_target*$target_yard;
                    $total_target_yard_r = round($total_target_yard);
                    $table_util = round(($yard_total/$total_target_yard)*100);

                    $this->cutsheets->create([
                        'Spread Date Start' => $k_d,
                        'Building' => $k_b,
                        'SumOfSumOfSumOfSumOfSumOfYardRate11' => $yard_total_r,
                        'AvgOfSumOfMaxOfMaxOfWork Hours' => $avg_work_hour,
                        'Actual Output' => $yard_total,
                        'WorkHours' => $avg_work_hour,
                        'TargetOutput' => $target_yard,
                        'Table Utilization' => $table_util . '%',
                        'MaxDate' => $k_d,
                        'MinDate' => $k_d,
                        'Operation' => 'Spreading',
                        'Days' => '1',
                        'Total Workhours' => $avg_work_hour,
                        'SumOfTotal target' => $total_target_yard_r,
                        'TotalTable' => $table_target,
                        'ActiveTbl' => $table_target,
                        'CountOfTable No' => $table_count,
                        'Total Target 2' => $total_target_yard
                    ]);

                }

            }

            if($k_b == 5){

                foreach($building['dates'] as $k_d => $date){

                    $yard_total = 0;
                    $yard_total_r = 0;
                    $work_hour_divider = 0;
                    $work_hour = 0;
                    $avg_work_hour = 0;
                    $target_yard = 0;
                    $total_target_yard = 0;
                    $total_target_yard_r = 0;
                    $table_count = 0;
                    $table_target = $building['target_table'];
                    $table_util = 0;

                    foreach($date as $k_t => $table){

                        $yard_total = $yard_total + $table['actual_yard'];
                        $work_hour = $work_hour + $table['work_hour'];
                        $work_hour_divider = $work_hour_divider + 1;
                        if($table['input'] == 1){
                            $table_count = $table_count + 1;
                        }

                    }

                    $yard_total_r = round($yard_total);
                    $avg_work_hour = $work_hour/$work_hour_divider;
                    $target_yard = $avg_work_hour*319.5;
                    $total_target_yard = $table_target*$target_yard;
                    $total_target_yard_r = round($total_target_yard);
                    $table_util = round(($yard_total/$total_target_yard)*100);

                    $this->cutsheets->create([
                        'Spread Date Start' => $k_d,
                        'Building' => $k_b,
                        'SumOfSumOfSumOfSumOfSumOfYardRate11' => $yard_total_r,
                        'AvgOfSumOfMaxOfMaxOfWork Hours' => $avg_work_hour,
                        'Actual Output' => $yard_total,
                        'WorkHours' => $avg_work_hour,
                        'TargetOutput' => $target_yard,
                        'Table Utilization' => $table_util . '%',
                        'MaxDate' => $k_d,
                        'MinDate' => $k_d,
                        'Operation' => 'Spreading',
                        'Days' => '1',
                        'Total Workhours' => $avg_work_hour,
                        'SumOfTotal target' => $total_target_yard_r,
                        'TotalTable' => $table_target,
                        'ActiveTbl' => $table_target,
                        'CountOfTable No' => $table_count,
                        'Total Target 2' => $total_target_yard
                    ]);

                }

            }

        }

        return 1;
    }
}
