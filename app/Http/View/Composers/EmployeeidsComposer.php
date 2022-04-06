<?php


namespace App\Http\View\Composers;


use App\Models\Employee;
use Illuminate\View\View;

class EmployeeidsComposer
{

    public function compose(View $view){
        $view->with('employees', Employee::where('user_account_id',null)->get());
    }

}
