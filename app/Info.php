<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Info extends Model
{
    use HasFactory;
    protected $table = 'info';
    protected $fillable =['tytul', 'naglowek', 'tresc', 'rodzaj', 'dodal_user', 'link'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function setTytulAttribute($value){
        $this->attributes['tytul']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
}
