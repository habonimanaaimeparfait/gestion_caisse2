@extends('templates.default')

@section('content')
<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"></li>
			</ol>
		</div><!--/.row-->
		
		

<div class="col-lg-4"></div>
<div class="col-lg-8">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="modal-content">
     
     <div class="modal-body text-center mb-1">
                <div class="card-header"><h2>Modification des utilisateurs</h2></div>

                
                <div class="card-body">

                 
                 <form action="{{ route('admin.users.update',$user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label ">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        @foreach($roles as $role)
                        <div class="form-group form-check">
                        <input  type="checkbox" class="form-check-input" name="roles[]" id="{{$role->id}}" 
                            value="{{$role->id}}"  @if($user->roles->pluck('id')->contains($role->id)) checked @endif   >
                            
                            <label for="{{$role->id}}" class="form-check-label">{{ $role->name }}</label>
                        </div>
                        @endforeach

                <button type="submit" class=" glyphicon glyphicon-edit btn btn-success btn-block btn-rounded z-depth-1">Modifier les roles</button>
            </form>
                <!-- <div class="modal-content">
     
      <div class="modal-body text-center mb-1">
           

      <div class="panel-heading">Modifier l'utilisateur' n&deg; {{ $user->id }}</div>
            <form action="/users/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            
                <div class="form-group">
                    <label data-error="wrong" data-success="right"  for="">Name</label>
                    <input type="text" name="name" id="" 
                    value="{{$user->name}}" class="form-control" class="@error('name') is-danger @enderror" placeholder="" aria-describedby="helpId">
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="text" name="email" id="" 
                    value="{{$user->email}}" class="form-control" class="@error('email') is-danger @enderror" placeholder="" aria-describedby="helpId">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
               
                <div class="form-group">
              
                <div class="row d-flex align-items-center mb-4">

           
            <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-edit btn btn-success btn-block btn-rounded z-depth-1">Modifier</button>
              </div>
             
             </div>


            </div>
            </div>
    </div> -->
    </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
