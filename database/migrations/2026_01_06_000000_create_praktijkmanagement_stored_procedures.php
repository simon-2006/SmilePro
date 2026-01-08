<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $base = database_path('storeprocedures/praktijkmanagement');

        $files = [
            $base . '/Sp_GetUserById.sql',
            $base . '/SP_GetAllUserroles.sql',
        ];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $sql = file_get_contents($file);
                // Remove any USE or DELIMITER lines to be safe
                $sql = preg_replace('/^\s*USE\s+[^;]+;\s*/im', '', $sql);
                $sql = preg_replace('/DELIMITER\s+\S+/i', '', $sql);
                DB::unprepared($sql);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_GetUserById;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_GetAllUsersRoles;');
    }
};
