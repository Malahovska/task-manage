<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Insert predefined roles and their associated permissions
        DB::table('roles')->insert([
            [
                'name' => 'Administrator',
                'description' => 'This role has full access to all application functions. Administrators can create and manage other users, tasks, and categories. They can also change the settings of the application.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Manager',
                'description' => 'This role has permissions to manage tasks and categories, but not users. Managers can create and modify tasks and categories, as well as assign tasks to users.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'description' => 'This role has permissions to create and modify tasks that are granted. Users can also view their tasks and update their user profile information.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guest',
                'description' => 'This role has limited permissions to view public tasks and categories, but cannot create or modify data in the application.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
