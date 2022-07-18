<?php

namespace App\Http\Controllers;

use AUth;
use App\Models\Campus;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use App\Models\Salary;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Emergency;
use App\Models\Warranty;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('salary','experience','education','warranty','emergency')->get();
        //dd(option($user->salary)->basic_salary);
        return view('user.index')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus = Campus::all();
        $department = Department::all();
        $position = Position::all();
        $user = User::latest()->first();
        $lastuserid=$user->id;
        //dd($department,$campus);
        return view('user.create')->with('department', $department)->with('campus', $campus)->with('position', $position,)->with('lastuserid',$lastuserid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        /*    $data->validate([
            'surname' => 'required| string| max:10',
            'title' => 'required| string| max:10',
            'name' => 'required| string| max:255',
            'gender' => 'required| string| max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone'=>'required|integer|digits:10',
            'nationality' => 'required| string| max:255',
            'address' => 'required| string| max:255',
            'photo' => 'image| max:3048',
            'username' => 'string| min:5',
            'password' => ['required','string','min:8','confirmed',Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->uncompromised(),],
        ],
        [
            'name.required' => 'Name is required',
            'password' => 'Password must contin at list one uppercase, lowercase, number and must be al list 8 charater'
        ]); */
        $lastuser = User::latest()->first();
        $lastuserid=$lastuser->id;
         $employidgenerated='AAMBC0'.$lastuserid+1;
        $user = new User();
        //general
        $user->hired_date = $data->get('hired_date');
        $user->employee_type = $data->get('employee_type');
        $user->employee_id = $employidgenerated;
        $user->campus()->associate($data->get('campus'));
        //   $user->department()->associate($data->get('department'));
        //$user->position()->associate($data->get('position'));

        // personal detail
        $user->surname = $data->get('surname');
        $user->title = $data->get('title');
        $user->name = $data->get('name');
        $user->birth_date = $data->get('birth_date'); ////delitabel
        $user->gender = $data->get('gender');
        $user->nationality = $data->get('nationality');
        $user->marital_status = $data->get('marital_status');
        $user->bank_account = $data->get('bank_account');
        $user->social_id = $data->get('social_id');
        $user->social_id_attachment = $data->get('social_id_attachment');
        $user->photo = $data->get('photo');
        $user->academic_status = "active";
        $user->clearance_status = "none";
        $user->email = $data->get('email');
        $user->phone = $data->get('phone');

        //address
        $user->region = $data->get('region');
        $user->city = $data->get('city');
        $user->sub_city = $data->get('sub_city');
        $user->woreda = $data->get('woreda');
        $user->kebele = $data->get('kebele');
        $user->house_number = $data->get('house_number');

        //other information
   
        $myRandomString = generateRandomString(3);

        $user->other_info =$$data->get('other') ;
        $user->username =  $employidgenerated.$myRandomString;
        $user->password = Hash::make($myRandomString.$employidgenerated);
        $user->save();

        //salary structure
        $salary = new Salary();
        $salary->basic_salary = $data->get('basic_salary');
        $salary->phone_allowance = $data->get('phone_allowance');
        $salary->gasoline_allowance = $data->get('gasoline_allowance');
        $salary->insurance_allowance = $data->get('insurance_allowance');
        //  $salary->added_by_id = $data->get(Auth()->user()->id);
        //  $salary->save();
        // $user->added_by()->save($this->user);
        $user->salary()->save($salary);

        //education achivment
        $education = new Education();
        $education->school_name = $data->get('school_name');
        $education->school_location = $data->get('school_location');
        $education->edu_department = $data->get('edu_department');
        $education->edu_academic_level = $data->get('edu_academic_level');
        // $education->save();
        $user->education()->save($education);

        // emergency contact
        $emergency = new Emergency();
        $emergency->em_name = $data->get('em_name');
        $emergency->em_relation = $data->get('em_relation');
        $emergency->em_phone = $data->get('em_phone');
        $emergency->em_email = $data->get('em_email');
        $emergency->em_city = $data->get('em_city');
        $emergency->em_sub_city = $data->get('em_sub_city');
        $emergency->em_woreda = $data->get('em_woreda');
        $emergency->em_kebele = $data->get('em_kebele');
        $emergency->em_house_number = $data->get('em_house_no');
        // $emergency->save();
        $user->emergency()->save($emergency);

        //experiences detail
        $experience = new Experience();
        $experience->company_name = $data->get('company_name');
        $experience->company_location = $data->get('company_location');
        $experience->ex_division = $data->get('ex_division');
        $experience->ex_department = $data->get('ex_department');
        $experience->ex_title = $data->get('ex_title');
        $experience->ex_start_date = $data->get('ex_start_date');
        $experience->ex_end_date = $data->get('ex_end_date');
        // $experience->save();
        $user->experience()->save($experience);

        // Employee Warranty
        $warranty =  new Warranty();
        $warranty->name= $data->get('warranty_name');
        $warranty->birth_date= $data->get('warranty_birth_date');
        $warranty->gender= $data->get('warranty_gender');
        $warranty->nationality= $data->get('warranty_');
        $warranty->marital_status= $data->get('warranty_marital_status');
        $warranty->social_id= $data->get('warranty_social_id');
        $warranty->social_id_attachment= $data->get('warranty_social_id_attachment');
        $warranty->email= $data->get('warranty_email');
        $warranty->phone= $data->get('warranty_phone');
        $warranty->region= $data->get('warranty_region');
        $warranty->city= $data->get('warranty_city');
        $warranty->sub_city= $data->get('warranty_sub_city');
        $warranty->woreda= $data->get('warranty_woreda');
        $warranty->kebele= $data->get('warranty_kebele');
        $warranty->house_number= $data->get('warranty_house_number');
        $warranty->hired_date= $data->get('warranty_hired_date');
        $warranty->employee_type= $data->get('warranty_employee_type');
        $warranty->employee_id= $data->get('warranty_employee_id');
        $warranty->salary= $data->get('warranty_salary');
        $warranty->org_name= $data->get('warranty_org_name');
        $warranty->org_location= $data->get('warranty_org_location');
        $warranty->email_org= $data->get('warranty_email_org');
        $warranty->phone_org= $data->get('warranty_phone_org');
        $user->warranty()->save($warranty());
         dd($myRandomString);
        //return redirect()->route('user.index')->with('user_registered','User Registered Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user_campus = Campus::find($id);
        return view('user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

  
}
  function generateRandomString($length = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    //usage 