<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingModel extends Model
{
    use HasFactory;
    protected $table = "bookingtb";
    protected $primaryKey = "ticketID";
}
