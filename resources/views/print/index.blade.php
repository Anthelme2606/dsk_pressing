@extends('layouts.app')

@section('title', '| Dépôts')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-cart-arrow-down"></i> Logs d'impression
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cart-arrow-down"></i> Logs d'impression </li>
  </ol>
</section>




    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title">Liste des logs</h5>
                        {{-- <a href="{{ route('checkcustomer') }}" class="btn bg-olive pull-right"><i class="fa fa-cart-arrow-down"></i> Nouveau dépôt</a> --}}
                        {{-- <a href="{{ route('deliveries.index') }}" class="btn btn-default pull-right"><i class="fa fa-suitcase"></i> Retraits</a> --}}

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Code Dépôt</th>
                                        <th style="width: 15%">Client</th>
                                        <th>Utilisateur</th>
                                        <th>Date dépôt</th>
                                        <th style="width: 15%">Date de retrait prévu</th>

                                        <th>Nombre d'impression</th>
                                        <th>Opérations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @foreach ($deposits as $deposit)
                                        <tr>
                                            <td >Dépôt {{ $deposit->code }}</td>
                                             <td style="width: 10%">{{ $deposit->client }}</td>
                                             <td style="width: 10%">{{ $deposit->user }}</td>
                                             <td style="width: 10%">{{ $deposit->deposit_date }}</td>
                                             <td style="width: 10%">{{ $deposit->retrieve_date }}</td>
                                             <td style="width: 10%">{{ $deposit->code_count }}</td>
                                            {{--<td style="width: 15%">{{ $log->deposit()->client()->fullname }}</td>
                                            <td>{{ $log->deposit()->created_at}}</td>
                                            <td style="width: 15%">{{ $log->deposit()->retrieve_date }}</td>
                                            <td>{{ $log->user()->fullname}}</td>
                                            <td>{{ $log->created_at }}</td>
                                             --}}
                                            <td>
                                                <a href="{{ route('deposits.show', $deposit->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir le dépôt</a>
                                                <a href="javascript:;" data-toggle="modal" onclick="getDetails({{ $deposit->id}})" data-target="#confirm" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Détails</a>

                                            </td>
                                            <td>
                                                <div class="modal fade" id="confirm">
                                                    <div class="modal-dialog">
                                                        <form action="" id="deleteForm" method="post">
                                                            <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title">Détails d'impression</h4>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <table class="table table-bordered table-striped" id="details">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Utilisateur</th>
                                                                                <th>Date d'impression</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                                                 </div>
                                                            </div>
                                                        </form>
                                                    <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                </tbody>

                            </table>
                        </div>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
   function getDetails(id) {
       var url = '{{ route("print_per_deposit", ":id") }}';
       url = url.replace(':id', id);

       // Effectuer une requête AJAX GET
       $.ajax({
           url: url,
           type: 'GET',
           success: function(response) {
               var tableBody = $('#details tbody');
               tableBody.empty();

               $.each(response['details'], function(index, data) {
                   var row = '<tr>' +
                               '<td>' + data.user + '</td>' +
                               '<td>' + data.action_date + '</td>' +
                             '</tr>';
                   tableBody.append(row);
               });
           },
           error: function(xhr, status, error) {
               console.error(xhr.responseText);
           }
       });
   }
   </script>
@endsection

