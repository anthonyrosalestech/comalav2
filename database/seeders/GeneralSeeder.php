<?php

namespace Database\Seeders;

use App\Models\General;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        General::truncate();
        $csvData = fopen(base_path('database/csv/generales.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 2000, ',')) !== false) {
            if (!$transRow) {
                General::create([
                    'id' => $data['0'],
                    'clave_catastral' => $data['1'],
                    'tipo_predio' => $data['2'],
                    'tarjeta' => $data['3'],
                    'folio_real' => $data['4'],
                    'fecha_alta' => $data['5'],
                    'ultimo_movimiento_catastral' => $data['6'],
                    'fecha_ultimo_movimiento_catastral' => $data['7'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
