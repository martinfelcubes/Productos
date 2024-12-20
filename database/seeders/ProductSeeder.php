<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Producto = [

            ['name' => 'Madera',
                'desciption' => 'Producto utilizado para construiciion de muebles',
                'price' => 50.5,
                'stock' => 100,],
                ['name' => 'Metal',
                'desciption' => 'Producto utilizado para la creaciond e herramientas (Requiere forja)',
                'price' => 120,
                'stock' => 25,],
                ['name' => 'Piedra',
                'desciption' => 'Recurso utilizado para construccion de casas',
                'price' => 30,
                'stock' => 1000,],
                ['name' => 'Hilo',
                'desciption' => 'Producto utilizado para la creacionde prendas',
                'price' => 200,
                'stock' => 60,],
            ];
            DB::table('products')->insert($Producto);
        }
       
}
