<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 20; $i++){

    		DB::table('Barang')->insert([
    			'kategori_id' => '1',
    			'ormawa_id' => '1',
    			'nm_barang' => $faker->nm_barang,
    			'qty' => $faker->number,
    			'foto' => $faker->foto,
    			'status' => '1'
    		]);
 
    	}
    }
}
