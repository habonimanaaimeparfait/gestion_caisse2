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

    <div id="page-wrapper">
        <div id="page-inner">


            <div class="col-md-12">

               
                    <h2 class="page-header">
                        Mise à jour du Guichet
                    </h2>
               
            </div>

            <form role="form" action="{{ route('guichets.update', $guichet->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Nomero du guichet</label>
                    <input type="text" name="nomero_guichet" class="form-control"
                        class="@error('nomero_guichet') is-invalid @enderror" placeholder=""
                        value="{{ $guichet->nomero_guichet}}">
                    @error('nomero_guichet')
                    <button class="btn-danger">{{$message}}</button>
                   @enderror


                    <button type="submit" id="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
            </form>

        </div>
    </div>


    </div>
    </div>
    </div>
    </div>


@endsection()
