<?php

use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Zone::class)->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('address');
            $table->string('phone');
            $table->string('social_media')->nullable();
            $table->string('club_manager');
            $table->string('logo')->nullable();
            $table->string('surat_rekomendasi')->nullable();
            $table->string('surat_pendirian')->nullable();
            $table->string('surat_kepengurusan')->nullable();
            $table->string('susunan_pemain')->nullable();
            $table->string('surat_perpindahan')->nullable();
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
        Schema::dropIfExists('clubs');
    }
}
