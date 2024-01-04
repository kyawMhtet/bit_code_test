<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_books', function (Blueprint $table) {
            $table->id('idx');
            // $table->foreignId('co_id')->references('idx')->on('content_owners');
            // $table->foreignId('publisher_id')->references('idx')->on('publishers');
            $table->integer('co_id');
            $table->integer('publisher_id');
            $table->string('book_uniq_idx')->unique();
            $table->string('bookname');
            $table->string('cover_photo')->nullable();
            $table->timestamp('created_timetick')->default(DB::raw('current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_books');
    }
};
