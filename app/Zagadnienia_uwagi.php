<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zagadnienia_uwagi extends Model
{
    use HasFactory;

    protected $table = 'zagadnienia_uwagi';
    protected $fillable =['naglowek', 'tresc', 'do', 'status', 'zagadnienie_id', 'haslo_id', 'dodal_user', 'dodal_user_nazwa', 'historia_zmian'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}
}
