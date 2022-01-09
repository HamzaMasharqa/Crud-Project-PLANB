<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crudpost extends Model
{
    use HasFactory;
    public $table = 'crudposts';
    public $timestamp = false;
}
