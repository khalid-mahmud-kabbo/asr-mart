<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'offerbanner',
        'enddate',
        'offerstatus',
        'categorylink',
    ];


    public function Offers()
    {
        return $this->belongsToMany(Offer::class, 'title');
    }
}

