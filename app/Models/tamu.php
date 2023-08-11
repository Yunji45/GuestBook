<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tamu extends Model
{
    use HasFactory;

    protected $table = 'tamus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',    
        'photo'    
    ];

    public function event()
    {
        return $this->belongsTo(event::class);
    }
}
