<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('quotations', function(Blueprint $table) {
            $table->id();
            $table->string('age');
            $table->string('currency_id', 3);
            $table->date('start_date');
            $table->date('end_date');
            $table->float('total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotations');
    }
};
