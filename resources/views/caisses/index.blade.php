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
    </div><!--/.row-->
<div id="page-wrapper">
    <div id="page-inner">


        <div class="col-md-12">

            <ol class="breadcrumb">
                <h2 class="page-header">
                    AJOUTER UNE CAISSE
                </h2>
            </ol>
        </div>  
       
        <!--/.row-->
        <a href="{{ url('caisses/create') }}">
            <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span>
                Nouveau Caisse
            </button>
        </a>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Table Guichet</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Numero du Caisse</th>
                                        <th> Solde</th>
                                        <th> Numero du Guichet</th>
                                        <th>Options</th>
                                        <th>Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caisses as $caisse)
                                        <tr>
                                            <td> {{ $caisse->id }}</td>
                                            <td> {{ $caisse->numero_caisse }}</td>
                                            <td> {{ $caisse->solde}}</td>
                                            <td> {{ $caisse->nomero_guichet }}</td>

                                           
                                            <td><a href="/caisses/{{$caisse->id}}/edit" class="btn btn-warning btn-sm">
                                                    <span class="glyphicon glyphicon-edit">Edit</span></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('caisses.destroy', $caisse->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Voulez vous supprimer cette caisse?')"
                                                        class="btn btn-danger btn-sm">
                                                        <span class="glyphicon glyphicon-trash">Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
