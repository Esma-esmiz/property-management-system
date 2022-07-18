@extends('home')
<style>
    h6 {
        padding-top: 10px;
    }

    .first h6 {
        padding-left: 50px;
    }

    .first-h6 {
        padding-top: 10px;
    }

    .form-group.required .control-label::after {
        content: "*";
        color: red;
    }

    :not(.required) .control-label::after {
        content: " (optional)";
        font-style: italic;
        font-size: small;
    }
</style>
@section('content')
<div class="card  mx-auto float-center align-item-center" style="width: 800px;">
    <div class="card-header">
        <h2 class="card-title text-center"><b>{{$campus->name}}</b> Campus Detail</h2>
        <div class="float-right">
            <a href="/campus/{{$campus->id}}/edit" class="float-left" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-eye">Edit</i></a>
        </div>
    </div>

    <div class="row" style="padding-top: 30px;">
        <div class="col-md-6 col-lg-4 first">
            <h6 class="first-h6">Name:</h6>
            <h6>Open Year:</h6>
            <h6>Country:</h6>
            <h6>Region:</h6>
            <h6>City:</h6>
            <h6>Mobile Phone:</h6>
            <h6>Office Phone:</h6>
            <h6>Email:</h6>
            <h6>Street Address:</h6>
            <h6>Status:</h6>
        </div>

        <div class="vr"></div>
        <div class="col-md-6 col-lg-4">
            <h6>{{$campus->name}}</h6>
            <h6>{{$campus->open_year}}</h6>
            <h6>{{$campus->country}}</h6>
            <h6>{{$campus->Region}}</h6>
            <h6>{{$campus->city}}</h6>
            <h6>{{$campus->phone_mobile}}</h6>
            <h6>{{$campus->phone_fixed}}</h6>
            <h6>{{$campus->Email}}</h6>
            <h6>{{$campus->StreetAddress}}</h6>
            <h6>{{$campus->status}}</h6>
        </div>
        <div class="col-md-6 col-lg-4">
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Campus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('campus.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group required">
                            <label class="control-label" class="control-label" for="name"> Name</label>
                            <input type="text" name="name" value="{{$campus->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter campus Name" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group required">
                            <label class="control-label" class="control-label">Country</label>
                            <select name="country" data-default="{{$campus->country}}" class="form-control selectpicker countrypicker" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" required>
                                <option data-select2-id="42" {{$campus->country == 'Ethiopia' ? 'selected': ''}}>Ethiopia</option>
                                <option data-select2-id="43" {{$campus->country == 'Eritrea' ? 'selected': ''}}>Eritrea</option>
                                <option data-select2-id="44" {{$campus->country == 'Kenya' ? 'selected': ''}}>Kenya</option>
                                <option data-select2-id="45" {{$campus->country == 'Rwanda' ? 'selected': ''}}>Rwanda</option>
                                <option data-select2-id="46" {{$campus->country == 'Somalia' ? 'selected': ''}}>Somalia</option>
                                <option data-select2-id="47" {{$campus->country == 'Sudan' ? 'selected': ''}}>Sudan</option>
                                <option data-select2-id="48" {{$campus->country == 'South Sudan' ? 'selected': ''}}>South Sudan</option>
                                <option data-select2-id="49" {{$campus->country == 'Comoros' ? 'selected': ''}}>Comoros</option>
                                <option data-select2-id="50" {{$campus->country == 'Burundi' ? 'selected': ''}}>Burundi</option>
                                <option data-select2-id="51" {{$campus->country == 'Tanzania' ? 'selected': ''}}>Tanzania</option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Region</label>
                            <select name="region" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" required>
                                <option data-select2-id="22" {{$campus->Region=='Addis Abeba' ? 'selected':''}}>Addis Abeba</option>
                                <option data-select2-id="23" {{$campus->Region=='Dire Dawa' ? 'selected':''}}>Dire Dawa</option>
                                <option data-select2-id="22" {{$campus->Region=='Amhara' ? 'selected':''}}>Amhara</option>
                                <option data-select2-id="25" {{$campus->Region=='Oromia' ? 'selected':''}}>Oromia </option>
                                <option data-select2-id="26" {{$campus->Region=='Somali' ? 'selected':''}}>Somali </option>
                                <option data-select2-id="27" {{$campus->Region=='Afar' ? 'selected':''}}>Afar</option>
                                <option data-select2-id="28" {{$campus->Region=='South Nation' ? 'selected':''}}>South Nation</option>
                                <option data-select2-id="39" {{$campus->Region=='Harari' ? 'selected':''}}>Harari </option>
                                <option data-select2-id="30" {{$campus->Region=='Tigray' ? 'selected':''}}>Tigray</option>
                                <option data-select2-id="30" {{$campus->Region=='Gambela' ? 'selected':''}}>Gambela </option>
                                <option data-select2-id="30" {{$campus->Region=='Sidama' ? 'selected':''}}>Sidama </option>
                                <option data-select2-id="30" {{$campus->Region=='Benishangul-Gumuz' ? 'selected':''}}>Benishangul-Gumuz </option>
                                <option data-select2-id="31" {{$campus->Region=='Southern Nations, Nationalities Peoples' ? 'selected':''}}>Southern Nations, Nationalities Peoples </option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label class="control-label" for="name"> City</label>
                            <input type="text" name="city" value="{{$campus->city}}" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Enter City" required>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Mobile Phone</label>
                            <input type="phone" name="phone_mobile" value="{{$campus->phone_mobile}}" class="form-control  @error('phone_mobile') is-invalid @enderror" id="phone_mobile" placeholder="Enter Mobile Phone" required>
                            @error('phone_mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Office Phone</label>
                            <input type="phone" name="phone_office" value="{{$campus->phone_fixed}}" class="form-control  @error('phone_office') is-invalid @enderror" id="office_phone" placeholder="Enter Office Phone" required>
                            @error('phone_office')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Email</label>
                            <input type="email" name="email" value="{{$campus->Email}}" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label class="control-label" for="name"> Street Address </label>
                            <input type="text" name="street_address" value="{{$campus->StreetAddress}}" class="form-control  @error('street_address') is-invalid @enderror" id="street_address" placeholder="Enter Address" required>
                            @error('street_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label class="control-label" class="control-label">Open Year</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                @php
                                $date= str_replace('-','/',$campus->open_year);
                                @endphp
                                <input type="text" value="?= htmlspecialchars($date) ?>" class="form-control datepicker-input @error('open_year') is-invalid @enderror" name="open_year" value="{{ old('open_year') }}" data-target="#reservationdate">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                @error('open_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src=" {{ asset('vendors/plugins/jquery/jquery.min.js' ) }} "></script>
<script src=" {{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js' ) }} "></script>
<script>
    $(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });
      
        //Date picker
        $('#reservationdate').datetimepicker().setValue('2020-05-3');
        $('#birthday').datetimepicker({
            format: 'L'
        });
        var campus = document.getElementById("campus");
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>

@endsection