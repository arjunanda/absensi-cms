<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AbsensiModels extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'jabatan';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'image',
        'check_in',
        'check_out',
        'checkin_location',
        'checkout_location',
        'status'
    ];
}
