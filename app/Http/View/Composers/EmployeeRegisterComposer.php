<?php


namespace App\Http\View\Composers;


use App\Models\Employee;
use Illuminate\View\View;

class EmployeeRegisterComposer
{

    public function compose(View $view){

        $view->with('employees',  Employee::doesntHave('user')->get());
    }

}
