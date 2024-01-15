<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LemburModels extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'permohonan_lembur';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'awal_lembut',
        'akhir_lembur',
        'jumlah_lembur',
        'description',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
