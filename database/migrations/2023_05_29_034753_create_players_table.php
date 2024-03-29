<?php

use App\Models\AgeGroup;
use App\Models\Club;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Club::class)->nullable();
            $table->foreignIdFor(AgeGroup::class)->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->string('nik')->unique();
            $table->string('nisn')->unique();
            $table->string('phone');
            $table->string('zone')->default('madiun');
            $table->text('address');
            $table->enum('position', ['kiper', 'anchor', 'flank', 'pivot']);
            $table->enum('status', ['terima', 'proses', 'tolak']);
            $table->string('photo')->nullable();
            $table->string('akte')->nullable();
            $table->string('kk')->nullable();
            $table->string('photo_nisn')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('players');
    }
}
