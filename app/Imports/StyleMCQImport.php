<?php

namespace App\Imports;

use App\Models\Carton;
use App\Models\Size;
use App\Models\Style;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StyleMCQImport implements ToCollection, WithHeadingRow
{


    public function collection(Collection $collection)
    {
        foreach($collection as $collect) {

            $size = Size::where('size',$collect['size'])->first();
            $styles = Style::where('style_code', 'like', '%' . $collect['basis'] . '%')->get();
            $carton = Carton::where('ctn_size',$collect['carton'])->first();

            if($size !== null && $carton !== null){

                if($styles == null){
                    $style = Style::create([
                        'style_code' => $collect['basis'],
                    ]);
                    $styles = collect();
                    $styles->add($style);
                }

                foreach($styles as $style){

                        $size_style_carton_id = $size->id . $style->id . $carton->id;

                        $sizeable = DB::table('sizeables')->where([
                        ['size_id',$size->id],
                        ['sizeable_id',$style->id],
                        ])->first();

                        if($sizeable == null){
                            $sizeable = $size->styles()->attach([$style->id => [
                                    'weight' => 1,
                                    'carton_id' => $carton->id,
                                    'mcq' => $collect['mcq'],
                                    'size_style_carton_id' => $size_style_carton_id,
                                ]]);

                        }else{
                            if($sizeable->weight === null || $sizeable->weight === 0){
                                $weight = 1;
                            }else{
                                $weight = floatval($sizeable->weight);
                            }

//                            $size->styles()->sync([$style->id => [
//                                'weight' => $weight,
//                                'carton_id' => $carton->id,
//                                'mcq' => $collect['mcq'],
//                                'size_style_carton_id' => $size_style_carton_id,
//                            ]]);
                            $data = DB::table('sizeables')->where([
                                ['size_id',$size->id],
                                ['sizeable_id',$style->id],
                                ['carton_id',$carton->id],
                                ])->first();

                            $updatedMCQData =  DB::table('sizeables')->where('id',$data->id)
                        ->update(['weight' => $weight,'mcq' => $collect['mcq']]);

                        }


                }
            }

        }

        return 0;
    }

    public function headingRow(): int
    {
        return 2;
    }
}
