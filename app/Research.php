<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $fillable = [
        'company_name', 'sector', 'type', 'document',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
