<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'activities';

    protected $fillable = [
        'description',
        'status'
    ];
}
