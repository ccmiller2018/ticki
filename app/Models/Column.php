<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ColumnFactory;

class Column extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'order',
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function newFactory(): ColumnFactory
    {
        return new ColumnFactory();
    }
}
