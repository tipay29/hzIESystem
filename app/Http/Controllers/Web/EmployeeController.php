<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function Symfony\Component\HttpFoundation\Session\Storage\Handler\buildDsnFromUrl;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        $employees->load(['job','building']);

        return view('employee.index', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create',Employee::class);

        $employee = new Employee();

        return view('employee.create', compact('employee'));


    }


    public function store(Request $request)
    {

        $this->authorize('create',Employee::class);

        $employee = auth()->user()->employee()->create($this->requestValidate());

        return redirect(route('employees.show', $employee->id));

    }



    public function show(Employee $employee)
    {
        $employee->load(['job','building']);
        $this->authorize('view',$employee);
        return view('employee.show', compact('employee'));

    }


    public function edit(Employee $employee)
    {
        $employee->load(['job','building']);
        $this->authorize('update',$employee);

        return view('employee.edit',compact('employee'));
    }


    public function update(Request $request, Employee $employee)
    {


        $this->authorize('update',$employee);

        $employee->update($this->requestValidate());

        return redirect(route('employees.show', $employee->id));
    }


    public function destroy(Employee $employee)
    {

        $this->authorize('delete',$employee);
        $employee->delete();
        return redirect(route('employees.index'));
    }

    protected function requestValidate(){
        return request()->validate([
            'id' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required',
            'job_id' => 'required',
            'building_id' => 'required',
            'address' => '',
            'birthday' => '',
            'join_date' => '',
        ]);
    }
}
