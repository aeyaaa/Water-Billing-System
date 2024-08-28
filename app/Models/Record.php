<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['name', 'present', 'previous', 'cu_m',
                            'current','arrears','total','payment_current',
                            'payment_remarks','date_paid','or_number',
                            'bal','month_id'];
    public function month()
    {
        return $this->belongsTo(Month::class);
    }
}
