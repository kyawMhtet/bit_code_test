<?php

namespace App\Models;

use App\Models\Publisher;
use App\Models\ContentOwner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tbl_book extends Model
{
    use HasFactory;

    protected $primaryKey = 'idx';

    protected $fillable = [
        'co_id',
        'publisher_id',
        'book_uniq_idx',
        'bookname',
        'cover_photo',
        'prize',
        'created_timetick'
    ];

    public $timestamps = false;


    // relation with content_owner
    public function contentOwner()
    {
        return $this->belongsTo(ContentOwner::class, 'co_id', 'idx');
    }


    // relation with publisher
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'idx');
    }
}
