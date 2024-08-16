@extends('layouts.app')

@section('title', '| Clients')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
    <i class="fa fa-smile-o"></i> Clients
  </h4>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-smile-o"></i> Clients </li>
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
                    @csrf
                    @method('DELETE')
                    <p>Etes-vous sûr(e) de vouloir supprimer ce Client?</p>
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
                        <h4 class="box-tite"><b>Administration des Clients</b></h4>
                        {{-- <a href="{{ route('deliveries.index') }}" class="btn btn-default pull-right"><i class="fa fa-suitcase"></i> Retraits</a> --}}
                        {{-- <a href="{{ route('deposits.index') }}" class="btn btn-default pull-right"><i class="fa fa-cart-arrow-down"></i> Dépôts</a> --}}
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom complet</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Adresse</th>
                                        <th>Numero de compte</th>
                                        <th>Solde</th>
                                        <th>Sponsorship code</th>
                                        <th>Date/Heure d'Ajout</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($clients as $client)
                                    <tr>

                                        <td>{{ $client->fullname }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->phone_number }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>{{ $client->account($client->account_id)["num"] }}</td>
                                        <td>{{ $client->account($client->account_id)["amount"] }}</td>
                                        <td>{{ $client->sponsorship($client->sponsorship_code)["sponsor_code"] }}</td>
                                        <td>{{ $client->created_at->format('F d, Y h:ia') }}</td>
                                        <td>
                                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-xs pull-left" style="margin-right: 3px;"><i class="fa fa-edit"></i> Editer</a>

                                        {{-- @can('Roles Administration & Permission') --}}
                                        @role('admin')
                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $client->id}})" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
                                        @endrole
                                        {{-- @endcan --}}

                                        {{-- @can('Admin Permissions') --}}
                                        {{-- <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $client->id}})" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a> --}}
                                        {{-- @endcan--}}

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="box-footer clearfix">
                          <a href="{{ route('clients.create') }}" class="btn bg-olive" style="border-radius: 3px;"><i class="fa fa-plus"></i>  Ajouter Client</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

@push('client')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("clients.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush
