<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumberToShoppingcartTable extends Migration
{
    public function up()
    {
        Schema::table('shoppingcart', function (Blueprint $table) {
            $table->string('number')->nullable()->after('content');
        });
    }

    public function down()
    {
        Schema::table('shoppingcart', function (Blueprint $table) {
            $table->dropColumn('number');
        });
    }
}