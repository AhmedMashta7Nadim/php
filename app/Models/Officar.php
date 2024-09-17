<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officar extends Model
{
    use HasFactory;
   
    public function remittanc_From(){
        return $this->hasMany(Remittances::class,'sending_Office');
    }
    public function remittanc_to(){
        return $this->hasMany(Remittances::class,'Future_Office');
    }
}
