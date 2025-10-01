<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function komentars() {
    return $this->hasMany(Komentar::class);
}
public function submissions()
{
    return $this->hasMany(Submission::class);
}

}
