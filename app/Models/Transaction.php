<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'impokan_id',
        'amount',
        'note',
        'recorded_by'
    ];

    public function impokan()
    {
        return $this->belongsTo(Impokan::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }
}
