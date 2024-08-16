@extends('layouts.app2')

@section('title', '| Retraits')

@section('content')

<!-- Content Header (Page header) -->
<br><section class="content-header">
  <h1 style="color: rgb(58, 85, 77);">
    <i class="fa fa-suitcase"></i> Mes retraits
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-suitcase"></i> Mes retraits </li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
      <section class="content">
        @include('inc.messages')
        <div class="row">
          <div class="col-md-12">
              <div class="box box-solid">
                  <div class="box-header with-border">
                      <h4 class="box-tite"><b> Liste de mes retraits</b></h4>
                      {{-- <h3 class="box-title">Administration des utilisateurs</h3> --}}
                      {{-- {{-- <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Rôles</a> --}}
                      {{-- {{-- <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a> --}}
                  </div>
                  <!-- /.box-header -->
                    <div class="table-responsive">
                      <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>Date de dépôt</th>
                                      <th>Date de retrait</th>
                                      <th>Montant total</th>
                                      <th>Réduction</th>
                                      <th>Avance payée</th>
                                      <th>Etat</th>

                                      <th>Operations</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  @foreach ($deposits as $deposit)
                                  <tr>

                                      <td>{{ $deposit->deposit_date->format('d/m/Y à H:i') }}</td>
                                      <td>{{ $deposit->retrieve_date->format('d/m/Y à H:i') }}</td>
                                      <td>{{ $deposit->total }}</td>
                                      <td>{{ $deposit->discount }}</td>
                                      <td>{{ $deposit->advanced }}</td>
                                      <td>{{ $deposit->status }}</td>
                                      {{-- Retrieve array of roles associated to a user and convert to string --}}
                                      <td>
                                      <a href="{{--{{ route('customer.details', $deposit->id) }}--}}#" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;"><i class="fa fa-info"></i> Consulter</a>

                                      {{-- <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $deposit->id}})" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a> --}}

                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>

                          </table>
                      </div>
                    </div>
<div class="box-footer">
                    <a onclick="history.back()" class="btn bg-olive" style="border-radius: 5px;">Retour</a>
                    </di
                    v>
              </div>
          </div>
      </div>

        {{-- <div class="text-center">
            En Développement
        </div> --}}
        
    </section>
        
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