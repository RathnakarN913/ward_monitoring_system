<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServiceDocumentMap extends Model
{
    use HasFactory;

    protected $table = "sub_service_document_map";

    protected $fillable = ['service_id','sub_service_id','document_id','status','created_by','updated_by'];
}
