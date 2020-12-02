<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'company_name', 'sector', 'action', 'share_price',
    ];

}
