<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'enddate'
    ];


    public function Offers()
    {
        return $this->belongsToMany(Offer::class, 'title');
    }
}

