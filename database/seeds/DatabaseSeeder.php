<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(InvoiceHeadersTableSeeder::class);
      $this->call(InvoiceDetailsTableSeeder::class);
      $this->call(InvoiceChargesTableSeeder::class);
    }
}
