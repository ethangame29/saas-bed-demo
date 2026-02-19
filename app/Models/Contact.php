<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    protected $fillable = [
        'given_name',
        'family_name',
        'nickname',
        'title'
    ];
    protected $hidden = [];

    protected function casts(): array
    {
        return [
        ];
    }
}
