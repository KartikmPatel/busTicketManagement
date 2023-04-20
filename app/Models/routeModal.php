<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routeModal extends Model
{
    use HasFactory;
    protected $table = "routes";
    protected $primaryKey = "routeID";
}
