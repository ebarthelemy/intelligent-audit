<?php

use Illuminate\Database\Seeder;
use App\InvoiceHeader;

class InvoiceHeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoiceHeader1 = new InvoiceHeader([
            'invoice_num' => '00551198',
            'invoice_amount' => 150.5
        ]);
        $invoiceHeader1->invoice_date = '1/1/2014';
        $invoiceHeader1->save();

        $invoiceHeader2 = new InvoiceHeader([
            'invoice_num' => '00551199',
            'invoice_amount' => 10
        ]);
        $invoiceHeader2->invoice_date = '1/2/2014';
        $invoiceHeader2->save();
    }
}
