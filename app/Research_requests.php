<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research_requests extends Model
{
    protected $fillable = [
        'user_id', 'company_name', 'sector', 'expected_by', 'comments', 'status', 'request'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
