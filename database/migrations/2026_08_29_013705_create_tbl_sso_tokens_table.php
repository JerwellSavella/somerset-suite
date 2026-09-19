<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_sso_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token', 100)->unique();
            $table->unsignedBigInteger('publisher_id');
            $table->string('sys_code', 20);
            $table->timestamp('expires_at');
            $table->boolean('used')->default(0);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_sso_tokens');
    }
};
