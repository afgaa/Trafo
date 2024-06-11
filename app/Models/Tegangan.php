<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GPS;


class Tegangan extends Model
{
    use HasFactory;
    protected $table='tegangan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'trafo_id',
        // 'tegangan',
        'topic_name',
        'value'
    ];
    // public function gps()
    // {
    //     return $this->belongsTo(GPS::class, 'trafo_id');
    // }

    public function trafo()
    {
        return $this->belongsTo(Trafo::class, 'trafo_id');
    }
}
