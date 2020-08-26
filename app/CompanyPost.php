<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
