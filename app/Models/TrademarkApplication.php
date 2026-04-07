<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrademarkApplication extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'current_step',

        'trademark_type',
        'trademark_text',
        'logo_name',
        'logo_description',

        'first_name',
        'last_name',
        'email',
        'phone',
        'sms_consent',

        'plan_price',
        'addons_price',
        'priority_price',
        'subtotal',
        'plan',
        'addons',
        'priority',
        'total',
        'promo_code',
        'discount',
        'payment_status',
        'project_status',
        'paid_amount',
    ];

    protected $casts = [
        'addons' => 'array',
        'sms_consent' => 'boolean',
        'paid_amount' => 'decimal:2',
        'plan_price' => 'decimal:2',
        'addons_price' => 'decimal:2',
        'priority_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
