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


        <div id="page-wrapper">
            <div id="page-inner">


                <div class="col-md-12">

                    <ol class="breadcrumb">
                        <h2 class="page-header">
                            Gestion du Caisse
                        </h2>
                    </ol>
                </div>
                <div class="col-md-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert"> {{ session()->get('message') }} </div>
                    @endif
                    <form role="form" action="{{ url('caisses') }}" method="post">
                        @csrf
                        <div class="form-row">

                            <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for=""><strong>Numero de la Caisse</strong></label>
                                    <input type="text" name="numero_caisse" id="" class="form-control"
                                        class="@error('numero_caisse') is-danger @enderror"
                                        placeholder="Tapez le numero de la caisse ici" aria-describedby="helpId">
                                    @error('numero_caisse')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for=""><strong>Solde</strong></label>
                                    <input type="text" name="solde" id="" class="form-control"
                                        class="@error('solde') is-danger @enderror"
                                        placeholder="Tapez le solde d'ouverture ici" aria-describedby="helpId">
                                    @error('solde')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label for="numero_guichet"> Numero du Guichet</label>

                                <select name="guichet_id" id=""
                                    style="width:300px; height:35px ;background:gray; color:white" id=""
                                    class="form-control" class="@error('solde_cloture')is-danger @enderror" required>
                                    <option value="">Select Guichet</option>
                                    @foreach ($guichets as $guichet)
                                        <option value="{{ $guichet->id }}">{{ $guichet->nomero_guichet }}</option>
                                    @endforeach
                                    @error('guichet->id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </select>
                            </div>
                        </div>

                        <button type="submit" onclick="return confirm('Voulez vous ajouter les information de la caisse ?')"
                            class="btn btn-sucessus">Ajouter</button>
                        <button type="reset" class="btn btn-primary">Annuler</button>
                    </form>
                </div>
            </div>
        </div>


    @endsection()
