<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InvoiceHeader extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'invoice_headers';

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = false;

   /**
    * Get the invoice header date.
    *
    * @param  string  $value
    * @return string
    */
   public function getInvoiceDateAttribute($value)
   {
       return Carbon::createFromFormat('Y-m-d', $value)->format('n/j/Y');
   }

   /**
    * Set the invoice header date.
    *
    * @param  string  $value
    * @return void
    */
   public function setInvoiceDateAttribute($value)
   {
       $this->attributes['invoice_date'] = Carbon::createFromFormat('n/j/Y', $value)->format('Y-m-d');
   }
}
