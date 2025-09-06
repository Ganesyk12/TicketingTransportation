<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $primaryKey = 'IdDestination';
    public $timestamps = false;
    protected $fillable = ['DestinationName', 'UserCreated', 'DateCreated', 'UserModified', 'DateModified', 'Status'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'IdDestination');
    }
}
