<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->delete();

        $data = [
            [
                "title_en" => "Abarth",
                "title_ar" => "Abarth",
            ],
            [
                "title_en" => "Alfa Romeo",
                "title_ar" => "Alfa Romeo",
            ],
            [
                "title_en" => "Aston Martin",
                "title_ar" => "Aston Martin",
            ],
            [
                "title_en" => "Audi",
                "title_ar" => "Audi",
            ],
            [
                "title_en" => "Bentley",
                "title_ar" => "Bentley",
            ],
            [
                "title_en" => "BMW",
                "title_ar" => "BMW",
            ],
            [
                "title_en" => "Bugatti",
                "title_ar" => "Bugatti",
            ],
            [
                "title_en" => "Cadillac",
                "title_ar" => "Cadillac",
            ],
            [
                "title_en" => "Chevrolet",
                "title_ar" => "Chevrolet",
            ],
            [
                "title_en" => "Chrysler",
                "title_ar" => "Chrysler",
            ],
            [
                "title_en" => "Citroën",
                "title_ar" => "Citroën",
            ],
            [
                "title_en" => "Dacia",
                "title_ar" => "Dacia",
            ],
            [
                "title_en" => "Daewoo",
                "title_ar" => "Daewoo",
            ],
            [
                "title_en" => "Daihatsu",
                "title_ar" => "Daihatsu",
            ],
            [
                "title_en" => "Dodge",
                "title_ar" => "Dodge",
            ],
            [
                "title_en" => "Donkervoort",
                "title_ar" => "Donkervoort",
            ],
            [
                "title_en" => "DS",
                "title_ar" => "DS",
            ],
            [
                "title_en" => "Ferrari",
                "title_ar" => "Ferrari",
            ],
            [
                "title_en" => "Fiat",
                "title_ar" => "Fiat",
            ],
            [
                "title_en" => "Fisker",
                "title_ar" => "Fisker",
            ],
            [
                "title_en" => "Ford",
                "title_ar" => "Ford",
            ],
            [
                "title_en" => "Honda",
                "title_ar" => "Honda",
            ],
            [
                "title_en" => "Hummer",
                "title_ar" => "Hummer",
            ],
            [
                "title_en" => "Hyundai",
                "title_ar" => "Hyundai",
            ],
            [
                "title_en" => "Infiniti",
                "title_ar" => "Infiniti",
            ],
            [
                "title_en" => "Iveco",
                "title_ar" => "Iveco",
            ],
            [
                "title_en" => "Jaguar",
                "title_ar" => "Jaguar",
            ],
            [
                "title_en" => "Jeep",
                "title_ar" => "Jeep",
            ],
            [
                "title_en" => "Kia",
                "title_ar" => "Kia",
            ],
            [
                "title_en" => "KTM",
                "title_ar" => "KTM",
            ],
            [
                "title_en" => "Lada",
                "title_ar" => "Lada",
            ],
            [
                "title_en" => "Lamborghini",
                "title_ar" => "Lamborghini",
            ],
            [
                "title_en" => "Lancia",
                "title_ar" => "Lancia",
            ],
            [
                "title_en" => "Land Rover",
                "title_ar" => "Land Rover",
            ],
            [
                "title_en" => "Landwind",
                "title_ar" => "Landwind",
            ],
            [
                "title_en" => "Lexus",
                "title_ar" => "Lexus",
            ],
            [
                "title_en" => "Lotus",
                "title_ar" => "Lotus",
            ],
            [
                "title_en" => "Maserati",
                "title_ar" => "Maserati",
            ],
            [
                "title_en" => "Maybach",
                "title_ar" => "Maybach",
            ],
            [
                "title_en" => "Mazda",
                "title_ar" => "Mazda",
            ],
            [
                "title_en" => "McLaren",
                "title_ar" => "McLaren",
            ],
            [
                "title_en" => "Mercedes-Benz",
                "title_ar" => "Mercedes-Benz",
            ],
            [
                "title_en" => "MG",
                "title_ar" => "MG",
            ],
            [
                "title_en" => "Mini",
                "title_ar" => "Mini",
            ],
            [
                "title_en" => "Mitsubishi",
                "title_ar" => "Mitsubishi",
            ],
            [
                "title_en" => "Morgan",
                "title_ar" => "Morgan",
            ],
            [
                "title_en" => "Nissan",
                "title_ar" => "Nissan",
            ],
            [
                "title_en" => "Opel",
                "title_ar" => "Opel",
            ],
            [
                "title_en" => "Peugeot",
                "title_ar" => "Peugeot",
            ],
            [
                "title_en" => "Porsche",
                "title_ar" => "Porsche",
            ],
            [
                "title_en" => "Renault",
                "title_ar" => "Renault",
            ],
            [
                "title_en" => "Rolls-Royce",
                "title_ar" => "Rolls-Royce",
            ],
            [
                "title_en" => "Rover",
                "title_ar" => "Rover",
            ],
            [
                "title_en" => "Saab",
                "title_ar" => "Saab",
            ],
            [
                "title_en" => "Seat",
                "title_ar" => "Seat",
            ],
            [
                "title_en" => "Skoda",
                "title_ar" => "Skoda",
            ],
            [
                "title_en" => "Smart",
                "title_ar" => "Smart",
            ],
            [
                "title_en" => "SsangYong",
                "title_ar" => "SsangYong",
            ],
            [
                "title_en" => "Subaru",
                "title_ar" => "Subaru",
            ],
            [
                "title_en" => "Suzuki",
                "title_ar" => "Suzuki",
            ],
            [
                "title_en" => "Tesla",
                "title_ar" => "Tesla",
            ],
            [
                "title_en" => "Toyota",
                "title_ar" => "Toyota",
            ],
            [
                "title_en" => "Volkswagen",
                "title_ar" => "Volkswagen",
            ],
            [
                "title_en" => "Volvo",
                "title_ar" => "Volvo",
            ]
        ];


        foreach ($data as $item) {
            DB::table('brands')->insert($item);
        }
    }
}
