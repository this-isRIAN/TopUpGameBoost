<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return Game::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $game = Game::create($request->all());

        return response()->json($game, 201);
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->update($request->all());

        return response()->json($game, 200);
    }

    public function destroy($id)
    {
        Game::destroy($id);

        return response()->json(['message' => 'Game deleted'], 200);
    }
}
