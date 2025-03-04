<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\Role;
use App\Models\Action;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $roles = [
            'admin' => 'Administrador del sistema',
            'tutor' => 'Tutor del alumno en la empresa',
            'teacher' => 'Profesor del alumno en el centro educativo',
            'pupil' => 'Alumno',
        ];

        foreach ($roles as $key => $value) {
            Role::create([
                'name' => $key,
                'description' => $value,
            ]);
        }

        //Pruebas con factory
        User::factory(10)->create();

        Company::factory(20)->create();

        Action::factory(20)->create();

        //Crear una relacion de N a N de usuarios con roles y compañías usando attach, para pruebas con los factory
         $users = User::all();

         foreach ($users as $user) {
             $user->role()->attach(fake()->numberBetween(1,Role::count()), ['company_id' => fake()->numberBetween(1,Company::count())]);
         }

        //Crear una relacion de tutores, profesores y alumnos para pruebas con los factory
         $users = User::all();

        foreach ($users as $user) {
            if($user->role()->where('name','pupil')->exists()){
                $user->tutor()->associate(User::where('id',fake()->numberBetween(1,User::count()))->first());
                $user->teacher()->associate(User::where('id',fake()->numberBetween(1,User::count()))->first());
                $user->save();
            }
            if($user->role()->where('name','teacher')->exists()){
                $user->tutor()->associate(User::where('id',fake()->numberBetween(1,User::count()))->first());
                $user->save();
            }
            if($user->role()->where('name','tutor')->exists()){
                $user->teacher()->associate(User::where('id',fake()->numberBetween(1,User::count()))->first());
                $user->save();
            }
        }

        //Creación de un usuario administrador
        $user = User::create([
            'name' => "admin",
            'email' => "admin@1",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber(),
            'surname1' => explode(" ",fake()->name())[1],
            'remember_token' => Str::random(10),
        ]);
        
        //Asignamos al usuario el rol de administrador
        $user->role()->attach(Role::where('name','admin')->first()->id);
        $user->save();
        
        //Creación de un usuario tutor
        $user = User::create([
            'name' => "tutor",
            'email' => "tutor@1",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber(),
            'surname1' => explode(" ",fake()->name())[1],
            'remember_token' => Str::random(10),
        ]);

        //Asignamos al usuario el rol de tutor
        $user->role()->attach(Role::where('name','tutor')->first()->id);
        $user->save();

        //Creación de un usuario profesor
        $user = User::create([
            'name' => "profesor",
            'email' => "profesor@1",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber(),
            'surname1' => explode(" ",fake()->name())[1],
            'remember_token' => Str::random(10),
        ]);

        //Asignamos al usuario el rol de profesor
        $user->role()->attach(Role::where('name','teacher')->first()->id);
        $user->save();

        //Creación de un usuario alumno
        $user = User::create([
            'name' => "alumno",
            'email' => "alumno@1",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber(),
            'surname1' => explode(" ",fake()->name())[1],
            'remember_token' => Str::random(10),
        ]);

        //Asignamos al usuario el rol de alumno
        $user->role()->attach(Role::where('name','pupil')->first()->id);
        $user->save();
    }
}
