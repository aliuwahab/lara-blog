<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('body')->nullable();
            $table->bigInteger('commentable_id'); // Polymorphic: Referencing either a post in the post table or a comment in this same comment table
            $table->string('commentable_type'); // // Polymorphic: This will indicate wether the commentable_id is referencing App\Post or App\Comment
            $table->foreignId('created_by')->references('id')->on('users');
            $table->timestamp('approved_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
