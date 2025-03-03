<?php

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
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
        Schema::create('companies_roles_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->nullable()->default(null);
            $table->foreignIdFor(Role::class)->nullable()->default(null);
            $table->foreignIdFor(User::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
