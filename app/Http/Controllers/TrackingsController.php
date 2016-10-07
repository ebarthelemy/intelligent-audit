<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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
        $from = $request->from;
        $to = $request->to;

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

        return $trackings;
    }
}
