<?php

use Illuminate\Database\Seeder;

class InvoiceChargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507266',
          'charge_type' => 'FRT',
          'charge_amount' => 40
      ]);

      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507266',
          'charge_type' => 'FUE',
          'charge_amount' => 11
      ]);

      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507267',
          'charge_type' => 'FRT',
          'charge_amount' => 65
      ]);

      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507267',
          'charge_type' => 'FUE',
          'charge_amount' => 17
      ]);

      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507268',
          'charge_type' => 'FRT',
          'charge_amount' => 10
      ]);

      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507268',
          'charge_type' => 'FUE',
          'charge_amount' => 5
      ]);

      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507268',
          'charge_type' => 'HAZ',
          'charge_amount' => 5.5
      ]);

      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551199',
          'tracking_no' => '1Z2F12346861503423',
          'charge_type' => 'FRT',
          'charge_amount' => 8
      ]);

      DB::table('invoice_charges')->insert([
          'invoice_num' => '00551199',
          'tracking_no' => '1Z2F12346861503423',
          'charge_type' => 'FUE',
          'charge_amount' => 2.5
      ]);
    }
}
