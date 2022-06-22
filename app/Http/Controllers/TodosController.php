<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3',
            'poblacion' => 'required|max:2500000000' and 'min:0',
            'capital' => 'required|min:3',
            'idioma' => 'required|min:3',

        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->poblacion = $request->poblacion;
        $todo->capital = $request->capital;
        $todo->idioma = $request->idioma;

        $todo->save();

        return redirect()->route('todos')->with('success', 'Pais creado correctamente');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Pais eliminado correctamente');
    }
}
