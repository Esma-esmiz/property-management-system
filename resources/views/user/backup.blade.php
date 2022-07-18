<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">


                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">{{ __('New Employee Profile') }}</div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.store') }}" name="user_add_form">
                                @csrf

                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> General </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Hired Date</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input @error('hired_date') is-invalid @enderror" name="hired_date" value="{{ old('hired_date') }}" data-target="#reservationdate">
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                @error('hired_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="campus">{{ __('Campus') }}</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" name="campus" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                @foreach($campus as $item)
                                                <option value='{{$item->id}}'>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('campus')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="department">{{ __('Department') }}</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" name="department" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                @foreach($department as $itemdepartment)
                                                <option value='{{$itemdepartment->id}}'>{{$itemdepartment->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="position">{{ __('Position') }}</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" name="position" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                @foreach($position as $item)
                                                <option value='{{$item->id}}'>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label> Employee Type </label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" required name="employee_type" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="43">Permanent</option>
                                                <option data-select2-id="42">Contrat/Part Time </option>
                                                <option data-select2-id="42"> </option>
                                            </select>
                                            @error('employee_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            <label for="employee_id" class=" ">{{ __('Employee ID') }}</label>
                                            <input disabled id="employee_id" type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" value="{{ old('employee_id') }}" required autocomplete="off">
                                            @error('employee_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> PERSONAL DETAILS</div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="surname" class=" ">{{ __('Nickname') }}</label>

                                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="nickname">

                                            @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                Title
                                            </label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" required name="title" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="42">Ato</option>
                                                <option data-select2-id="43">W/zero</option>
                                                <option data-select2-id="52">W/zerit</option>
                                                <option data-select2-id="44">Dr</option>
                                                <option data-select2-id="44">Prof</option>
                                            </select>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class=" ">{{ __('Name') }}</label>

                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="input-group date" id="birthday" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" data-target="#birthday">
                                                <div class="input-group-append" data-target="#birthday" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">{{ __('Gender') }}</label>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1" name="gender">
                                                <label for="customRadio1" class="custom-control-label">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio2" name="gender">
                                                <label for="customRadio2" class="custom-control-label">Female</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nationality">{{ __('Nationality') }}</label>
                                            <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required autocomplete="country">
                                            @error('nationality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label> Marital Status </label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" required name="marital" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="43">Single </option>
                                                <option data-select2-id="42">Married </option>
                                            </select>
                                            @error('marital')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="bank_account">{{ __('Bank Account(Dash Bank)') }}</label>
                                            <input id="bank_account" type="number" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account" value="{{ old('bank_account') }}" autocomplete="off">
                                            @error('bank_account')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="id_number">{{ __('ID or Passport or Driver License Number') }}</label>
                                            <input id="id_number" type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" autocomplete="off">
                                            @error('id_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="id_attachment">{{ __('ID Attachment') }}</label>
                                            <input class="form-control @error('id_attachment') is-invalid @enderror" size="3mb" name="id_attachment" type="file" id="formFile" accept="photo/*" value="{{old('id_attachment')}}">
                                            @error('id_attachment')
                                            <span>
                                                <strong>{{$message}}</strong>
                                                </spane>
                                                @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="photo">{{ __('photo Attachment') }}</label>
                                            <input class="form-control @error('photo') is-invalid @enderror" size="3mb" name="photo" type="file" id="formFile" accept="photo/*" value="{{old('photo')}}">
                                            @error('image')
                                            <span>
                                                <strong>{{$message}}</strong>
                                                </spane>
                                                @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> CONTACT AND RESIDENTIAL ADDRESS DETAILS</div>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="phone">{{ __('Phone') }}</label>

                                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="tel" placeholder="0911111111">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="from-group">
                                            <label for="email" class="">{{ __('Email Address') }}</label>

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label>Region</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" required name="region" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="42">Addis Abeba</option>
                                                <option data-select2-id="43">Oromia</option>
                                                <option data-select2-id="52">Dire Dwa </option>
                                                <option data-select2-id="44">Somali</option>
                                                <option data-select2-id="48">Harari </option>
                                                <option data-select2-id="45">Amhara</option>
                                                <option data-select2-id="46">Tigray</option>
                                                <option data-select2-id="47">Afar</option>
                                                <option data-select2-id="49">Gambella </option>
                                                <option data-select2-id="48">Nationalities and Peoples Region (SNNPR)</option>
                                            </select>
                                            @error('region')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="city">{{ __('City') }}</label>
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="on">
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sub_city">{{ __('Sub-city') }}</label>
                                            <input id="sub_city" type="text" class="form-control @error('sub_city') is-invalid @enderror" name="sub_city" value="{{ old('sub_city') }}" autocomplete="on">
                                            @error('sub_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="woreda">{{ __('Woreda') }}</label>
                                            <input id="woreda" type="number" class="form-control @error('woreda') is-invalid @enderror" name="woreda" value="{{ old('woreda') }}" autocomplete="on">
                                            @error('woreda')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="kebele ">{{ __('Kebele') }}</label>
                                            <input id="kebele" type="text" class="form-control @error('kebele') is-invalid @enderror" name="kebele" value="{{ old('kebele') }}" required autocomplete="on">
                                            @error('kebele')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="house_no ">{{ __('House Number') }}</label>
                                            <input id="house_no" type="text" class="form-control @error('house_no') is-invalid @enderror" name="house_no" value="{{ old('house_no') }}" autocomplete="on">
                                            @error('house_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> SALARY STRUCTURE </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="basic_salary">{{ __('Basic Salary') }}</label>
                                            <input id="basic_salary" type="number" class="form-control @error('basic_salary') is-invalid @enderror" name="basic_salary" value="{{ old('basic_salary') }}" autocomplete="off">
                                            @error('basic_salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="phone_allowance">{{ __('Phone Allowance') }}</label>
                                            <input id="phone_allowance" type="number" class="form-control @error('phone_allowance') is-invalid @enderror" name="phone_allowance" value="{{ old('phone_allowance') }}" autocomplete="off">
                                            @error('phone_allowance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="gasoline_allowance">{{ __('Gasoline Allowance') }}</label>
                                            <input id="gasoline_allowance" type="number" class="form-control @error('gasoline_allowance') is-invalid @enderror" name="gasoline_allowance" value="{{ old('gasoline_allowance') }}" autocomplete="off">
                                            @error('gasoline_allowance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="insurance_allowance">{{ __('Insurance Allowance') }}</label>
                                            <input id="insurance_allowance" type="number" class="form-control @error('insurance_allowance') is-invalid @enderror" name="insurance_allowance" value="{{ old('insurance_allowance') }}" autocomplete="off">
                                            @error('insurance_allowance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                    </div>
                                </div>

                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> EMERGENCY CONTACT DETAILS</div>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="em_name">{{ __('Full Name') }}</label>

                                            <input id="em_name" type="tel" class="form-control @error('em_name') is-invalid @enderror" name="em_name" value="{{ old('em_name') }}" required autocomplete="off" placeholder="">
                                            @error('em_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Relation</label>
                                            <select name="em_relation" class="form-control select2bs4 select2-hidden-accessible" required name="em_relation" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="42">Father</option>
                                                <option data-select2-id="43">Mother</option>
                                                <option data-select2-id="52">Brother </option>
                                                <option data-select2-id="44">Sister</option>
                                                <option data-select2-id="48"> other </option>

                                            </select>
                                            @error('em_relation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="em_phone">{{ __('Phone') }}</label>

                                            <input id="em_phone" type="tel" class="form-control @error('em_phone') is-invalid @enderror" name="em_phone" value="{{ old('em_phone') }}" required autocomplete="tel" placeholder="0911111111">
                                            @error('em_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="from-group">
                                            <label for="em_email" class="">{{ __('Email Address') }}</label>

                                            <input id="em_email" type="email" class="form-control @error('em_email') is-invalid @enderror" name="em_email" value="{{ old('em_email') }}" required autocomplete="off">

                                            @error('em_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="em_city">{{ __('City') }}</label>
                                            <input id="em_city" type="text" class="form-control @error('em_city') is-invalid @enderror" name="em_city" value="{{ old('em_city') }}" required autocomplete="on">
                                            @error('em_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="em_sub_city">{{ __('Sub-city') }}</label>
                                            <input id="em_sub_city" type="text" class="form-control @error('em_sub_city') is-invalid @enderror" name="em_sub_city" value="{{ old('em_sub_city') }}" autocomplete="on">
                                            @error('em_sub_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="em_woreda">{{ __('Woreda') }}</label>
                                            <input id="em_woreda" type="number" class="form-control @error('em_woreda') is-invalid @enderror" name="em_woreda" value="{{ old('em_woreda') }}" autocomplete="on">
                                            @error('em_woreda')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="em_kebele ">{{ __('Kebele') }}</label>
                                            <input id="em_kebele" type="text" class="form-control @error('em_kebele') is-invalid @enderror" name="em_kebele" value="{{ old('em_kebele') }}" required autocomplete="on">
                                            @error('em_kebele')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="em_house_no ">{{ __('House Number') }}</label>
                                            <input id="em_house_no" type="text" class="form-control @error('em_house_no') is-invalid @enderror" name="em_house_no" value="{{ old('em_house_no') }}" autocomplete="on">
                                            @error('em_house_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> WORK EXPERIENCES DETAILS</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="company_name">{{ __('Company Name') }}</label>
                                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="off">
                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="company_location">{{ __('Company Location') }}</label>
                                            <input id="company_location" type="text" class="form-control @error('company_location') is-invalid @enderror" name="company_location" value="{{ old('company_location') }}" autocomplete="off">
                                            @error('company_location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="ex_division">{{ __('Division') }}</label>
                                            <input id="ex_division" type="text" class="form-control @error('ex_division') is-invalid @enderror" name="ex_division" value="{{ old('ex_division') }}" autocomplete="off">
                                            @error('ex_division')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ex_department">{{ __('Department') }}</label>
                                            <input id="ex_department" type="text" class="form-control @error('ex_department') is-invalid @enderror" name="ex_department" value="{{ old('ex_department') }}" autocomplete="off">
                                            @error('ex_department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="ex_title">{{ __('Title') }}</label>
                                            <input id="ex_title" type="text" class="form-control @error('ex_title') is-invalid @enderror" name="ex_title" value="{{ old('ex_title') }}" autocomplete="off">
                                            @error('ex_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Date range:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>From:Date</label>
                                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input @error('from_date') is-invalid @enderror" name="ex_start_date" value="{{ old('ex_start_date') }}" data-target="#from_date">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                                @error('ex_start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>To:Date</label>
                                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input @error('ex_end_date') is-invalid @enderror" name="ex_end_date" value="{{ old('ex_end_date') }}" data-target="#to_date">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                                @error('ex_end_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> EDUCATION DETAILS</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="school_name">{{ __('School Name') }}</label>
                                            <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{ old('school_name') }}" required autocomplete="off">
                                            @error('school_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="school_location">{{ __('School Location') }}</label>
                                            <input id="school_location" type="text" class="form-control @error('school_location') is-invalid @enderror" name="school_location" value="{{ old('school_location') }}" autocomplete="off">
                                            @error('school_location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="edu_department">{{ __('Department') }}</label>
                                            <input id="edu_department" type="text" class="form-control @error('edu_department') is-invalid @enderror" name="edu_department" value="{{ old('edu_department') }}" autocomplete="off">
                                            @error('edu_department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                Academic Level
                                            </label>
                                            <select name="edu_academic_level" class="form-control select2bs4 select2-hidden-accessible" required name="academic_level" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id=" ">Level III/10+2</option>
                                                <option data-select2-id=" ">Level IV/10+3</option>
                                                <option data-select2-id=" ">BA/BSc.</option>
                                                <option data-select2-id=" ">MD</option>
                                                <option data-select2-id=" ">MA/MSc/MPH</option>
                                                <option data-select2-id=" ">Assistance Professor</option>
                                                <option data-select2-id=" ">Associate Professor</option>
                                                <option data-select2-id=" ">Professor</option>
                                            </select>

                                            </select>
                                            @error('edu_academic_level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header">Employee Warranty</div>
                                    </div>

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="name" class=" ">{{ __('Name') }}</label>

                                            <input id="warranty_name" type="text" class="form-control @error('warranty_name') is-invalid @enderror" name="warranty_name" value="{{ old('warranty_name') }}" required autocomplete="name">

                                            @error('warranty_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input @error('warranty_birthday') is-invalid @enderror" name="warranty_birthday" value="{{ old('warranty_birthday') }}" data-target="#birthday">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                                @error('warranty_birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_gender">{{ __('Gender') }}</label>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1" name="warranty_gender">
                                                <label for="customRadio1" class="custom-control-label">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio2" name="warranty_gender">
                                                <label for="customRadio2" class="custom-control-label">Female</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="warranty_nationality">{{ __('Nationality') }}</label>
                                            <input id="warranty_nationality" type="text" class="form-control @error('warranty_nationality') is-invalid @enderror" name="warranty_nationality" value="{{ old('warranty_nationality') }}" required autocomplete="country">
                                            @error('warranty_nationality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label> Marital Status </label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" required name="warranty_marital" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="43">Single </option>
                                                <option data-select2-id="42">Married </option>
                                            </select>
                                            @error('warranty_marital')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_id_number">{{ __('ID or Passport or Driver License Number') }}</label>
                                            <input id="warranty_id_number" type="text" class="form-control @error('warranty_id_number') is-invalid @enderror" name="warranty_id_number" value="{{ old('warranty_id_number') }}" autocomplete="off">
                                            @error('warranty_id_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_id_attachment">{{ __('ID Attachment') }}</label>
                                            <input class="form-control @error('warranty_id_attachment') is-invalid @enderror" size="3mb" name="warranty_id_attachment" type="file" id="formFile" accept="photo/*" value="{{old('warranty_id_attachment')}}">
                                            @error('warranty_id_attachment')
                                            <span>
                                                <strong>{{$message}}</strong>
                                                </spane>
                                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_phone">{{ __('Phone') }}</label>

                                            <input id="warranty_phone" type="tel" class="form-control @error('warranty_phone') is-invalid @enderror" name="warranty_phone" value="{{ old('warranty_phone') }}" required autocomplete="tel" placeholder="0911111111">
                                            @error('warranty_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="from-group">
                                            <label for="warranty_email" class="">{{ __('Email Address') }}</label>

                                            <input id="warranty_email" type="email" class="form-control @error('warranty_email') is-invalid @enderror" name="warranty_email" value="{{ old('warranty_email') }}" required autocomplete="email">

                                            @error('warranty_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label>Region</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" required name="warranty_region" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="42">Addis Abeba</option>
                                                <option data-select2-id="43">Oromia</option>
                                                <option data-select2-id="52">Dire Dwa </option>
                                                <option data-select2-id="44">Somali</option>
                                                <option data-select2-id="48">Harari </option>
                                                <option data-select2-id="45">Amhara</option>
                                                <option data-select2-id="46">Tigray</option>
                                                <option data-select2-id="47">Afar</option>
                                                <option data-select2-id="49">Gambella </option>
                                                <option data-select2-id="48">Nationalities and Peoples Region (SNNPR)</option>
                                            </select>
                                            @error('warranty_region')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_city">{{ __('City') }}</label>
                                            <input id="warranty_city" type="text" class="form-control @error('warranty_city') is-invalid @enderror" name="warranty_city" value="{{ old('warranty_city') }}" required autocomplete="on">
                                            @error('warranty_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_sub_city">{{ __('Sub-city') }}</label>
                                            <input id="warranty_sub_city" type="text" class="form-control @error('warranty_sub_city') is-invalid @enderror" name="warranty_sub_city" value="{{ old('warranty_sub_city') }}" autocomplete="on">
                                            @error('warranty_sub_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_woreda">{{ __('Woreda') }}</label>
                                            <input id="warranty_woreda" type="number" class="form-control @error('warranty_woreda') is-invalid @enderror" name="warranty_woreda" value="{{ old('warranty_woreda') }}" autocomplete="on">
                                            @error('warranty_woreda')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_kebele ">{{ __('Kebele') }}</label>
                                            <input id="warranty_kebele" type="text" class="form-control @error('warranty_kebele') is-invalid @enderror" name="warranty_kebele" value="{{ old('warranty_kebele') }}" required autocomplete="on">
                                            @error('warranty_kebele')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_house_no ">{{ __('House Number') }}</label>
                                            <input id="warranty_house_no" type="text" class="form-control @error('warranty_house_no') is-invalid @enderror" name="warranty_house_no" value="{{ old('warranty_house_no') }}" autocomplete="on">
                                            @error('warranty_house_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Hired Date</label>
                                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                <input name="warranty_hired_date" type="text" id="date" class="form-control datetimepicker-input @error('warranty_hired_date') is-invalid @enderror" name="warranty_hired_date" value="{{ old('warranty_hired_date') }}" data-target="#hired_date">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                                @error('warranty_hired_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label> Employee Type </label>
                                            <select class="form-control select2bs4 select2-hidden-accessible" required name="warranty_employee_type" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="43">Permanent</option>
                                                <option data-select2-id="42">Contrat/Part Time </option>
                                                <option data-select2-id="42"> </option>
                                            </select>
                                            @error('warranty_employee_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            <label for="warranty_employee_id" class=" ">{{ __('Employee ID') }}</label>
                                            <input id="warranty_employee_id" type="text" class="form-control @error('warranty_employee_id') is-invalid @enderror" name="warranty_employee_id" value="{{ old('warranty_employee_id') }}" required autocomplete="off">
                                            @error('warranty_employee_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="warranty_basic_salary">{{ __('Basic Salary') }}</label>
                                            <input id="warranty_basic_salary" type="number" class="form-control @error('warranty_basic_salary') is-invalid @enderror" name="warranty_basic_salary" value="{{ old('warranty_basic_salary') }}" autocomplete="off">
                                            @error('warranty_basic_salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_company_name">{{ __('Company Name') }}</label>
                                            <input id="warranty_company_name" type="text" class="form-control @error('warranty_company_name') is-invalid @enderror" name="warranty_company_name" value="{{ old('warranty_company_name') }}" required autocomplete="off">
                                            @error('warranty_company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_company_location">{{ __('Company Location') }}</label>
                                            <input id="warranty_company_location" type="text" class="form-control @error('warranty_company_location') is-invalid @enderror" name="warranty_company_location" value="{{ old('warranty_company_location') }}" autocomplete="off">
                                            @error('warranty_company_location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="warranty_org_phone">{{ __('Phone') }}</label>

                                            <input id="warranty_org_phone" type="tel" class="form-control @error('warranty_org_phone') is-invalid @enderror" name="warranty_org_phone" value="{{ old('warranty_org_phone') }}" required autocomplete="tel" placeholder="0911111111">
                                            @error('warranty_org_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="from-group">
                                            <label for="warranty_org_email" class="">{{ __('Email Address') }}</label>

                                            <input id="warranty_org_email" type="warranty_org_email" class="form-control @error('warranty_org_email') is-invalid @enderror" name="warranty_org_email" value="{{ old('warranty_org_email') }}" required autocomplete="email">

                                            @error('warranty_org_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                    </div>
                                </div>

                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> OTHERS</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Other Information</label>
                                            <textarea name="other_info" class="form-control" rows="5" placeholder="other information related"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="card-header"> OTHERS</div>
                                    </div>
                                    <div class="card-body">


                                        <div class="form-group ">
                                            <label for="username" class=" ">{{ __('UserName') }}</label>

                                            <input disabled id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="password_confirmation" required autocomplete="off">
                                            @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row text-center">
                                    <div class="col-7">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="reset" class="btn btn-danger">
                                            {{ __('Clear') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>