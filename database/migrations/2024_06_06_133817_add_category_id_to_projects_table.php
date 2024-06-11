<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //crea la colonna 
            //dopo il campo id (facoltativo)
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            //crea la foreign key e la collega con la tabella di riferimento 
            //specifica come si deve comportare in caso di cancellazione o se non trova nulla
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //aggiunge una colonna nella tabella progetti
            $table->dropForeign('projects_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
};
