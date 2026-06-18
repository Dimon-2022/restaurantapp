<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('management.table', ['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.createTable');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tables|max:255',
        ]);

        $table = new Table();
        $table->name = $request->name;
        $table->save();
        $request->session()->flash('status', $request->name . ' is save successfully.');

        return redirect()->route('table.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table = Table::find($id);

        return view('management.editTable', ['table' => $table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:tables,name,' . $id . '|max:255',
        ]);

        $table = Table::find($id);
        $table->name = $request->name;
        $table->save();
        $request->session()->flash('status', $request->name . ' is updated successfully.');

        return redirect()->route('table.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::find($id);
        Table::destroy($id);
        session()->flash('status', $table->name . ' is deleted successfully.');

        return redirect()->route('table.index');
    }
}
