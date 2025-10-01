<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use function Laravel\Prompts\password;
use App\Repositories\UserRepository;

class LoftwareController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        Gate::authorize('viewAny', User::class);

        $statistics = $userRepo->getUserStatistics();

        //$users = User::all();
        //$users = User::where('status', 'Active')->get();
        //$users = User::orderBy('name', 'asc')->get();
        $users = $userRepo->getAllUsers();          //// pop przez wstrzyknięcie mamy dostęp do obiektu i metody
        //$users = $userRepo->getAll('email');

        return view('loftware.loftware', [
            'lista'=>$users ,
            'title'=>'przykładowa lista',
            'stat' => $statistics
        ]);
    }

    public function show(UserRepository $userRepo,$id){



        $user = $userRepo->find($id);

        Gate::authorize('view', $user);

        return view('loftware.show', [
            'lista'=>$user,
            'title'=>'użytkownik o imieniu : ' . $user->name
        ]);
    }
    public function create(UserRepository $userRepo)
    {
        $table = [
            'name'=>'CIO',
            'email' => 'cio@cio.pl',
            'password' => 'haslo',
            'phone'=>'2342423423',
            'address' => 'wawa',
            'status' => 'Active',
            'role' => 'admin'
        ];
        $userRepo->create($table);
        return redirect('/');
    }
    public function edit(UserRepository $userRepo, $id)
    {
        $user = $userRepo->update(['name' => 'Johnson'], $id);
        return redirect('/');
    }








}
