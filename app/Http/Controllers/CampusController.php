<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::all();
        return view('campus.index')->with('campuses', $campuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('halo create');
        return view('campus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $data->validate(
            [
                'name' => ' required|string|max:255',
                'country' => 'required|string',
                'region' => 'required|string',
                'city' => 'required|string|max:255',
                'phone_mobile' => 'integer',
                'phone_office' => 'integer',
                'email' => ' string|email|max:255|unique:campuses',
                'street_address' => 'required|string',
                'open_year' => 'required'
            ],
            [
                'name.required' => 'Name is required',
            ]
        );

        $campus = new Campus();
        $campus->name = $data->get('name');
        $campus->open_year = date('y-m-d',strtotime($data->get('open_year')));
        $campus->country = $data->get('country');
        $campus->Region = $data->get('region');
        $campus->city = $data->get('city');
        $campus->phone_mobile = $data->get('phone_mobile');
        $campus->phone_fixed = $data->get('phone_office');
        $campus->email = $data->get('email');
        $campus->StreetAddress = $data->get('street_address');
        $campus->status = 'active';
        // dd($campus);
        $campus->save();
        return redirect()->back()->with('campus_added','New Campus is successfully Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campus=Campus::find($id);//dd($campus->open_year->type);
       return view('campus.show')->with('campus',$campus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    { 
        return "haye";
    }
}
