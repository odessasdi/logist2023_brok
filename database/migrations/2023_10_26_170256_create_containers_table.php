<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('containerNumber', 11)->unique();
            $table->string('containerGoods', 30)->nullable();
            $table->string('containerWeight', 5)->nullable();
            $table->string('line_id', 10);
            $table->string('port_id', 10);
            $table->string('status_id', 1);
            $table->string('client_id', 10)->nullable();
            $table->string('expeditor_id', 10)->nullable();
            $table->string('destination', 20)->nullable();
            $table->date('dateStart');
            $table->date('datePort')->nullable();
            $table->date('dateStorage')->nullable();
            $table->date('dateUkraine')->nullable();
            $table->date('dateOver')->nullable();
            $table->date('dateEnd')->nullable();
            $table->text('note1')->nullable();
            $table->text('note2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('containers');
    }
};
