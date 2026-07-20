<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenTransactionDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
    ];
}
