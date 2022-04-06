<?php


namespace App\Http\View\Composers;


use App\Models\Employee;
use App\Models\Job;
use Illuminate\View\View;

class JobComposer
{

    public function compose(View $view){
        $view->with('jobs', Job::all());
    }

}
