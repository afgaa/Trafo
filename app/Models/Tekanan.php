<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GPS;


class Tekanan extends Model
{
    use HasFactory;
    protected $table='tekanan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'trafo_id',
        // 'tekanan',
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
