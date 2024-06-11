<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trafo extends Model
{
    use HasFactory;

    protected $table = 'trafo';
    protected $fillable = [
        'name',
    ];

    // make relation one to one to arus
    public function arus()
    {
        return $this->hasOne(Arus::class, 'trafo_id');
    }

    // make relation one to one to suhu
    public function suhu()
    {
        return $this->hasOne(Suhu::class, 'trafo_id');
    }

    // make relation one to one to tegangan
    public function tegangan()
    {
        return $this->hasOne(Tegangan::class, 'trafo_id');
    }

    // make relation one to one to tekanan
    public function tekanan()
    {
        return $this->hasOne(Tekanan::class, 'trafo_id');
    }
}
