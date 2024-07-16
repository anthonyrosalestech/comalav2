<?php

namespace Database\Seeders;

use App\Models\PadronCatastral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PadronCatastralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PadronCatastral::truncate();
        $csvData = fopen(base_path('database/csv/padron_catastral.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                PadronCatastral::create([
                    'id' => $data['0'],
                    'clave_catastral' => $data['1'],
                    'cum' => $data['2'],
                    'apellido_paterno' => $data['3'],
                    'apellido_materno' => $data['4'],
                    'nombre' => $data['5'],
                    'denominacion' => $data['6'],
                    'medida_frente' => $data['7'],
                    'medida_profundidad' => $data['8'],
                    'superficie_terreno' => $data['9'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
