
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