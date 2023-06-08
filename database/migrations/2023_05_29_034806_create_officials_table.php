<?php

use App\Models\Club;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Club::class)->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('position');
            $table->enum('licence', ['A', 'B', 'C', 'D', 'non']);
            $table->string('photo')->nullable();
            $table->string('licence_photo')->nullable();
            $table->string('social_media');
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->string('phone');
            $table->string('email');
            $table->string('zone')->default('madiun');
            $table->enum('status', ['terima', 'proses', 'tolak']);
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
        Schema::dropIfExists('officials');
    }
}
