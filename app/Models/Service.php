<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_owner',
        'service_title',
        'service_status',
        'service_description',
        'category',
        'service_price',
        'service_image_one',
        'service_image_two',
        'service_image_three',
    ];

    public function ownerService(){
        return $this->belongsTo(User::class, 'service_owner');
    }

    public function savedLists(){
        return $this->hasMany(SavedList::class);
    }
}
