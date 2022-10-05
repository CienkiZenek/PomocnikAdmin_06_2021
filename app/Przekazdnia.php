<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Przekazdnia extends Model
{
    use HasFactory;

    protected $table = 'przekazdnia';
    protected $fillable =['tytul',
        'naglowek',
        'tresc',
        'link',
        'link_tresc',
        'ramka1',
        'ramka2',
        'status',
        'dodal_user',
        'dodal_user_nazwa'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function tagi(){
        return $this->belongsToMany(Tagi::class,'przekazdnia_tagi', 'przekazdnia_id','tagi_id');
    }
}
