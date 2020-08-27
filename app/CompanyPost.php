<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\CompanyPost
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPost whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyPost extends Model
{
    protected $table = 'company_posts';

    protected $fillable = [
        'title',
        'content',
        'company_id'
    ];

    protected $casts = [
        'title' => 'string',
        'content' => 'string',
        'company_id' => 'integer'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
