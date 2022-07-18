<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;



class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::with('departments')->get();
        $department = Department::all();

        return view('position.index')->with('positions', $positions)->with('department', $department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('position.create')->with('departments', $departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|',
            'departments' => 'required',
            'position_level' => 'required',
        ], [
            'departments.required' => 'You have to Select at list one',
            'positions.required' => 'Position Name is Required',
            'position_level.required' => 'You have to select one position level',
        ]);
        $position = new Position();
        //  $position->=$request->get('departments');
        $position->name = $request->get('name');
        $position->position_level = $request->get('position_level');
        $position->save();
        foreach ($request->get('departments') as $dep) {
            $position->departments()->attach($dep);
        }
        return redirect()->back()->with('position_added', 'New Position is successfully Registered');
    }

    public function link(Request $request)
    {
        $request->validate([
            'departments' => 'required',
            'positions' => 'required',
            'position_level' => 'required'

        ]);
        foreach ($request->get('departments') as $dep) {
            //positions()->departments()->attach($dep);
        }
        return redirect()->back()->with('position_added', 'New Position is successfully Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::with('departments')->find($id);
        $department = Department::all();
        // dd($pos->name);
        return view('position.show')->with('position', $position)->with('department', $department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $department = Department::all();

      // return view('position.edit',compact('position'))->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string',
            'departments' => 'required',
            'position_level' => 'required'
        ], [
            'departments.required' => 'You have to Select at list one',
            'positions.required' => 'Position Name is Required',
            'position_level.required' => 'You have to select one position level',
        ]);
        $position->update($request->all());
        $position->departments()->sync($request->get('departments'));
        // dd($request);
        return redirect()->route('position.index')->with('position_updated', 'position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
