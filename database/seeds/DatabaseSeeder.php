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

        DB::table('purchases')->insert([
            'ac_code' => Str::random(10),
            'farmer_code' => Str::random(10),
            'tiam' => Str::random(10),
            'bruto' => 10000,
            'netto' => 10000,
            'price' => 10000,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
