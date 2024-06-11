<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GPS;

class Arus extends Model
{
    use HasFactory;
    protected $table='arus';
    protected $primaryKey = 'id';

    protected $fillable = [
        'trafo_id',
        // 'arus',
        'topic_name',
        'value'
    ];
    // public function gps()
    // {
    //     return $this->belongsTo(GPS::class, 'trafo_id');
    // }

    // make relation to trafo
    public function trafo()
    {
        return $this->belongsTo(Trafo::class, 'trafo_id');
    }
}
