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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            /* adding a foreign key for the user id */
            /* foreignIdFor: This method automatically creates a foreign key column that references the id column 
            on another table.  */
            /* \App\Models\User::class: This is the fully qualified class name of the model that the foreign key 
            references. In this case, it references the User model located in the App\Models namespace. */
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
