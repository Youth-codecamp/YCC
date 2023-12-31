<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;
class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "embed_url",
        "description",
        "provider_id",
        "thumbnail_path",
        "tags",
    ];
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
