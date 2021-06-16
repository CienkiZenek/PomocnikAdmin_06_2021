<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Memy extends Model
{
    use HasFactory;
    protected $table = 'memy';
    protected $fillable =['tytul', 'podpis', 'mem', 'dodal_user', 'status'];
    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function getUrlmemAttribute(){
        return Storage::url($this->mem);}
    public function setTytulAttribute($value){
        $this->attributes['tytul']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
}
