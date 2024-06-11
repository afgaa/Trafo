<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Arus;
use App\Models\Suhu;
use App\Models\Tegangan;
use App\Models\Tekanan;

class GPS extends Model
{
    use HasFactory;
    protected $table='gps';
    protected $primaryKey = 'id';

    protected $fillable = [
        'trafo',
        'latitude',
        'atitude',
    ];
    public function arus()
    {
        return $this->hasMany(Arus::class, 'id');
    }
    public function suhu()
    {
        return $this->hasMany(Suhu::class, 'id');
    }
    public function tegangan()
    {
        return $this->hasMany(Tegangan::class, 'id');
    }
    public function tekanan()
    {
        return $this->hasMany(Tekanan::class, 'id');
    }
}

