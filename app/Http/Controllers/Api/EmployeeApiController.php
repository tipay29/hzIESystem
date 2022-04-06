<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Validator;
class EmployeeApiController extends Controller
{

    public function index()
    {
        $employees = Employee::all();

        if(is_null($employees)){

            return response()->json(['Message' => 'No record!'],404);
        }

        return response()->json($employees,200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(Employee::create($this->rawData()),200);
    }


    public function show(Employee $employee)
    {
        if(is_null($employee)){
            return response()->json(['Message' =>'Record not found!'],404);
        }

        return response()->json( $employee,200);
    }


    public function update(Request $request, Employee $employee)
    {
        if(is_null($employee)){
            return response()->json(['Message' =>'Record not found!'],404);
        }

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(['success' => $employee->update($this->rawData())],201);
    }


    public function destroy(Employee $employee)
    {
        if(is_null($employee)){
            return response()->json(['Message' =>'Record not found!'],404);
        }

        return response()->json(['success' => $employee->delete()],200);
    }

    protected function dataValidated(){
        return [
            'id' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required',
            'job' => 'required',
            'building' => 'required',
            'address' => '',
            'birthday' => '',
            'join_date' => '',
        ];
    }

    protected function rawData(){
        return [
            'name' => request('name'),
            'phone' => request('phone'),
            'job' => request('job'),
            'building' => request('building'),
            'address' => request('address'),
            'birthday' => request('birthday'),
            'join_date' => request('join_date'),
        ];
    }
}
