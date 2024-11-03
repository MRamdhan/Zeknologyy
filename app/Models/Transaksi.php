<?php

namespace App\Models;

use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function detailtransaksi()
    {
        return $this->hasMany(DetailedReason::class,);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
