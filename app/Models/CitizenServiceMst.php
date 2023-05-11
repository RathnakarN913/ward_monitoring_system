<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenServiceMst extends Model
{
    use HasFactory;

    protected $table = "citizen_service_mst";
    protected $primaryKey = "service_id";

    protected $fillable = ['service_name','status','created_by','updated_by'];
}
