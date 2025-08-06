<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BinnacleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Alimentación',
            'Deposición',
            'Sueño',
            'Medicación',
            'Baño',
        ];

        foreach ($types as $type) {
            \App\Models\BinnacleType::updateOrCreate(['name' => $type]);
        }
    }
}
