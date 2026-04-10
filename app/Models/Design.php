<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Design extends Model
{
    protected $fillable = [
        'date',
        'description',
        'type',
        'order_by',
        'quantity',
        'more',
        'designer_id',
    ];

    public function designer()
    {
        return $this->belongsTo(User::class, 'designer_id');
    }
}
