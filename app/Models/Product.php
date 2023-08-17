<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entry;
class Product extends Model
{
    use HasFactory;
    // protected $table = 'entries';
    protected $guarded = [];
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
    public function sumOfType($type)
    {
        return $this->entries->where('type', $type)->sum('quantity');
    }

    public function sumOfIn()
    {
        return $this->sumOfType('In');
    }

    public function sumOfOut()
    {
        return $this->sumOfType('Out');
    }

}
