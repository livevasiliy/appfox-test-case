<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Employee
 *
 * @property int $id
 * @property string $position
 * @property int $company_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Company|null $company
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUserId($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'position',
        'user_id',
        'company_id'
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
