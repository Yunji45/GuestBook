<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey ='id';
    protected $fillable = [
        'name_event',
        'lokasi',
        'photo',
    ];

    public function tamu()
    {
        return $this->hasMany(Tamu::class);
    }
}
