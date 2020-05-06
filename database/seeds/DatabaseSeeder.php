<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('sales')->insert([
            'warehouse_code' => Str::random(10),
            'needle_code' => Str::random(10),
            'tiam' => Str::random(10),
            'bruto' => 10000,
            'netto' => 10000,
            'price' => 10000,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        DB::table('farmers')->insert([
            'farmer_code' => Str::random(10),
            'farmer_code' => Str::random(10),
            'name' => Str::random(10),
            'area' => Str::random(10),
            'address' => Str::random(10),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $farmer = DB::table('farmers')->first();

        DB::table('purchases')->insert([
            'ac_code' => Str::random(10),
            'farmer_code' => $farmer->farmer_code,
            'tiam' => Str::random(10),
            'bruto' => 10000,
            'netto' => 10000,
            'price' => 10000,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
