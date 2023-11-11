<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    //Jika ingin penamaan custom (2.)
    //protected $primary = false;
    //Jika ingin mengubah timestamps (2.)
    //protected $timestamps = false;
    protected $fillable = [
        'user_id',
        'about_me',
        'address',
        'website',
        'instagram',
    ];
}
