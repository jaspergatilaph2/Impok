<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'transaction_date',
        'note',
        'status',
        'total_amount',
        'interest',
        'paid_interest',
        'paid_principal',
        'remaining_interest'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
