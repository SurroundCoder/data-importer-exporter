<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndUser extends Model
{
    use HasFactory;

    public $table        = 'enduser';
    public $timestamps   = false;

    protected $fillable = [
        'username',
        'password',
        'full_name',
        'phone',
        'email',
        'is_deleted',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];

    protected $hidden = [
        'password',
    ];
}
