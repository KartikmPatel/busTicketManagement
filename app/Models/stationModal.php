<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stationModal extends Model
{
    use HasFactory;
    protected $table = "stations";
    protected $primaryKey = "stationID";
    public $incrementing = false;
}
