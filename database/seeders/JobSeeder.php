<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
           [
              'job' => 'IE'
           ] ,
            [
                'job' => 'Manager'
            ] ,
            [
                'job' => 'Sewer'
            ] ,
            [
                'job' => 'Cutter'
            ] ,
            [
                'job' => 'Spreader'
            ] ,
            [
                'job' => 'Cutting Officer'
            ] ,
            [
                'job' => 'Merchandiser'
            ] ,
            [
                'job' => 'Production Officer'
            ] ,
        ];

        foreach($jobs as $job){
            Job::create($job);
        }
    }
}
