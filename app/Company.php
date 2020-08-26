<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(CompanyPost::class);
    }

    public function products()
    {
        return $this->hasMany(CompanyProduct::class);
    }
}
