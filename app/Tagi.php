<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Tagi extends Model
{
    use HasFactory;
    protected $table = 'tagi';
    protected $fillable =['nazwa', 'dodal_user'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function zagadnienia(){
        return $this->belongsToMany(Zagadnienia::class, 'zagadnienia_tagi', 'tagi_id','zagadnienia_id');
    }
    public function hasla(){
        return $this->belongsToMany(Zagadnienia::class, 'hasla_tagi', 'tagi_id','hasla_id');
    }
    public function setNazwaAttribute($value){
        $this->attributes['nazwa']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
}
