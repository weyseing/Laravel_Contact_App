<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['name', 'address', 'email', 'website'];

    // one to many DB relationship
    public function contacts() {
        return $this->hasMany(Contact::class);
    }
}
