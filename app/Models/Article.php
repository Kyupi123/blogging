<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'body',
        'published_at',
        'views',
    ];

    protected $append = [
        'image_url',
    ];

    public function getImageUrlAttribute()
    {
        if(filter_var($this->image, FILTER_VALIDATE_URL)){
            return $this->image;
        }
        return $this->image ? Storage::url($this->image) : null;
    }
}
