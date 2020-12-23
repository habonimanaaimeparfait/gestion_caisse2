@extends('templates.default')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">caisse_details</li>
                </ol>
            </div>
            <!--/.row-->

        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">Buttons</div> -->
                    <div class="panel-body">
                        <div>
                            <a href="{{ url('caisse_details/create') }}" type="button" class="btn btn-sm btn-info">Nouveau
                                Caisse detail</a>
                        </div>

                        <p>
                        <div class="col-md-12">
                            <div class="form-group">

                                <label> <strong>Solde Anterieur</strong> </label>

                                <input type="text" style="width:300px" name="solde" class="form-control" placeholder=""
                                    value="">

                            </div>
                            </p>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>compte & Numero</td>
                                        <td>caisse</td>
                                        <td>date</td>
                                        <td>type operation</td>
                                        <td>Montant</td>
                                        <td>libelle</td>
                                        <td>Solde restante</td>
                                        <td>Action</td>
                                        <td>Action</td>


                                    </tr>
                                    <tr>



                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($caisse_details as $caisse_detail)
                                        <tr>
                                            <td>{{ $caisse_detail->id }}</td>
                                            <td>{{ $caisse_detail->nom_compte }} &nbsp {{ $caisse_detail->numero_compte }}
                                            </td>
                                            <td>{{ $caisse_detail->numero_caisse }} </td>
                                            <td>{{ $caisse_detail->date }}</td>
                                            <td>{{ $caisse_detail->type }}</td>
                                            <td>{{ $caisse_detail->somme }}</td>
                                            <td>{{ $caisse_detail->libelle }}</td>
                                            <td>{{ $caisse_detail->solde }}</td>

                                            {{-- <td><a
                                                    href="caisse_details/edit/{{ $caisse_detail->id }}"
                                                    class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-edit">modifier</span></a>
                                                --}}

                                                {{--
                                            <td> <a href="caisse_details/edit/{{ $caisse_detail->id }}" type="button"
                                                    class="btn btn-sm btn-success">Edit</a> --}}
                                                {{--
                                            <td><a href="{{ route('caisse_details.update', $caisse_detail->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <span class="glyphicon glyphicon-edit">Edit</span></a>

                                            </td> --}}
                                            <td>

                                                <a href="{{ route('caisse_details.edit', $caisse_detail->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                            </td>


                                            <td>
                                                <form action="{{ route('caisse_details.destroy', $caisse_detail->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Voulez vous supprimer cette caisse detail ?')"
                                                        class="btn btn-danger btn-sm">
                                                        <span class="glyphicon glyphicon-trash">Delete</span>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            <tfoot>
                            <td>total</td>
                             <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                        </tfoot>
                            </table>

                        @endsection()
