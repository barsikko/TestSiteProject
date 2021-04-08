<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    use HasFactory;

    protected $table = 'guestbook';

    protected $fillable = [
    	'name', 'phone', 'birth_date'
    ];

    public function setBirthDateAttribute($value)
    {
    	$this->attributes['birth_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function getBirthDateAttribute($value)
    {
    	return Carbon::createFromFormat('Y-m-d', $this->attributes['birth_date'])->format('m/d/Y');
    }
}
