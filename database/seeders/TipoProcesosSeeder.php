<?php

namespace Database\Seeders;

use App\Models\TipoProceso;
use Illuminate\Database\Seeder;

class TipoProcesosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(): void
  {
    TipoProceso::truncate();
    $csvData = fopen(base_path('database/csv/tipo_procesos.csv'), 'r');
    $transRow = true;
    while (($data = fgetcsv($csvData, 555, ',')) !== false) {
      if (!$transRow) {
        TipoProceso::create([
          'id' => $data['0'],
          'nombre' => $data['1'],
        ]);
      }
      $transRow = false;
    }
    fclose($csvData);
  }
}
