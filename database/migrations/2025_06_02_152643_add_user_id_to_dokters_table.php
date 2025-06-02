<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToDoktersTable extends Migration
{
    public function up()
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('alamat')->default('Alamat tidak tersedia')->change();
        });
    }

    public function down()
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->string('alamat')->default(null)->change();
        });
    }
}