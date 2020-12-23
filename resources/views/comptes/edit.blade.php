@extends('templates.default')

@section('content')

<div class="modal-dialog form-dark" role="document">
    <!--Content-->
<div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <div class="col-lg-10">   
<div class="panel panel-info"><!--/.row-->
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Modification du comptes</strong> <a
              class="green-text font-weight-bold"><strong> </strong></a></h3>
              </div>
              </div>
              </div>
              <a href="{{ url('comptes') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
    
    <!--/.row-->

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier le compte n&deg; {{ $compte->id }}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="/comptes/{{ $compte->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
						<label>Nom categorie_compte</label> 
						<select name="categoriecompte_id" style="background:gray; color:white" id="" class="form-control"
						class="@error('nom_categorie_compte') is-danger @enderror"> 
						<option value="" >Select Nom categorie_compte</option>
						@foreach($categorie_comptes as $categorie_compte)
                        <option value="{{$categorie_compte->id}}">{{$categorie_compte->nom_categorie_compte}}</option>
						@endforeach
						@error('categorie_compte_id')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror
						</select>
					</div>
                    <div class="row">
                    <div class="col-lg-6"> 
                    <div class="form-group">
					<label>numero_compte</label> 
									
					<input type="text"style="background:gray; color:white" name="numero_compte" 
                    class="form-control" placeholder="" value="{{$compte->numero_compte}}">
									
					</div>
                    </div>
                    <div class="col-lg-6"> 
                    <div class="form-group">
					<label>nom_compte</label> 
									
					<input type="text" style="background:gray; color:white"
                     name="nom_compte" class="form-control" placeholder="" value="{{$compte->nom_compte}}">
									
					</div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6"> 
                    <div class="form-group">
                    <label >lieu_travail</label> 
									
					<input type="text" style="background:gray; color:white" name="lieu_travail" class="form-control" placeholder="" value="{{$compte->lieu_travail}}">
									
				     </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group"> 
                    <label > NIF</label> 
									
					<input type="text" style="background:gray; color:white" name="nif" class="form-control" placeholder="" value="{{$compte->nif}}">
									
					</div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-6"> 
                    <div class="form-group">
                    <label > RC</label> 
									
					<input type="text" style="background:gray; color:white" name="rc" class="form-control" placeholder="" value="{{$compte->rc}}">
									
					</div>
                    </div>
                    <div class="col-lg-6"> 
                    <div class="form-group">
                    <label >Solde</label> 
									
					<input type="text" style="background:gray; color:white"
                    name="solde" class="form-control" placeholder="" value="{{$compte->solde}}">
									
					</div>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-lg-6"> 
                    <div class="form-group">
                    <label >num telephone</label> 
									
					<input type="text" style="background:gray; color:white"
                    name="telephone" class="form-control" placeholder="" value="{{$compte->telephone}}">
									
					</div>
                    </div>
                    <div class="col-lg-6"> 
                    <div class="form-group">
                    <label > EMAIL</label> 
									
                    <input type="text" style="background:gray; color:white" name="email" class="form-control" placeholder="" value="{{$compte->email}}">
                                                    
                    </div>
                    </div>
                    </div>

                            <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-edit btn btn-success btn-block btn-rounded z-depth-1">Modifier</button>
              </div>
             
             </div>
                        </form>
                    </div>
                </div>
                </div>
    </div>
    </div>
    </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div><!-- /.col-->
</div><!-- /.row -->
</div>
<!--/.main-->

@endsection