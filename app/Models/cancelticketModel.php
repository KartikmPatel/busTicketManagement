<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancelticketModel extends Model
{
    use HasFactory;
    protected $table = "ticket_canceltb";
    protected $primaryKey = "cancelID";
}
