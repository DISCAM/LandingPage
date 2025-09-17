<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{

    protected $fillable = [
        'first_name',
        'last_name' ,
        'company',
        'business_email',
        'phone_number',
        'industry_id',
        'company_size',
        'comments',
    ];

    protected $hidden = [
        'created_updated'
    ];

    public function industry() : BelongsTo
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

}
