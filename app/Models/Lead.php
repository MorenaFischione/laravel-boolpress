<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    // andrà a costituire la rappresentazione logica della tabella  lead
    protected $fillable = ['name', 'email_address', 'message'];
}
