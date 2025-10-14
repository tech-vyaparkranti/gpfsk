<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Application extends Model {
    protected $fillable = [
        'application_no','first_name','fathers_name','last_name','address','city','state','pin_code',
        'email','mobile','whatsapp','qualification','consent','photo_path','signature_path',
        'rzp_order_id','rzp_payment_id','rzp_signature','payment_status'
    ];
}