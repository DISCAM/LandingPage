<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $industry_name
 * @property string|null $description
 * @property int $id
 */

class Industry extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'description',
        'industry_name'
    ];

    public function allContact()
    {
        return $this->hasMany(Contact::class, 'industry_id');
     }
}
