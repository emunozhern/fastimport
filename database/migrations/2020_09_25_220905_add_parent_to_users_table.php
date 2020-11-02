<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable();
            
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('users');
            
            $table->unsignedBigInteger('upline_id')->nullable();
            $table->foreign('upline_id')->references('id')->on('users');
            
            $table->unsignedBigInteger('level')->nullable();
            $table->string('path')->nullable();
            $table->unsignedBigInteger('sameline')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['parent_id', 'upline_id']);
            $table->dropColumn(['username', 'parent_id', 'parent_id', 'level', 'path', 'sameline']);
        });
    }
}