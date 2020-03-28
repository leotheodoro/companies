<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'website', 'image'];

    public function employees() {
        return $this->hasMany(Employee::class);
    }
}
