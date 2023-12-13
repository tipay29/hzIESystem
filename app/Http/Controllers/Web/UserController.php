<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePassword(){
        return view('auth.change');
    }

    public function passwordUpdate(){

        $this->requestValidate();

        auth()->user()
            ->update(['password' => Hash::make(request()->password)]);

        return redirect()->back()->with('message', 'Update Password Successfully!');
    }

    protected function requestValidate(){

//        dd(request()->all());


        return request()->validate([
            'password' => 'min:8|required_with:password_two|same:password_two',
            'password_two' => 'min:8'
        ]);
    }
}
