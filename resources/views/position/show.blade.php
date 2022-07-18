<head>
    <link rel="stylesheet" href="{{ asset('vendors/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/plugins/bs-stepper/css/bs-stepper.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/plugins/dropzone/min/dropzone.min.css') }}">
</head>
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
        <h2 class="card-title text-center"><b>{{$position->name}}</b> Position Detail</h2>
        <div class="float-right">
            <a href="/position/{{$position->id}}/edit" class="float-left" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-eye">Edit</i></a>
        </div>
    </div>

    <div class="row" style="padding-top: 30px;">
        <div class="col-md-6 col-lg-4 first">
            <h6 class="first-h6">Name:</h6>
            <h6>Position Level:</h6>
            <h6>Belonging Departments:</h6>
        </div>

        <div class="vr"></div>
        <div class="col-md-6 col-lg-4">
            <h6>{{$position->name}}</h6>
            <h6>{{$position->position_level}}</h6>
            @foreach($position->departments as $dep)
            <h6>{{$dep->name}}</h6>
            @endforeach
        </div>
        <div class="col-md-6 col-lg-4">
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Position</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="modal-body">
                <form method="POST" action="{{route('position.update',$position->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group clearfix required">
                            <label for="departments" class="control-label">Belonging Departments</label>
                            @php
                            foreach($position->departments as $item)
                            $selelcted_dep[]=$item->id
                            @endphp

                            @foreach($department as $dep)
                            <div class="icheck-primary" style="padding-left: 20px;">
                                <input @if(in_array($dep->id,$selelcted_dep)) checked=checked @endif type="checkbox" name="departments[]" id="{{$dep->name}}" value="{{$dep->id}}">
                                <label for="{{$dep->name}}">{{$dep->name}}</label>
                            </div>
                            @endforeach
                            @error('departments')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label class="control-label" class="control-label" for="name"> Name</label>
                            <input type="text" name="name" value="{{$position->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter position Name" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Position Level</label>
                            <select name="position_level" class="form-control selectpicker" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" required>
                                <option data-select2-id="45" value=4 {{$position->position_level == 4 ? 'selected':''}}>4</option>
                                <option data-select2-id="46" value=5 {{$position->position_level == 5 ? 'selected':''}}>5</option>
                                <option data-select2-id="47" value=6 {{$position->position_level == 6 ? 'selected':''}}>6</option>
                                <option data-select2-id="48" value=7 {{$position->position_level == 7 ? 'selected':''}}>7</option>
                                <option data-select2-id="49" value=8 {{$position->position_level == 8 ? 'selected':''}}>8</option>
                                <option data-select2-id="50" value=9 {{$position->position_level == 9 ? 'selected':''}}>9</option>
                                <option data-select2-id="51" value=10 {{$position->position_level == 10 ? 'selected':''}}>10</option>
                                <option data-select2-id="44" value=3 {{$position->position_level == 3 ? 'selected':''}}>3--Vise-President</option>
                                <option data-select2-id="43" value=2 {{$position->position_level == 2 ? 'selected':''}}>2--President</option>
                                <option data-select2-id="42" value=1 {{$position->position_level == 1 ? 'selected':''}}>1--CEO</option>
                            </select>
                            @error('position_level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<script src="{{ asset('vendors/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('vendors/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>

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