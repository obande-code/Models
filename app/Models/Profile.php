<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'description',
        'facebook',
        'instagram',
        'subscriptionfee',
    ];
}