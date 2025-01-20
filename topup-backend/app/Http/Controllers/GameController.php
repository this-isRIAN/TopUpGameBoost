<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return Game::all(); // Mengambil semua data game
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $game = Game::create($request->all()); // Menyimpan game baru
        return response()->json($game, 201);
    }

    public function destroy($id)
    {
        Game::destroy($id); // Menghapus game berdasarkan ID
        return response()->json(['message' => 'Game deleted'], 200);
    }
}
