<?php
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate([
            // 'id' => 1,
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('password')
            ]);
           
           $caissier =  User::firstOrCreate([
            //    'id'=>2,
                'name'=>'caissier',
                'email'=>'caissier@gmail.com',
                'password'=> Hash::make('password')
        ]);

        $adminRole= Role::where('name','admin')->first();
        $caissierRole= Role::where('name','caissier')->first();

        $admin->roles()->sync($adminRole);
        $caissier->roles()->sync($caissierRole);
    }
}
