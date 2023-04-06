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
                'job' => 'Planning Officer'
            ] ,
            [
                'job' => 'Shipping Officer'
            ] ,
            [
                'job' => 'Production Officer'
            ] ,
            [
                'job' => 'Quality Officer'
            ] ,
            [
                'job' => 'Packing Officer'
            ] ,

        ];

        foreach($jobs as $job){
            Job::create($job);
        }
    }
}
