@extends('home')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-center">AAMBC Campuses</h3>
    </div>

    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col">
                <a class="btn btn-info" href="{{route('campus.create')}}">Add Campus</a>
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
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Campus Name: activate to sort column descending">Campus Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Location: activate to sort column ascending">Location</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=0; @endphp
                            @foreach($campuses as $campus)
                            @php $count++ @endphp

                            <tr class="odd">
                                <td>{{$count}}</td>
                                <td class="dtr-control sorting_1" tabindex="0">{{$campus->name}}</td>
                                <td>{{$campus->country}},{{$campus->Region}},{{$campus->city}}</td>
                                <td>{{$campus->phone_mobile}},{{$campus->phone_fixed}}</td>
                                <td>{{$campus->Email}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/campus/{{$campus->id}}" class="btn btn-info" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="/campus/{{$campus->id}}/edit" class="btn btn-success" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="/campus/{{$campus->id}}/destroy" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                                <td style="display: none;">A</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">No</th>
                                <th rowspan="1" colspan="1">Campus Name</th>
                                <th rowspan="1" colspan="1">Location</th>
                                <th rowspan="1" colspan="1">Phone</th>
                                <th rowspan="1" colspan="1">Email</th>
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
@endsection