<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CitizenServiceMst;

class CitizenSubServiceMst extends Model
{
    use HasFactory;

    protected $table = "citizen_sub_service_mst";
    protected $primaryKey = "sub_service_id";

    protected $fillable = ['service_id','sub_service_name','status','created_by','updated_by'];



    public function service()
{
    return $this->belongsTo(CitizenServiceMst::class, 'service_id', 'service_id');
}

}
