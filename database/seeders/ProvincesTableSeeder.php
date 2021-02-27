<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Province;
use DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

             $provinces = [
                 ['id' => 1, 'cod' => 'MIGR', 'name' => 'MIGRADO'],
                 ['id' => 2, 'cod' => 'CABA', 'name' => 'CIUDAD AUTÓNOMA DE BUENOS AIRES'],
                 ['id' => 6, 'cod' => 'BA', 'name' => 'BUENOS AIRES'],
                 ['id' => 10, 'cod' => 'CT', 'name' => 'CATAMARCA'],
                 ['id' => 14, 'cod' => 'CBA', 'name' => 'CÓRDOBA'],
                 ['id' => 22, 'cod' => 'CC', 'name' => 'CHACO'],
                 ['id' => 26, 'cod' => 'CH', 'name' => 'CHUBUT'],
                 ['id' => 18, 'cod' => 'CR', 'name' => 'CORRIENTES'],
                 ['id' => 30, 'cod' => 'ER', 'name' => 'ENTRE RÍOS'],
                 ['id' => 34, 'cod' => 'FO', 'name' => 'FORMOSA'],
                 ['id' => 38, 'cod' => 'JY', 'name' => 'JUJUY'],
                 ['id' => 42, 'cod' => 'LP', 'name' => 'LA PAMPA'],
                 ['id' => 46, 'cod' => 'LR', 'name' => 'LA RIOJA'],
                 ['id' => 50, 'cod' => 'MZ', 'name' => 'MENDOZA'],
                 ['id' => 54, 'cod' => 'MN', 'name' => 'MISIONES'],
                 ['id' => 58, 'cod' => 'NQ', 'name' => 'NEUQUÉN'],
                 ['id' => 62, 'cod' => 'RN', 'name' => 'RÍO NEGRO'],
                 ['id' => 66, 'cod' => 'SA', 'name' => 'SALTA'],
                 ['id' => 70, 'cod' => 'SJ', 'name' => 'SAN JUAN'],
                 ['id' => 74, 'cod' => 'SL', 'name' => 'SAN LUIS'],
                 ['id' => 78, 'cod' => 'SC', 'name' => 'SANTA CRUZ'],
                 ['id' => 82, 'cod' => 'SF', 'name' => 'SANTA FE'],
                 ['id' => 86, 'cod' => 'SE', 'name' => 'SANTIAGO DEL ESTERO'],
                 ['id' => 90, 'cod' => 'TM', 'name' => 'TUCUMÁN'],
                 ['id' => 94, 'cod' => 'TF', 'name' => 'TIERRA DEL FUEGO'],
             ];
             foreach($provinces as $province) {
                 Province::create($province);
             }
    }
}
