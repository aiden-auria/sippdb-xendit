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
        Schema::create('biodata_orang_tuas', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key field 'id'
            // $table->foreignId('calon_siswa_id')->constrained('calon_siswa')->onDelete('cascade');
            // The 'calon_siswa_id' is a foreign key referencing 'id' in the 'calon_siswa' table.
            // onDelete('cascade') ensures that when a 'calon_siswa' record is deleted, related 'biodata_orang_tuas' records are also deleted.

            $table->string('nama_ayah'); // Creates a string column for the father's name.
            $table->string('pekerjaan_ayah'); // Creates a string column for the father's occupation.
            $table->string('penghasilan_ayah'); // Creates a string column for the father's income.

            $table->string('nama_ibu'); // Creates a string column for the mother's name.
            $table->string('pekerjaan_ibu'); // Creates a string column for the mother's occupation.
            $table->string('penghasilan_ibu'); // Creates a string column for the mother's income.

            $table->string('no_telepon'); // Creates a string column for the phone number.

            $table->timestamps(); // Creates 'created_at' and 'updated_at' timestamp columns for tracking record creation and modification times.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_orang_tuas'); // Deletes the 'biodata_orang_tuas' table if you decide to rollback this migration.
    }
};
