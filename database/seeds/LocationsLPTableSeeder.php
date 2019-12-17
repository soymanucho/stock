<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsLPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('locations')->delete();

        $cities= [
            ['province_id'=>6, 'name'=>'ESQUINA NEGRA', 'department'=>'LA PLATA', 'latitude'=>-35.038806066743, 'longitude'=>-58.0593061620077],
            ['province_id'=>6, 'name'=>'LA PROVIDENCIA', 'department'=>'LA PLATA', 'latitude'=>-35.0232476, 'longitude'=>-58.2307028],
            ['province_id'=>6, 'name'=>'POBLET', 'department'=>'LA PLATA', 'latitude'=>-35.0604581, 'longitude'=>-57.9547426],
            ['province_id'=>6, 'name'=>'COUNTRY CLUB EL RODEO', 'department'=>'LA PLATA', 'latitude'=>-35.0794688053886, 'longitude'=>-58.1393275732941],
            ['province_id'=>6, 'name'=>'IGNACIO CORREAS', 'department'=>'LA PLATA', 'latitude'=>-35.0345600341406, 'longitude'=>-57.8440249586726],
            ['province_id'=>6, 'name'=>'ABASTO', 'department'=>'LA PLATA', 'latitude'=>-35.0103681960184, 'longitude'=>-58.1151848585184],
            ['province_id'=>6, 'name'=>'ANGEL ETCHEVERRY', 'department'=>'LA PLATA', 'latitude'=>-35.0261580911328, 'longitude'=>-58.0959060056615],
            ['province_id'=>6, 'name'=>'ARANA', 'department'=>'LA PLATA', 'latitude'=>-35.0300556104917, 'longitude'=>-57.8865250010855],
            ['province_id'=>6, 'name'=>'ARTURO SEGUI', 'department'=>'LA PLATA', 'latitude'=>-34.8907397135389, 'longitude'=>-58.132711650613],
            ['province_id'=>6, 'name'=>'BARRIO EL CARMEN (OESTE)', 'department'=>'LA PLATA', 'latitude'=>-34.9707544223488, 'longitude'=>-57.8108950283044],
            ['province_id'=>6, 'name'=>'BARRIO GAMBIER', 'department'=>'LA PLATA', 'latitude'=>-34.9359594527479, 'longitude'=>-57.9837630521994],
            ['province_id'=>6, 'name'=>'BARRIO LAS MALVINAS', 'department'=>'LA PLATA', 'latitude'=>-34.9374880163466, 'longitude'=>-58.0093954169858],
            ['province_id'=>6, 'name'=>'BARRIO LAS QUINTAS', 'department'=>'LA PLATA', 'latitude'=>-34.9257210987549, 'longitude'=>-58.0393403036748],
            ['province_id'=>6, 'name'=>'CITY BELL', 'department'=>'LA PLATA', 'latitude'=>-34.8879382744371, 'longitude'=>-58.0582328038691],
            ['province_id'=>6, 'name'=>'EL RETIRO', 'department'=>'LA PLATA', 'latitude'=>-34.9476175562489, 'longitude'=>-57.9957432212034],
            ['province_id'=>6, 'name'=>'JOAQUIN GORINA', 'department'=>'LA PLATA', 'latitude'=>-34.9017817335757, 'longitude'=>-58.039185928571],
            ['province_id'=>6, 'name'=>'JOSE HERNANDEZ', 'department'=>'LA PLATA', 'latitude'=>-34.8985896635727, 'longitude'=>-58.0143972026636],
            ['province_id'=>6, 'name'=>'JOSE MELCHOR ROMERO', 'department'=>'LA PLATA', 'latitude'=>-34.9455092438623, 'longitude'=>-58.0362904746611],
            ['province_id'=>6, 'name'=>'LA CUMBRE', 'department'=>'LA PLATA', 'latitude'=>-34.9235917717359, 'longitude'=>-58.0019478733944],
            ['province_id'=>6, 'name'=>'LA PLATA', 'department'=>'LA PLATA', 'latitude'=>-34.920863104693, 'longitude'=>-57.9540560062469],
            ['province_id'=>6, 'name'=>'LISANDRO OLMOS', 'department'=>'LA PLATA', 'latitude'=>-34.9976086009747, 'longitude'=>-58.043377425691],
            ['province_id'=>6, 'name'=>'LOS HORNOS', 'department'=>'LA PLATA', 'latitude'=>-34.973715513981, 'longitude'=>-57.9850539062724],
            ['province_id'=>6, 'name'=>'MANUEL B. GONNET', 'department'=>'LA PLATA', 'latitude'=>-34.8819511933447, 'longitude'=>-58.0189915342036],
            ['province_id'=>6, 'name'=>'RINGUELET', 'department'=>'LA PLATA', 'latitude'=>-34.8910544941568, 'longitude'=>-57.9913781921596],
            ['province_id'=>6, 'name'=>'RUFINO DE ELIZALDE', 'department'=>'LA PLATA', 'latitude'=>-34.9710900774179, 'longitude'=>-57.9524351288235],
            ['province_id'=>6, 'name'=>'TOLOSA', 'department'=>'LA PLATA', 'latitude'=>-34.9007699307169, 'longitude'=>-57.9821293495972],
            ['province_id'=>6, 'name'=>'TRANSRADIO', 'department'=>'LA PLATA', 'latitude'=>-34.8790055541958, 'longitude'=>-58.081733864461],
            ['province_id'=>6, 'name'=>'VILLA ELISA', 'department'=>'LA PLATA', 'latitude'=>-34.8776205187118, 'longitude'=>-58.0907139194439],
            ['province_id'=>6, 'name'=>'VILLA ELVIRA', 'department'=>'LA PLATA', 'latitude'=>-34.9406437624757, 'longitude'=>-57.9214984675578],
            ['province_id'=>6, 'name'=>'VILLA GARIBALDI', 'department'=>'LA PLATA', 'latitude'=>-34.9986517196678, 'longitude'=>-57.8404966243711],
            ['province_id'=>6, 'name'=>'VILLA MONTORO', 'department'=>'LA PLATA', 'latitude'=>-34.9634490535296, 'longitude'=>-57.9025001308298],
            ['province_id'=>6, 'name'=>'VILLA PARQUE SICARDI', 'department'=>'LA PLATA', 'latitude'=>-34.9830288461923, 'longitude'=>-57.8674653074052],
            ['province_id'=>6, 'name'=>'LOMAS DE COPELLO', 'department'=>'LA PLATA', 'latitude'=>-34.9520385659845, 'longitude'=>-57.8409385980167],
            ['province_id'=>6, 'name'=>'BARRIO RUTA SOL', 'department'=>'LA PLATA', 'latitude'=>-34.9437333541431, 'longitude'=>-58.1732652389706],
	      ];

        foreach($cities as $city) {
            Location::create($city);
        }
    }

}
