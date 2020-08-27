<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
