<?php

namespace App\Http\Controllers\Web;

use App\Exports\CartonOrderExport;
use App\Models\CartonOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class CartonOrderController extends Controller
{

    public function index()
    {

        $carton_orders = CartonOrder::with('carton_order_contents')->paginate(10)->sortByDesc('id');

        return view('carton-order.index',compact('carton_orders'));

    }



    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(CartonOrder $carton_order)
    {
        $carton_order->load(['carton_order_contents']);

        return view('carton-order.order-show', compact('carton_order'));
    }

    public function export(CartonOrder $cartonorder){
        $cartonorder->load('carton_order_contents');

        $excel = Excel::download(new CartonOrderExport($cartonorder), 'carton-form.xlsx');

        return $excel;
    }

    public function exportPDF(CartonOrder $cartonorder){
        $cartonorder->load('carton_order_contents');
//        dd('aw');
        $pdf = Excel::download(new CartonOrderExport($cartonorder), 'carton-form.pdf',\Maatwebsite\Excel\Excel::MPDF);

        return $pdf;
    }

    public function edit(CartonOrder $cartonOrder)
    {

    }

    public function update(Request $request, CartonOrder $cartonOrder)
    {

    }

    public function destroy(CartonOrder $cartonOrder)
    {
        $cartonOrder->carton_order_contents()->delete();
        $cartonOrder->delete();
        return redirect(route('carton-orders.index'));
    }

    public function sendMail()
    {
        $emails = explode(';',request()->ctn_mail_email);

        Mail::to($emails)->cc('warren_pp@horizon-outdoor.com')->send(new \App\Mail\TestEmail(request()->ctn_mail_subject,request()->ctn_mail_content,request()->allFiles()));

        foreach (request()->allFiles()['ctn_mail_files'] as $key =>  $file) {

            unlink(storage_path('app\public\files\\' . $file->getClientOriginalName()));

        }

        return redirect()->back();
    }

}
