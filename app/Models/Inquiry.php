<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $table = 'Inquiry';
    protected $primaryKey = 'InquiryId';

    protected $fillable = ['CurrencyType', 'CurrencyValue'];

    protected $hidden = ['updated_at'];

    /**
     * Override update and creation timestamp columns.
     */
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
}
