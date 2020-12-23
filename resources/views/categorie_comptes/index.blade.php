@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Categorie compte</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Categorie Comptes</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nouveau Categorie de compte
</button>

                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                <th>ID</th>
                                 <th>Nom du categorie_compte</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categorie_comptes as $categorie_compte)
                            <tr>
                            <td>{{$categorie_compte->id}}</td>
                            <td>{{$categorie_compte->nom_categorie_compte}}</td>

                                    <td>
                                        <a href="categorie_comptes/edit/{{$categorie_compte->id}}"  class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                        <a href="categorie_comptes/show/{{$categorie_compte->id}}" class="glyphicon glyphicon-play btn btn-primary" >Attribution des caisse</a>
                                        <form action="categorie_comptes/destroy/{{ $categorie_compte->id}}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette categorie ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

              

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des categorie de compte</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('categorie_comptes') }}" method="post">
                           @csrf


                           <!-- <div class="form-group">
						<label>Nom_compte</label> 
						 <input type="text" name="nom_categorie_compte" class="form-control" 
                          placeholder="Saisir le nom categorie_compte" 
						class="form-control" class="@error('nom_categorie_compte') is-danger @enderror">
						@error('nom_categorie_compte')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror
					</div> -->


                           <div class="form-group">
                               <label>Nom_compte:</label>
                               <input type="text" name="nom_categorie_compte" class="form-control" 
                               placeholder="Saisir le nom categorie_compte" required>
                           </div>
                           <div class="modal-footer">
      <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
              </div>
              <div class="text-center mb-3 col-md-6">
              <button  type="reset"class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Reset</button>
              </div>
             </div>
      </div>
                       </form>
                   </div>
               </div>
               
               </div>
               </div>
      </div>
     
    </div>
  </div>
</div>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div>
</div><!-- /.row -->
</div>
@endsection