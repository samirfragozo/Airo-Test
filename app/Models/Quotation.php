<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    const FIXED_RATE = 3;
    protected $fillable = ['age', 'currency_id', 'end_date', 'start_date', 'total'];
}
