<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'company_name', 'share_percentage', 'action', 'share_price', 'date',
    ];

}
