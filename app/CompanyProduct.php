<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\CompanyProduct
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyProduct extends Model
{
    protected $table = 'company_products';

    protected $fillable = [
        'name',
        'price',
        'company_id'
    ];

    protected $casts = [
        'name' => 'string',
        'price' => 'float',
        'company_id' => 'integer'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
