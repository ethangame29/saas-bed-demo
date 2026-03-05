<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function fullname()
    {
        $given = $this->given_name ?? '';
        $family = $this->family_name ?? '';
        $fullname = Str::trim($given.' '.$family);
        return $fullname;
    }
}
