<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'first_name',
        'last_name' ,
        'company',
        'business_email',
        'phone_number',
        'industry',
        'company_size',
        'comments',
    ];

    protected $hidden = [
        'created_updated'
    ];


}
