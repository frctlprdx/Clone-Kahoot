<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuestionsTableForJsonOptions extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            // Hapus kolom opsi lama
            $table->dropColumn(['option_a', 'option_b', 'option_c', 'option_d']);
            
            // Tambahkan kolom 'options' dengan tipe JSON
            $table->json('options')->nullable();
        });
    }

    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            // Tambahkan kembali kolom opsi lama
            $table->string('option_a')->default('');
            $table->string('option_b')->default('');
            $table->string('option_c')->default('');
            $table->string('option_d')->default('');

            // Hapus kolom 'options'
            $table->dropColumn('options');
        });
    }
}