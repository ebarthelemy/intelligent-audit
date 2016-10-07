<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Invoice;


class InvoicesController extends Controller
{
    /**
     * For specified time period print all invoices.
     *
     * @param Request $request
     * @return Response
     */
    public function printAll(Request $request)
    {
        // Input
        $this->validate($request, [
            'from' => 'date_format:n-j-Y',
            'to' => 'date_format:n-j-Y'
        ]);
        $from = $request->from;
        $to = $request->to;

        // Invoices
        $invoices = Invoice::whereBetween('invoice_date', [$from, $to])->get(); // Using the Query Builder

        return $invoices;
    }

    /**
     * For specified time period print all invoices where the invoice amount does not match the sum of all detail_amount column values for this invoice.
     *
     * @param Request $request
     * @return Response
     */
    public function printUnmatched(Request $request)
    {
        // Input
        $this->validate($request, [
            'from' => 'date_format:n-j-Y',
            'to' => 'date_format:n-j-Y'
        ]);
        $from = $request->from;
        $to = $request->to;

        // Invoices
        $invoices = DB::select('
          SELECT
            h.invoice_num,
            h.invoice_date,
            h.invoice_amount,
            SUM(d.detail_amount) AS detail_amount_total,
            (h.invoice_amount - SUM(d.detail_amount)) AS discrepancy_amount
          FROM invoice_headers AS h
          INNER JOIN invoice_details AS d
          ON h.invoice_num = d.invoice_num
          WHERE h.invoice_date BETWEEN ? AND ?
          GROUP BY d.invoice_num
          HAVING h.invoice_amount != detail_amount_total;
        ', [$from, $to]); // Using a Raw SQL Expression

        return $invoices;
    }
}
