<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    private function getUsersFromDb() {
        $users = DB::table('users')
        ->get();
        return $users;
    }

    private function getUsersFromDbById($id) {
        $users = DB::table('users')
        ->where('id', $id)
        ->first();
        return $users;
    }

    private function getGiftsFromDb() {
        $gifts = DB::table('gifts')
        ->get();
        return $gifts;
    }

    private function getGiftFromDbById($id) {
        $gift = DB::table('gifts')
        ->where('id', $id)
        ->first();
        return $gift;
    }

    private function DeleteGiftFromDb($id) {
        DB::table('gifts')
        ->where('id', $id)
        ->delete();
        return back();
    }

    //ReturnViewGifts - Função para retornar todos os presentes
    public function returnGiftsView() {
        $gifts = $this->getGiftsFromDb();
        $users = $this->getUsersFromDb();
        return view('gifts.view_gifts', compact('gifts', 'users'));
    }

    //ViewGiftDetails - Função para retornar detalhe de um presente específico
    public function viewGiftDetails($id) {
        $gift = $this->getGiftFromDbById($id);
        $user = $this->getUsersFromDbById($gift->user_id);
        return view('gifts.viewGiftDetails', compact('gift', 'user'));
    }

    //addNewGift
    public function addNewGift() {
        $users = $this->getUsersFromDb();
        return view('gifts.addNewGift', compact('users'));
    }

    //insert/create
    public function createGift(Request $request) {
        $request->validate([
            'user_id'=>'required',
            'name'=>'required|string|max:50',
            'expected_value'=>'required|numeric',
            'spent_value'=>'required|numeric',
        ]);

        Gift::insert([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'expected_value' => $request->expected_value,
            'spent_value' => $request->spent_value,
        ]);

        return redirect()->route('gifts.view')->with('message', 'Presente adicionado com sucesso!');
    }

    //delete
    public function deleteGift($id) {
        $this->DeleteGiftFromDb($id);
        return redirect()->route('gifts.view')->with('message', 'Presente removido com sucesso!');
    }
}
