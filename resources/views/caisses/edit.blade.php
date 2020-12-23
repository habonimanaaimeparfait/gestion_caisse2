@extends('templates.default')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Caisse</li>
            </ol>
        </div>
        <!--/.row-->


        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Mise à jour de la caisse</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Caisse</h1>
                </div>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Modifier la caisse</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form role="form" action="{{ route('caisses.update', $caisse->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <label for="description"><strong> Numero de la Caisse</strong></label>
									
                                    <input type="text" style="width:300px; height:35px ;background:rgb(26, 29, 29); color:white" 
                                    name="numero_caisse" class="form-control" placeholder="" value="{{$caisse->numero_caisse}}">
                                 
                                    <label for="description"><strong> Solde</strong></label>
									
                                    <input type="text" style="width:300px; height:35px ;background:rgb(24, 21, 21); color:white" 
                                    name="solde" class="form-control" placeholder="" value="{{$caisse->solde}}">

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Numero du Guichet</label>
                                            <select name="guichet_id"
                                                style="width:300px; height:35px ;background:rgb(17, 17, 17); color:white" id=""
                                                class="form-control" class="@error('nom_guichet') is-danger @enderror">
                                                <option value="">Select numero Guichet</option>
                                                @foreach ($guichets as $guichet)
                                                    <option value="{{ $guichet->id }}">{{ $guichet->nomero_guichet }}
                                                    </option>
                                                @endforeach
                                                @error('guichet_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </select>
                                        </div>

                                    </div>
                                    <button type="submit"
                                onclick="return confirm('Voulez vous modifier la verification qui a ete faite ?')"
                                class="btn btn-warning">Modifier</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                                </form>
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
