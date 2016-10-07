<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TrackingsController extends Controller
{
    /**
     * For specified time period print all trackings where the detail_amount does not match the sum of all charge_amount column values for this invoice and tracking_no.
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
        $from = Carbon::createFromFormat('n-j-Y', $request->from)->format('Y-m-d');
        $to = Carbon::createFromFormat('n-j-Y', $request->to)->format('Y-m-d');

        // Trackings
        $trackings = DB::select('
          SELECT
            h.invoice_num,
            h.invoice_date,
            d.tracking_no,
            d.detail_amount,
            SUM(c.charge_amount) AS charge_amount_total,
            (d.detail_amount - SUM(c.charge_amount)) AS discrepancy_amount
          FROM invoice_headers AS h
          INNER JOIN invoice_details AS d
          ON h.invoice_num = d.invoice_num
          INNER JOIN invoice_charges AS c
          ON d.tracking_no = c.tracking_no
          WHERE h.invoice_date BETWEEN ? AND ?
          GROUP BY c.tracking_no
          HAVING d.detail_amount != charge_amount_total;
        ', [$from, $to]); // Using a Raw SQL Expression

        // Response
        $response = [
            'reportNum' => 3,
            'dates' => ['from' => $from, 'to' => $to],
            'fields' => ['Invoice Num', 'Invoice Date', 'Tracking No', 'Detail Amount ($)', 'Charge Amount TOTAL ($)', 'Discrepancy Amount ($)'],
            'list' => $trackings
        ];

        return $response;
    }
}
