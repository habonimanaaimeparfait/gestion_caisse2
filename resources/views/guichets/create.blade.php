@extends('templates.default')
@section('content')
    <div id="page-wrapper">
        <div id="page-inner">

            
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
                <div class="row">
                    <ol class="breadcrumb">
                        <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                        <li class="active">Comptes</li>
                    </ol>
                </div><!--/.row-->
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ajouter un Comptes</h1>
                    </div>
                </div><!--/.row-->



            <div class="col-md-8">

                <ol class="breadcrumb">
                    <h2 class="page-header">
                        Ajouter un Guichet
                    </h2>
                </ol>
            </div>


            <form role="form" action="{{ route('guichets.store') }}" method="POST">

                @csrf
                <div class="form-group">
                    <label>Nomero du Guichet :</label>
                    <input type="text" style="width:11%;height:7%" name="nomero_guichet" class="form-control"
                        class="@error('nomero_guichet') is-invalid @enderror" placeholder="" value="">
                    @error('nomero_guichet')
                    <div class="btn btn-danger">{{ $message }}</div>
                    @enderror
                </div>
              
                <button type="submit" id="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
    </div>


@endsection()
