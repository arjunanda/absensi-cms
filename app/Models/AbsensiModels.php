<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AbsensiModels extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'absensi';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'tanggal_checkin',
        'image_checkin',
        'image_checkout',
        'check_in',
        'check_out',
        'checkin_location',
        'checkout_location',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
