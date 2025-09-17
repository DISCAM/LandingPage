<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'description',
        'industry_name'
    ];

    public function allContact()
    {
        return $this->hasMany(Contact::class, 'industry_id');
     }
}
