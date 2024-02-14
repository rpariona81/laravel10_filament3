<?php

use App\Models\Menu;
use App\Models\Role;
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
        Schema::create('t_roles_menus', function (Blueprint $table) {
            $table->foreignIdFor(Role::class);
            $table->foreignIdFor(Menu::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_roles_menus');
    }
};
