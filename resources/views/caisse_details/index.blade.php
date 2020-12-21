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
				<h1 class="page-header"> caisse_details</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- <div class="panel-heading">Buttons</div> -->
					<div class="panel-body">
            <div>
                    <a href="{{url('caisse_details/create')}}" type="button" class="btn btn-sm btn-info">New</a>

</div>
					  <div class="col-md-12">

                      
<table class="table">
<thead>
<tr>
<td>ID</td>
<td>compte_id</td>
<td>caisse_id</td>
<td>type operation</td>
<td>somme</td>
<td>libelle</td>



<td>Action</td>

</tr>
</thead>


<tbody>
@foreach($caisse_details as $caisse_detail)
<tr>
<td>{{$caisse_detail->id}}</td>

<td>{{$caisse_detail->nom_compte}} </td>
<td>{{$caisse_detail->numero_caisse}} </td>
<td>{{$caisse_detail->type}} 
<td>{{$caisse_detail->somme}}</td>
<td>{{$caisse_detail->libelle}}</td>



<td><a href="caisse_details/edit/{{$caisse_detail->id}}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-edit">modifier</span></a>
				
<!--<button type="submit" onclick="return confirm('Voulez vous supprimer cette facture ?')" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash">supprimer</span></button>
 <button type="submit" value="" class="btn btn-sm btn-danger">Delete</button> -->



<td> <a href="caisse_details/edit/{{$caisse_detail->id}}" type="button" class="btn btn-sm btn-success">Edit</a>
<form action="caisse_details/destroy/{{$caisse_detail->id}}" method="POST">
@csrf
<button type="submit" value="" class="btn btn-sm btn-danger">Delete</button> 
</form>
</td>
</tr>

@endforeach
</tbody>
</table>
      
@endsection()