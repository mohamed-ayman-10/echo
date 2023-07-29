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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->text('logo');
            $table->text('favicon');
            $table->timestamps();
        });

        \App\Models\Setting::query()->create([
            'title' => 'ECHO +',
            'email' => 'echo.plus@gmail.com',
            'phone' => '01021811237',
            'whatsapp' => '01021811237',
            'logo' => 'images/settings/yJ7GKy5eLaoAbMDa2YlNEu6IT6Khjznbk2m3nJj1.png',
            'favicon' => 'images/settings/yJ7GKy5eLaoAbMDa2YlNEu6IT6Khjznbk2m3nJj1.png',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
