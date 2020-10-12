<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{

    // VIEW
    public function index()
    {
        return Professor::all();
    }


    // INSERT
    public function store(Request $request)
    {
        Professor::create($request->all());
    }


    // VIEW POR ID (BARRA DE PESQUISA)
    public function show($id)
    {
        return Professor::findOrFail($id);
    }


    // UPDATE
    public function update(Request $request, $id) 
    {
        $prof = Professor::findOrFail($id);
        $prof->update($request->all());
    }


    // DELETE
    public function destroy($id)
    {
        $prof = Professor::findorfail($id);
        $prof->delete();
    }
}
