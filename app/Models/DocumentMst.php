<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentMst extends Model
{
    use HasFactory;

    protected $table = "document_mst";
    protected $primaryKey = "document_id";

    protected $fillable = ['document_name','status','created_by','updated_by'];


}
