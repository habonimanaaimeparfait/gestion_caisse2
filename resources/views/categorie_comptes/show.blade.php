@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Comptes</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
    <div class="col-lg-12">  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header text-center pb-4">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
        <div class="col-md-12">
            
            <a href="{{ url('categorie_comptes') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
        </div>
        
       
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
     
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
          
            <div class="panel-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nouveau de Compte
</button>
                <div class="panel-heading">Liste des compte appartenant dans la categorie {{ $category_comptes->nom_categorie_compte}}</div>
                
            <div class="modal-content">
      <!--Modal cascading tabs-->
      <div class="modal-body text-center mb-1">
                        
      <table  id="example1" class="table table-bordered table-hover table-striped">
                        <legend>  liste des comptes </legend>
                            <thead>
                                <tr>
                                <th>ID</th>
                                
                                <th>numero_compte</th>
                                <th>nom_compte</th>
                                <th>nif</th>
                                <th>rc</th>
                                <th>Solde</th>
                                <th>telephone</th>
                                <th>email</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($category_comptes->comptes as $compte)
                            <tr>
                            <td>{{$compte->id}}</td>
                            
                            <td>{{$compte->numero_compte}}</td>
                            <td>{{$compte->nom_compte}}  
                            <td>{{$compte->nif}}</td>
                            <td>{{$compte->rc}}</td>
                            <td>{{$compte->solde}}</td>
                            <td>{{$compte->telephone}}</td>
                            <td>{{$compte->email}}</td>

                                    <td>
                                        <a href="comptes/edit/{{$compte->id}}"  class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                        
                                        <form action="comptes/destroy/{{ $compte->id}}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette categorie ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des comptes</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('categorie_compte') }}" method="post">
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


                   
                             
                            <div class="row">
                            <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for=""> numero_compte</label>
                            <input type="float" style="background:gray; color:white" name="numero_compte" id="" class="form-control"
                            class="@error('numero_compte') is-danger @enderror" placeholder="" required >
                            @error('numero_compte')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            </div>
                            <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for=""> Nom comptes</label>
                            <input type="text" style="background:gray; color:white" name="nom_compte" id="" class="form-control"
                            class="@error('nom_compte') is-danger @enderror" placeholder="" aria-describedby="helpId" required>
                            @error('nom_compte')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for=""> lieu de travail</label>
                            <input type="text" style="background:gray; color:white" name="lieu_travail" id="" class="form-control"
                            class="@error('lieu_travail') is-danger @enderror" placeholder="" required>
                            @error('lieu_travail')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            </div>
                            <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for=""> NIF</label>
                            <input type="text" style="background:gray; color:white" name="nif" id="" class="form-control"
                            class="@error('nif') is-danger @enderror" placeholder=""  >
                            @error('nif')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for="">RC</label>
                            <input type="text" style="background:gray; color:white" name="rc" id="" class="form-control"
                            class="@error('rc') is-danger @enderror" placeholder="" >
                            @error('rc')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            </div>
                            <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for=""> Solde</label>
                            <input type="solde" style="background:gray; color:white" name="solde" id="" class="form-control"
                            class="@error('solde') is-danger @enderror" placeholder="" required>
                            @error('solde')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for=""> Num Telepone</label>
                            <input type="text" style="background:gray; color:white" name="telephone" id="" class="form-control"
                            class="@error('telephone') is-danger @enderror" placeholder="" required>
                            @error('telephone')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            </div>
                            <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for=""> Email</label>
                            <input type="email" style="background:gray; color:white" name="email" id="" class="form-control"
                            class="@error('email') is-danger @enderror" placeholder="" >
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            </div>
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
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div>
    </div>
        </div>
        </div> </div>

</div><!-- /.row -->
</div>
<!--/.main-->

@endsection