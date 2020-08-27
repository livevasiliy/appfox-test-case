<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
