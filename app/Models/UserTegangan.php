<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTegangan extends Model
{
    use HasFactory;
    protected $table='tegangan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'trafo_id',
        'topic_name_r', 
        'topic_name_s', 
        'topic_name_t',
        'value_r',
        'value_s',
        'value_t',
    ];

    public function trafo()
    {
        return $this->belongsTo(Trafo::class, 'trafo_id');
    }
}
