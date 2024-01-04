<?php

namespace App\Models;

use App\Models\Tbl_book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentOwner extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // relation with books
    public function tblBook()
    {
        return $this->hasMany(Tbl_book::class, 'co_id', 'idx');
    }
}
