<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // jika nama tabel berbeda dengan nama model,
    // maka buat property $table
    protected $table = 'courses';

    // untuk proses mass assigment harus ditambahkan guard / fillable
    protected $guarded = [];
}
