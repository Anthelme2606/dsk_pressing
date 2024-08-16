@extends('layouts.app')

@section('title', '| Dépôts')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-cart-arrow-down"></i> Dépôts
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cart-arrow-down"></i> Dépôts </li>
  </ol>
</section>

<div class="modal fade" id="confirm">
    <div class="modal-dialog">
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation de Suppression</h4>
                  </div>
                  <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <p>Etes-vous sûr(e) de vouloir supprimer ce Dépôt?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Non, Fermer</button>
                    <button type="submit" name="" class="btn btn-xs btn-danger" data-dismiss="modal" onclick="formSubmit()">Oui, Supprimer</button>
                 </div>
            </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title">Liste des dépôts</h5>
                        {{-- <select name="" class="form-control" id="">
                            <option value="">Hello</option>
                        </select> --}}
                        {{-- <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right"><i class="fa fa-cart-arrow-down"></i> Nouveau dépôt</a> --}}
                        {{-- <a href="{{ route('deliveries.index') }}" class="btn btn-default pull-right"><i class="fa fa-suitcase"></i> Retraits</a> --}}

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th style="width: 10%">Code</th>
                                        <th style="width: 15%">Receptionniste</th>
                                        <th>Date dépôt</th>
                                        <th style="width: 15%">Date de retrait prévue</th>
                                        <th>Total Net</th>
                                        <th>Remise</th>
                                        <th>Total après remise</th>
                                        <th>Avance</th>
                                        <th>Reste</th>
                                        <th>Opérations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @foreach ($deposits as $deposit)
                                        <tr>
                                            <td style="display: none;">{{ $deposit->id }}</td>
                                            <td style="width: 10%">PE / {{ $deposit->id }}</td>
                                            <td style="width: 15%">{{ $deposit->user()->fullname }}</td>
                                            <td>{{ $deposit->deposit_date}}</td>
                                            <td style="width: 15%">{{ $deposit->retrieve_date }}</td>
                                            <td>{{ $deposit->total }}</td>
                                            <td>{{ $deposit->discount }}</td>
                                            <td>{{ $deposit->total - $deposit->discount  }}</td>
                                            <td>{{ $deposit->advanced }}</td>

                                                @php
                                                    $value = $deposit->total - $deposit->advanced - $deposit->discount;
                                                @endphp
                                                @if ($value < 0)
                                                <td style="color: green;">{{ - $value }} (Relicat)</td>
                                                @elseif ($value == 0)
                                                <td>{{ $value }} (Réglé)</td>
                                                @elseif ($value > 0)
                                                <td style="color: red;">{{ $value }} (Reste)</td>
                                                @endif

                                            <td>
                                                <form action="{{ route('validate_deposit', $deposit->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-suitcase"></i> Retrait</button>
                                                </form>

                                                <a href="{{ route('deposits.show', $deposit->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Voir</a>
                                                {{-- <a href="{{ route('deposits.facture', $deposit->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Facture</a> --}}
                                                <a href="{{ route('show_deposit', $deposit->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Voir details</a>
                                                <a href="{{ route('deposits.partial', $deposit->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-suitcase"></i> Retrait partiel</a>
                                                @role('admin|manager')
                                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $deposit->id}})" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
                                                @endrole
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>


                                    <tr>
                                        <td colspan="7" style="text-align: right;"><h4><b>Total des dé :</b></h4></td>
                                        <td><h4 style="color: darkred;"><b>{{$nbr_articles}} </b></h4></td>
                                    </tr>
                                  </tfoot>


                            </table>
                        </div>

                        <div class="box-footer">
                          <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right"><i class="fa fa-cart-arrow-down"></i> Nouveau Dépôt</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

@push('deposit')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("deposits.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush
