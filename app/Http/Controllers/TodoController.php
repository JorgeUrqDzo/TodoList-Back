<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;


class TodoController extends Controller
{
    public function index()
    {
    	return response()->json(Todo::all());
    }

    public function store(Request $req)
    {
    	$todo = new Todo();
    	$todo->title = $req->get('title');
    	$todo->description = $req->get('description');
    	$todo->done = false;

    	return response()->json($todo->save());
    }

    public function show($id)
    {
    	return response()->json(Todo::findOrFail($id));
    }

    public function update(Todo $todo, Request $req)
    {
    	
    	$todos = Todo::findOrFail($todo->id);
    	$todos->title = $req->get('title');
    	$todos->description = $req->get('description');
    	$todos->done = $req->get('done');

    	return response()->json($todos->save());
    }

    public function destroy($id)
    {
    	$todo = Todo::findOrFail($id);
    	return response()->json($todo->delete());
    }
}
