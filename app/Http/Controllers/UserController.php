<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Adminlogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            return view('Admin.dashboard');
        } else {
            return redirect()->route('login')->with('status', "Please Enter Correct Credencials..");
        }
    }


    public function create()
    {
        return view('Users.employee');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'designation' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->designation = $request->designation;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('employindex')->with('success', "data Store successfully..");
    }
    public function index(Request $request)
    {
        $users = User::paginate(5);
        return view('Users.viewusers', compact('users'));
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $data = [];
    //     if ($query !== "") {
    //         $data = User::where('name', 'LIKE', "%{$query}%")
    //             ->orWhere('email', 'LIKE', "%{$query}%")
    //     } 
    //     else
    //     {
    //         $data = User::all();
    //     }
    //     return view('Users.table', compact('data'));
    // }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = [];

        if ($query !== "") {
            $data = User::where('name', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $data = User::all();
        }

        return view('Users.table', compact('data'));
    }
}
