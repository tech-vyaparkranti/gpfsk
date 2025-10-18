<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $table = 'recruitment';
    protected $fillable = [
        'application_no',
        'first_name',
        'fathers_name',
        'last_name',
        'mother_name',
        'dob',
        'gender',
        'nationality',
        'category',
        'aadhaar',
        'pan',
        'address',
        'city',
        'state',
        'district',
        'block',
        'panchayat',
        'pin_code',
        'email',
        'mobile',
        'whatsapp',
        'qualification',
        'board',
        'year',
        'percentage',
        'consent',
        'photo_path',
        'signature_path',
        'rzp_order_id',
        'rzp_payment_id',
        'rzp_signature',
        'payment_status',
    ];

    protected $casts = [
        'consent' => 'boolean',
        'dob' => 'date',
    ];
}