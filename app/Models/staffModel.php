<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staffModel extends Model
{
    use HasFactory;
    protected $table = "staffs";
    protected $primaryKey = "staffID";
}
