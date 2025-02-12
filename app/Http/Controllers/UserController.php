<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;



class UserController extends Controller
{

    public function returnAllUsersView() {

        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciriaco Cardoso',
            'email' => 'cesae@cesae.pt'
        ];

        $myName = $this->getMyVar();

        $allUsers = $this->getUsers();

        $usersFromDB = $this->getUsersFromDB();


        return view('users.all_users', compact('cesaeInfo', 'myName', 'allUsers', 'usersFromDB'));
    }

    public function addAllUsersView() {
        return view('users.addUsers');
    }

    private function getMyVar() {
        $myName = 'Rafaela';
        return $myName;
    }

    public function getUsers() {
        $users = [
            ['id' => 1, 'name' => 'Rafaela', 'email' => 'rafaelah05@hotmail.com'],
            ['id' => 2, 'name' => 'Bruno', 'email' => 'brunomarfel@gmail.com'],
            ['id' => 3, 'name' => 'Carolini', 'email' => 'chatona@gmail.com']
        ];

        return $users;
    }

    private function getUsersFromDb() {
        $usersFromDB = DB::table('users')
        // ->whereNull('updated_at')
        ->get();
        return $usersFromDB;
    }

    public function insertUserIntoDB() {
        DB::table('users')
        ->insert([
            'name' => 'Rafaela',
            'email' => 'rafaela3@gmail.com',
            'password' => 'rafa1234'
        ]);

        return response()->json('user inserido');
    }

    public function updateUserIntoDB() {
        DB::table('users')
        ->where('id', 6)
        ->update([
            'name' => 'Bruno',
            'updated_at' => now()
        ]);

        return response()->json('user atualizado');
    }

    public function deleteUserFromDB() {
        DB::table('users')
        ->where('email', 'rafaela1@gmail.com')
        ->delete();

        return response()->json('deletado com sucesso');
    }

    public function deleteUser($id) {
        //primeiro apago a tarefa relacionada a esse user
        DB::table('tasks')
        ->where('user_id', $id)
        ->delete();


        //depois apago o user
        DB::table('users')
        ->where('id', $id)
        ->delete();

        return back();
    }

    public function viewUser($id) {
        $ourUser = DB::table('users')
        ->where('id', $id)
        ->first();

        return view('users.view_user', compact('ourUser'));
    }

    public function createUser(Request $request) {
        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.all')->with('message', 'Utilizador adicionado com sucesso!');
    }




}
