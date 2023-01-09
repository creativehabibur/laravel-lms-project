<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $permitions = ['create-admin', 'lead-management','user-management'];

        foreach ($permitions as $permission) {
             Permission::create(
                ['name'=> $permission]
            );
        }
         $this->createRoleAnduser('Super Admin','Super Admin','superadmin@lms.com');
         $this->createRoleAnduser('Comunication','Comunication Team','comunication@lms.com');
         $this->createRoleAnduser('Teacher','Teacher','teacher@lms.com');
         $this->createRoleAnduser('Teacher','Teacher2','teacher2@lms.com');
         $this->createRoleAnduser('Lead','Lead','lead@lms.com');

        Lead::factory(100)->create();

        $course = Course::create([
            'name' => 'Laravel Queues in Action',
            'description' => 'Over the years, I worked on projects that heavily relied on asynchronous task execution (Vapor, Forge & Envoyer). I also worked with hundreds of Laravel community members to solve problems involving the queue system. Along the way, I contributed to enhancing the system by adding new features, fixing bugs, and improving performance.',
            'image' => 'https://laravel-courses.com/storage/courses/4960c69f-174b-43d2-a868-d913de6678a9.png',
            'price' => '39',
        ]);
    }

    private function createRoleAnduser($type,$name,$email){
       $role = Role::where('name',$type)->first();

        if (!$role){
            $role = Role::create([
                'name' => $type,
            ]);
        }
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password'),
        ]);
        if($type == 'Super Admin'){
            $role->givePermissionTo(Permission::all());
        }
        if($type == 'Lead'){
            $role->givePermissionTo('lead-management');
        }
        $user->assignRole($role);
        return $user;
    }
}
