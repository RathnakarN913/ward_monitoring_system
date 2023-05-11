<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{CitizenSubServiceMst,CitizenServiceMst,DocumentMst};

class SubServiceDocumentMap extends Model
{
    use HasFactory;

    protected $table = "sub_service_document_map";

    protected $fillable = ['service_id','sub_service_id','document_id','status','created_by','updated_by'];


    public function service(){

        return $this->belongsTo(CitizenServiceMst::class,'service_id', 'service_id');
    }

    public function sub_service(){

        return $this->belongsTo(CitizenSubServiceMst::class,'sub_service_id', 'sub_service_id');
    }

    public function document(){

        return $this->belongsTo(DocumentMst::class,'document_id', 'document_id');
    }
}
