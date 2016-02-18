<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role;
use App\User;
use Kodeine\Acl\Models\Eloquent\Permission;

class AclTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rules
        $role = new Role();
        $roleAdmin = $role->create([
            'name' => 'Administrador',
            'slug' => 'administrator',
            'description' => 'Administrador geral do sistema'
            ]);
        
    	$permission = new Permission();
    	$permAdmin = $permission->create([
    	    'name'        => 'admin',
    	    'slug'        => [
    	        'create' => true,
    	        'view'   => true,
    	        'update' => true,
    	        'delete' => true
    	    ],
    	    'description' => 'Administra permiss�es do administrador do sistema'
    	]);
    	
    	$roleAdmin->assignPermission('admin');

    	$user = User::first();
    	if ($user) {
    	    $user->assignRole($roleAdmin);
    	}
    	

    	$role = new Role();
    	$roleGestor = $role->create([
    	    'name' => 'Gestor',
    	    'slug' => 'gestor',
    	    'description' => 'Usu�rio da categoria "Gestor" do sistema'
    	]);
    	
    	$permission = new Permission();
    	$permGestor = $permission->create([
    	    'name'        => 'not_admin',
    	    'slug'        => [
    	        'create' => true,
    	        'view'   => true,
    	        'update' => true,
    	        'delete' => false
    	    ],
    	    'description' => 'Administra permiss�es das categorias de usu�rios diferentes de administrador'
    	]);
    	
    	$roleGestor->assignPermission('not_admin');
    	
    	
    	
    	
//     	$user->assignRole($roleTeacher);
    	
//     	Administrador
//         	Modelo Ve�culo
//         	Modelo Monitor
//         	Modelo Sensor
//         	Modelo Pneu
//     	Gestor
//         	Usu�rios (somente da empresa)
//         	Filiais (lista empresas)
//         	Frotas (grupo de ve�culos)
//     	Gerente
//         	Motorista
//         	Empresa
//         	Press�o Padr�o (para empresa / modelo ve�culo)
//     	Comum
//     	   Perfil do Usu�rio

    }
}
