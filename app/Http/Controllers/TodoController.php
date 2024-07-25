<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public $state;
    public $xd;
    public function createTodo()
    {
        DB::table('todos')->insert([
            request()->only(['title', 'description'])
        ]);

        return redirect('/todo');
    }

    public function getStatus($id)
    {
        $state = DB::table('todos')->where('id', $id)->get();
        $this->state = $state;

        $this->xd = $this->state;

        return $this->state;
    }
    public function updateStatus($id, $status)
    {
        return $this->state = match ($status) {
            '0' => DB::table('todos')->where('id', $id)->update(['completed' => 1]),
            '1' => DB::table('todos')->where('id', $id)->update(['completed' => 0]),
        };

    }


    public function index()
    {
        return view('todo')
            ->with([
                'todos' => DB::table('todos')->get(),
                'state' => $this->state,
                'xd' => $this->xd
            ]);
    }
}
