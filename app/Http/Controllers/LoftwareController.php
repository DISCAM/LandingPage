<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoftwareController extends Controller
{
    public function index()
    {

        //$users = User::all();
        //$users = User::where('status', 'Active')->get();
        //$users = User::orderBy('name', 'asc')->get();
        $users = User::where('status', 'Active')->orderBy('name', 'asc')->get();

        return view('loftware.loftware', [
            'lista'=>$users ,
            'title'=>'przykładowa lista'
        ]);
    }

}
