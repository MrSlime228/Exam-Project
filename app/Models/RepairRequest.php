<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address', 'repair_type', 'payment_method',
        'repair_datetime', 'status',
    ];

    protected $casts = [
        'repair_datetime' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRepairTypeLabelAttribute(): string
    {
        return match($this->repair_type) {
            'cosmetic'   => 'Косметический ремонт',
            'capital'    => 'Капитальный ремонт',
            'electrical' => 'Электромонтаж',
        };
    }

    public function getPaymentMethodLabelAttribute(): string
    {
        return match($this->payment_method) {
            'cash'          => 'Наличными',
            'card'          => 'Банковская карта',
            'bank_transfer' => 'Безналичный расчёт',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'new'         => 'Новая',
            'in_progress' => 'В процессе',
            'completed'   => 'Завершена',
            'cancelled'   => 'Отменена',
        };
    }
}