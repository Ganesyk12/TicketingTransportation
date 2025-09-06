<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'IdTransactions';
    public $timestamps = false;
    protected $fillable = [
        'CustomerName',
        'CustomerAge',
        'TicketQty',
        'IdTicketClass',
        'IdDestination',
        'DepartureDate',
        'UserCreated',
        'DateCreated',
        'UserModified',
        'DateModified',
        'Status'
    ];

    public function ticketClass()
    {
        return $this->belongsTo(TicketClass::class, 'IdTicketClass');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'IdDestination');
    }
}
