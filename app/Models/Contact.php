<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $company
 * @property string $business_email
 * @property string|null $phone_number
 * @property int|null $industry_id
 * @property string|null $company_size
 * @property string|null $comments
 * @property string $created_updated
 * @property-read \App\Models\Industry|null $industry
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereBusinessEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCompanySize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCreatedUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact wherePhoneNumber($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{

   // public $timestamps = false;
    public $timestamps = true;

    // jedna kolumna dla obu “znaczników czasu”
    const CREATED_AT = 'created_updated';
    const UPDATED_AT = 'created_updated';

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
