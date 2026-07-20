<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallet'; // important (Laravel usually expects "wallets")

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'transaction_date',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
