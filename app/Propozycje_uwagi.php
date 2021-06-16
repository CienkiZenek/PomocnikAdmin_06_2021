<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propozycje_uwagi extends Model
{
    use HasFactory;

    protected $table = 'propozycje_uwagi';
    protected $fillable =['naglowek', 'tresc','status', 'propozycja_id', 'dodal_user', 'dodal_user_nazwa', 'historia_zmian'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}
}
