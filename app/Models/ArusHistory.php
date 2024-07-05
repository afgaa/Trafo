<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArusHistory extends Model
{
    use HasFactory;
    protected $table='arus_histories';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'trafo_name',
        'topic_name_r',
        'topic_name_s',
        'topic_name_t',
        'value_r',
        'value_s',
        'value_t',
    ];
}
