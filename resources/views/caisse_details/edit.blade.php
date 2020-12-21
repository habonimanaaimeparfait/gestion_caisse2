@extends('templates.default')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">caisse_details</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">caisse_details</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- <div class="panel-heading">Buttons</div> -->
					<div class="panel-body">
						<form role="form-" action="/caisse_details/{{$caisse_detail->id}}" method="POST">
						@csrf
                        @method('PUT')
						<div class="form-group">
						<label>Nom compte</label> 
						<select name="compte_id" id="" class="form-control"
						class="@error('nom_compte') is-danger @enderror"> 
						<option value="" >Select Nom compte</option>
						@foreach($comptes as $compte)
                        <option value="{{$compte->id}}">{{$compte->nom_compte}}</option>
						@endforeach
						@error('compte_id')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror
						</select>
					</div>
					<div class="form-group">
						<label>caisse</label> 
						<select name="caisse_id" id="" class="form-control"
						class="@error('numero_caisse') is-danger @enderror"> 
						<option value="" >Select numero_caisse</option>
						@foreach($caisses as $caisse)
                        <option value="{{$caisse->id}}">{{$caisse->numero_caisse}}</option>
						@endforeach
						@error('caisse_id')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror
						</select>
					</div>
					
					<div class="form-group">
					<label> type</label> 
									
					<input type="text" name="type" class="form-control" placeholder="" value="{{$caisse_detail->type}}">
									
					</div>

					<label > somme</label> 
									
					<input type="float" name="prix_part" class="form-control" placeholder="" value="{{$caisse_detail->somme}}">
									
					</div>

					<div class="form-group">
						<label> libelle </label> 
										
						<input type="text" name="libelle" class="form-control" placeholder="" value="{{$caisse_detail->libelle}}">
										
						</div>

								<div class="form-group">
									<div class="col-md-5 widget-right">
									<!-- <button type="submit" class="btn btn-sm btn-default">Save</button> -->
							<button type="submit" class="btn btn-sm btn-success">enregistrer</button>
									</div>
								</div>
					</form>
										
						</div> 
					</div>
				</div>
      
@endsection
