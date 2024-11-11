<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContentIdToSearchHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('search_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('content_id')->nullable()->after('user_id'); // Menambahkan kolom content_id
        });
    }

    public function down()
    {
        Schema::table('search_histories', function (Blueprint $table) {
            $table->dropColumn('content_id');
        });
    }
}
