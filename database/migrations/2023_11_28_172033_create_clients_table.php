<?php

use App\Models\Company;
use App\Models\TypeClient;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /** Clientes */
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->foreignIdFor(Company::class)->nullable()->constrained();
            $table->foreignIdFor(TypeClient::class)->constrained();
            $table->string('name', 100);
            $table->string('email', 200);
            $table->boolean('company')->default(false);
            $table->string('street', 200)->nullable();
            $table->string('neighborhood', 200)->nullable();
            $table->string('number_house',10)->nullable();
            $table->string('cpf',30)->nullable();
            $table->string('rg',30)->nullable();
            $table->string('cellphone',30)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
