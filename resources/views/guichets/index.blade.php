@extends('templates.default')
@section('content')


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
           
        </div>
    </div><!--/.row-->
    
        <div id="page-inner">


            {{-- <div class="col-md-5"> --}}

               
                    <p class="page-header">
                        Ajouter un Guichet
                    </p>
              
            
            <form role="form" action="{{ route('guichets.store') }}" method="POST">

                @csrf
                <div class="form-group">
                    <label>Nomero du Guichet :</label>
                    <input type="text" name="nomero_guichet" class="form-control"
                        class="@error('nomero_guichet') is-invalid @enderror" placeholder="" value="">
                    @error('nomero_guichet')
                    <div class="btn btn-danger">{{ $message }}</div>
                    @enderror
                </div>
           
              
                <button type="submit" id="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
           
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomero du Guichet</th>
                                <th>Options</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guichets as $guichet)
                                <tr>
                                    <td>{{ $guichet->id }}</td>
                                    <td>{{ $guichet->nomero_guichet}}</td>
                                    <td>

                                        <a href="{{ route('guichets.edit', $guichet->id) }}"
                                            class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('guichets.destroy', $guichet->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('g')"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
  
    </div>







@endsection()
