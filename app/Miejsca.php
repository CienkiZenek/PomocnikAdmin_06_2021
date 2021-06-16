<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Miejsca extends Model
{
    use HasFactory;
    protected $table = 'miejsca';
    protected $fillable =['link', 'rodzaj', 'opis', 'status', 'dodal_user', 'dodal_user_nazwa', 'tytul', 'media_id'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function media(){
        return $this->belongsTo(Media::class, 'media_id', 'id');}
}
