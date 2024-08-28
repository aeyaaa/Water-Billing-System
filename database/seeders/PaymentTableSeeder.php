<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment')->insert([
            [
                'name' => 'ABAD',
                'cu_m' => 0,
                'present' => 0,
                'previous' => 0,
                'current' => 0.00,
                'arrears' => 0.00,
                'total' => 0.00,
                'payment_current' => 0.00,
                'payment_remarks' => null,
                'date_paid' => now(),
                'or_number' => '',
                'bal' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abitan',
                'cu_m' => 0,
                'present' => 0,
                'previous' => 0,
                'current' => 0.00,
                'arrears' => 0.00,
                'total' => 0.00,
                'payment_current' => 0.00,
                'payment_remarks' => null,
                'date_paid' => now(),
                'or_number' => '',
                'bal' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ACOPIO',
                'cu_m' => 0,
                'present' => 0,
                'previous' => 0,
                'current' => 0.00,
                'arrears' => 0.00,
                'total' => 0.00,
                'payment_current' => 0.00,
                'payment_remarks' => null,
                'date_paid' => now(),
                'or_number' => '',
                'bal' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
