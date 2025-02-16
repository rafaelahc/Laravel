<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    private function getUsersFromDb() {
        $users = DB::table('users')
        ->get();
        return $users;
    }

    public function returnView() {
        $tasksList = $this->tasksList();
        $availableTasks = $this-> tasksAvaliable();
        $tasksFromDB = $this-> getAllTasks();
        $users = $this->getUsersFromDb();


        return view('view_tasks', compact('tasksList', 'availableTasks', 'tasksFromDB', 'users'));
    }

    public function tasksList() {
        $tasks = [
            ['name' => 'Rita', 'task' => 'estudar javascript'],
            ['name' => 'Carolina', 'task' => 'estudar React']
        ];

        return $tasks;
    }

    public function tasksAvaliable() {
        $availableTasks = ['sql', 'js', 'Java', 'POO'];
        return $availableTasks;
    }

    private function getAllTasks() {
        $tasksFromDB = DB::table('tasks')
        ->join('users', 'users.id', '=', 'tasks.user_id')
        ->select('tasks.*', 'users.name as user_name')
        ->get();
        return $tasksFromDB;
    }

    public function insertTasksIntoDB() {
        DB::table('tasks')
        ->insert([
            'name' => 'Carolini',
            'description' => 'estudar programação',
            'status' => true,
            'user_id' => 5

        ]);

        return response()->json('user inserido');
    }

    public function updateTasksIntoDB() {
        DB::table('tasks')
        ->where('id', 3)
        ->update([
            'due_at' => '2025-04-05',
            'updated_at' => now()
        ]);

        return response()->json('tarefa atualizado');
    }

    public function viewTask($id) {
        $ourTasks = DB::table('tasks')
        ->where('tasks.id', $id)
        ->join('users', 'users.id', '=', 'tasks.user_id')
        ->select('tasks.*', 'users.name as user_name')
        ->first();

        return view('view_task', compact('ourTasks'));
    }


    public function deleteTask($id) {
        DB::table('tasks')
        ->where('id', $id)
        ->delete();

        return back();
    }

    public function addNewTask() {
        $users = $this->getUsersFromDb();
        return view('addTask', compact('users'));


    }

    public function createTasks(Request $request) {
        $request->validate([
            'user_id'=>'required',
            'name'=>'required|string|max:50',
            'description'=>'required|string',
        ]);


        Task::insert([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'due_at' => $request->date
        ]);

        return redirect()->route('task')->with('message', 'Tarefa adicionada com sucesso!');
    }




}
