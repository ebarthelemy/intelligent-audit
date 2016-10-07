<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
   protected $table = 'invoice_charges';

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
   public $timestamps = false;
}
