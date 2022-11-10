<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class BoardController extends Controller
{
    public function index(): Response|ResponseFactory
    {
        return inertia('Boards', [
            'boards' => auth()->user()->boards
        ]);
    }

    public function show(Board $board): Response|ResponseFactory
    {
        return inertia('Board', [
            'board' => $board
        ]);
    }

    public function update(Board $board)
    {
        request()->validate([
            'name' => ['required', 'max:255']
        ]);
        $board->update([
            'name' => request('name')
        ]);

        return redirect()->back();
    }

    public function store()
    {
       request()->validate([
            'name' => ['required']
       ]);
       Board::create([
          'user_id' => auth()->id(),
           'name' => request('name')
       ]);

       return redirect()->back();
    }
}
