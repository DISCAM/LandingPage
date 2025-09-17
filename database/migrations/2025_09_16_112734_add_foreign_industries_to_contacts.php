<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * czyli klucz obcy który leci z tablei contacts z kolumny industry_id do tabeli on industry na id
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('industry');
            /*$table->unsignedBigInteger('industry')->nullable()->change();*/
            $table->unsignedBigInteger('industry_id')->nullable()->after('phone_number');
            $table->foreign('industry_id')
                ->references('id')
                ->on('industries')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['industry_id']);
            $table->dropColumn('industry_id');
            $table->string('industry', 255)->nullable();
        });
    }
};
