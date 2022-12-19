<?php


namespace App\Repositories;

use App\Models\Artery;
use App\Models\City;
use App\Models\Concelho;
use App\Models\Country;
use App\Models\County;
use App\Models\District;
use App\Models\Location;
use App\Models\Separate;
use App\Models\State;
use App\Models\Street;
use App\Models\ZipCode;
use Illuminate\Support\Facades\DB;

class DataImportRepository
{
    public function postalCode(array $file)
    {
        foreach ($file as $item) {
            ZipCode::create([
                'district_id' => District::where('code', $item[0])->first()->id,
                'concelho_id' => Concelho::where('code', $item[1])->first()->id,
                'location_id' => Location::create([
                    'district_id' => District::where('code',$item[0])->first()->id,
                    'code' => $item[2],
                    'name' => $item[3],
                ])->id,
                'artery_id' => Artery::create([
                    'code'  => $item[4],
                    'type'  => $item[5],
                    'title' => $item[6].' '.$item[7],
                    'name' => $item[8].''.$item[9],
                    'local' => $item[10],
                ])->id,
                'number' => $item[14],
                'extension' => $item[15],
                'designation' => $item[16]
            ]);
        }
    }

    public function locations(array $file)
    {
        foreach ($file as $item) {

            Location::create([
                'district_id' => District::where('code',$item[0])->first()->id,
                'code' => $item[1],
                'name' => $item[2]
            ]);
        }
    }

    public function districts(array $file)
    {
        foreach ($file as $item) {
            District::create([
                'code' => $item[0],
                'name' => $item[1]
            ]);
        }
    }

    public function concelhos(array $file)
    {
        foreach ($file as $item) {
            Concelho::create([
                'district_id' => District::where('code',$item[0])->first()->id,
                'code' => $item[1],
                'name' => $item[2]
            ]);
        }
    }
    // public function importSeparate(array $file)
    // {
    //     try {

    //         DB::beginTransaction();

    //         Separate::getQuery()->delete();

    //         foreach ($file as $item) {

    //             Separate::create([
    //                 'postal_establishment' => $item[0],
    //                 'initial_section' => $item[1],
    //                 'final_section' => $item[2],
    //                 'postal_code_number_block' => $item[3],
    //                 'postal_code_extension_block' => $item[4],
    //                 'block' => $item[5],
    //                 'postal_code_number_individual' => $item[6],
    //                 'postal_code_extension_individual' => $item[7],
    //                 'individual' => $item[8]
    //             ]);
    //         }
    //         DB::commit();
    //     } catch (\Exception $e) {

    //         dd($e);
    //         DB::rollBack();
    //     }
    // }
}
