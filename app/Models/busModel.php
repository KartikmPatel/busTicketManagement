<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class busModel extends Model
{
    use HasFactory;
    protected $table = "buses";
    protected $primaryKey = "busNo";
    public $incrementing = false;
}
