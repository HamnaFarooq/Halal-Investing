<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_id', 'company_name', 'sector', 'expected_by', 'comments',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
