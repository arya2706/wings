<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table='transaction_headers';
    protected $fillable=[
        'document_code',
        'document_number',
        'user',
        'total',
        'date',
        'status',
    ];
    protected $hidden=[];
    protected $primaryKey='id';
}
