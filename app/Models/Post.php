<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;
    public function users()
    {
        return $this->hasOne(User::class);
        
    }
}
