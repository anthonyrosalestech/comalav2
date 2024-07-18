<?php

namespace Database\Seeders;

use App\Models\UsoSuelo;
use Illuminate\Database\Seeder;

class UsoSueloSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(): void
  {
    UsoSuelo::truncate();
    $csvData = fopen(base_path('database/csv/uso_suelo.csv'), 'r');
    $transRow = true;
    while (($data = fgetcsv($csvData, 555, ',')) !== false) {
      if (!$transRow) {
        UsoSuelo::create([
          'id' => $data['0'],
          'zona' => $data['1'],
          'nomenclatura' => $data['2'],
          'uso_suelo' => $data['3'],
          'cos' => $data['4'],
          'cus' => $data['5'],
        ]);
      }
      $transRow = false;
    }
    fclose($csvData);
  }
}
