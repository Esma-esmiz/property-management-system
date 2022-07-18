@extends('home')
@section('content')
<div class="card">
    <div class="card-header">
        @if(session()->has('position_updated'))
        <div class="alert alert-success alert-dismissible fade show text-center" id="success-alert" role="alert" style="width: 500px;">
            {{session()->get('position_updated')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        <h3 class="card-title text-center">AAMBC Positions</h3>
    </div>

    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">

                <div class="col">
                    <a class="btn btn-info" href="{{route('position.create')}}">Add Position</a>
                </div>
                <div class="col-auto">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending">No</th>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Campus Name: activate to sort column descending">Position Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Location: activate to sort column ascending">Position Level</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">Belonging Departments</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=0; @endphp
                            @foreach($positions as $position)
                            @php $count++ @endphp

                            <tr class="odd">
                                <td>{{$count}}</td>
                                <td class="dtr-control sorting_1" tabindex="0">{{$position->name}}</td>
                                <td>{{$position->position_level}}</td>
                                <td>
                                    @forelse( $position->departments as $dep)
                                    <span class="">{{$dep->name}},</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/position/{{$position->id}}" class="btn btn-info" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="/position/{{$position->id}}/edit" class="btn btn-success" title="Edit" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i></a>
                                        <a href="/position/{{$position->id}}/destroy" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                                <td style="display: none;">A</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">No</th>
                                <th rowspan="1" colspan="1">Position Name</th>
                                <th rowspan="1" colspan="1">position Level</th>
                                <th rowspan="1" colspan="1">Belonging Departments</th>
                                <th rowspan="1" colspan="1">Action</th>
                                <th rowspan="1" colspan="1" style="display: none;">CSS grade</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to{{ $count}} entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                            <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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

<script>
    $(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

    });
</script>
@endsection