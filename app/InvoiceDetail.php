<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
   protected $table = 'invoice_details';

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
   public $timestamps = false;
}
