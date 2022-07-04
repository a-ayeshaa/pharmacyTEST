<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=40; $i<50; $i++)
        {
            DB::table('medicine')->insert([
                'med_name' => 'Omidon'.$i,
                'price_perunit' =>rand(5,10),
                'manufacturingDate'=>date("Y/m/d"),
                'expiryDate'=>date("Y/m/d"),
                'vendor_id'=>$i,
                'vendor_name'=>'Khondu'.$i,
                'contract_id'=>rand(0,5)
            ]);
        }
    }
}
