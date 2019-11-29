@extends('panel.role.layout.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Role</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('role.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('role.update',$role->id) }}" method="POST">
        @csrf
        @method('PUT')
            
        <div class="row">
				    <div class="col-xs-12 col-sm-12 col-md-12">
				        <div class="form-group">
				            <strong>Name:</strong>
				            <input type="text" class="form-control" name="name" value="{{ $role->name }}">
				        </div>
				    </div>
				    <div class="col-xs-12 col-sm-12 col-md-12">
				        <div class="form-group">
				            <strong>Permission:</strong>
				            <br/>
				            @foreach($permission as $value)
				                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
				                {{ $value->name }}</label>
				            <br/>
				            @endforeach
				        </div>
				    </div>
				    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				        <button type="submit" class="btn btn-primary">Submit</button>
				    </div>
				</div>
   
    </form>
@endsection