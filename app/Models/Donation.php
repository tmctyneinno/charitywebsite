<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref', 'amount', 'is_public', 'prev_balance', 'total_amount', 'user_id', 'donation_category', 'donation_category_id', 'status', 'trans_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
