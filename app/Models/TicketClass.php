<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketClass extends Model
{
    protected $primaryKey = 'IdTicketClass';
    public $timestamps = false;
    protected $fillable = [
        'ClassName',
        'TicketPrice',
        'UserCreated',
        'DateCreated',
        'UserModified',
        'DateModified',
        'Status',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'IdTicketClass');
    }
}
