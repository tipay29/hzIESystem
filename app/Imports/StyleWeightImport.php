<?php

namespace App\Imports;

use App\Models\Size;
use App\Models\Style;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use mysql_xdevapi\Exception;

class StyleWeightImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        $this->changeWeight($collection);
    }

    protected function changeWeight($collection){
        foreach($collection as $collect){

            $style = Style::where('style_code',$collect['basis'])->first();
            $size = Size::where('size',$collect['size'])->first();


            if($style == null){

                $style = Style::create([
                    'style_code' => $collect['basis'],
                ]);
                try{
                    $size->styles()->attach([$style->id => [
                        'weight' => $collect['weight'],
                    ]]);
                }catch(\Exception $e){
                    dd("Size doesn't exist!!!");
                }
            }else{
                $size->styles()->sync([$style->id => [
                    'weight' => $collect['weight'],
                ]]);
//                $size->styles()->attach([$style->id => [
//                    'weight' => $weight,
//                    'carton_id' => $carton_id,
//                    'mcq' => $mcq,
//                    'size_style_carton_id' => $size_style_carton_id,
//                ]]);
//                $datas = DB::table('sizeables')->where([
//                    ['size_id',$size_id],
//                    ['sizeable_id',$style_id],
//                    ])->get();
//
//
//                foreach($datas as $data){
//                    $dataOne =  DB::table('sizeables')->where('id',$data->id)
//                        ->update(['weight' => $collect['weight']]);
//                }
            }

        }
        return  0;
    }

    public function headingRow(): int
    {
        return 2;
    }
}
