<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'cpf',
        'cep',
        'address',
        'neighborhood',
        'city',
        'uf',
        'company_id'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
