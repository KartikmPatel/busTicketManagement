<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stationModel extends Model
{
    use HasFactory;
    protected $table = "stations";
    protected $primaryKey = "stationID";
    public $incrementing = false;
}
