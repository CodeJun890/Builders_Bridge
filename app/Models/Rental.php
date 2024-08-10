<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_owner',
        'rental_item_name',
        'rental_status',
        'rental_description',
        'tags',
        'rent_price',
        'rent_image_one',
        'rent_image_two',
        'rent_image_three',
    ];

    public function ownerRental(){
        return $this->belongsTo(User::class, 'rental_owner');
    }

    public function savedLists(){
        return $this->hasMany(SavedList::class);
    }
}
