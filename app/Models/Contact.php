<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // one to many DB relationship
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
