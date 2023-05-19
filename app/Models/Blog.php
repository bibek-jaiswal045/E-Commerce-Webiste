<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'written_by', 'image', 'description'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
