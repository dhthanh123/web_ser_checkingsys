<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_checking extends Model
{
    use HasFactory;
    protected $table = 'tbl_checking';
    protected $fillable = [
        'id_staff', 'date_check','temperature'
    ];
}
