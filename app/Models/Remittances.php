<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remittances extends Model
{
    use HasFactory;


    public function sending(){
        return $this->belongsTo(Officar::class,'sending_Office');
    }

    public function Future(){
        return $this->belongsTo(Officar::class,'Future_Office');
    }
}
