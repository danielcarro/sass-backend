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
        Schema::create('tenant_files', function (Blueprint $table) {
            $table->id(); // id auto-increment numérico para tenant_files
            $table->uuid('tenant_id'); // chave estrangeira UUID para tenant
            $table->string('type');
            $table->string('path');
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
        });


        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
