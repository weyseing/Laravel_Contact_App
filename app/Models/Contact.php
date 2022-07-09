<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];

    // one to many DB relationship
    public function company() {
        return $this->belongsTo(Company::class);
    }

    // (Eloquent Local scope) order by id through descending order
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }

    // (Eloquent Local scope) filter query
    public function scopeFilter($query)
    {
        // if got COMPANY ID in url parameter, get based on company ID from url parameter
        if ($companyId = request('company_id')) {                                                           
            $query->where('company_id', $companyId);
        }

        // if got SEARCH keyword in url parameter, get based contact based on search keyword
        if ($search = request('search')) {
            $query->where('first_name', 'LIKE', "%{$search}%");
        }

        return $query;
    }
}
