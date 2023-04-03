<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->truncate();

        $roles = ['admin', 'general'];

        foreach ($roles as $role) {
            $model = new Role();
            $model->name = $role;
            $model->save();
        }

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->default(2)->constrained('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });

        DB::table('roles')->truncate();
    }
};
