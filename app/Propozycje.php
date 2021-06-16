<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Propozycje extends Model
{
    use HasFactory;
    protected $table = 'propozycje';
    protected $fillable =['tytul', 'tresc', 'status', 'dodal_user', 'dodal_user_nazwa'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}
}
