<?php

use Illuminate\Database\Seeder;

class InvoiceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('invoice_details')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507266',
          'detail_amount' => 50
      ]);

      DB::table('invoice_details')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507267',
          'detail_amount' => 80
      ]);

      DB::table('invoice_details')->insert([
          'invoice_num' => '00551198',
          'tracking_no' => '1Z2F12346861507268',
          'detail_amount' => 20.5
      ]);

      DB::table('invoice_details')->insert([
          'invoice_num' => '00551199',
          'tracking_no' => '1Z2F12346861503423',
          'detail_amount' => 10.5
      ]);
    }
}
