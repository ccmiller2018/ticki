<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TicketFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'column',
        'description'
    ];

    public function columnEntity(): HasOne
    {
        return $this->hasOne(Column::class);
    }

    public static function newFactory(): TicketFactory
    {
        return new TicketFactory();
    }
}
