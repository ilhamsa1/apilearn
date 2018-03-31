<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('bank_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_code');
            $table->string('number');
            $table->string('account');
            $table->string('bank_name');
            $table->timestamps();
        });

        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('bank_owner_id');
            $table->string('gender');
            $table->date('birth_date'); 
            $table->text('address');
            $table->string('phone');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bank_owner_id')->references('id')->on('bank_owners');
            $table->timestamps();
        });
        
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('job');
            $table->string('gender');
            $table->string('address');
            $table->text('photo_profil')->nullable;
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('cameras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id');
            $table->string('name');
            $table->string('brand');
            $table->string('produk_code')->nullable();
            $table->string('type');
            $table->double('price');
            $table->double('discount')->nullable();
            $table->longText('Description');
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->timestamps();
        });

        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_code');
            $table->string('number');
            $table->string('account');
            $table->string('bank_name');
            $table->timestamps();
        });


        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('camera_id');
            $table->unsignedInteger('bank_id');
            $table->date('transaction_date');
            $table->date('valid_date');
            $table->integer('days');
            $table->double('total');
            $table->text('transaction_picture');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('camera_id')->references('id')->on('cameras');
            $table->foreign('bank_id')->references('id')->on('banks');
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
        Schema::dropIfExists('admins');
        Schema::dropIfExists('owners');
        Schema::dropIfExists('members');
        Schema::dropIfExists('cameras');
        Schema::dropIfExists('banks');
        Schema::dropIfExists('bank_owners');
        Schema::dropIfExists('rentals');
    }
}
