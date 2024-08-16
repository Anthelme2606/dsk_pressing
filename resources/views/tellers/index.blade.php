@extends('layouts.app')

@section('title', '| Caissiers')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-users"></i> Caissiers
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-users"></i> Caissiers</li>
  </ol>
</section>

<div class="modal fade" id="confirm">
    <div class="modal-dialog">
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation de suppression</h4>
                  </div>
                  <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <p>Etes-vous sûr(e) de vouloir supprimer cet caissier?</p>
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
                        <h4 class="box-tite"><b>Administration des caissiers</b></h4>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom complet</th>
                                        <th>Email</th>
                                        <th>Date/Heure d'ajout</th>
                                        <th>Rôles</th>
                                        @if(auth()->user()->getRoleNames()->contains("admin"))
                                        <th>Agence</th>
                                        @endif
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>

                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('d/m/Y à H:i') }}</td>
                                        <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                        @if(auth()->user()->getRoleNames()->contains("admin"))
                                        <td>{{ $user->agency()->name }}</td>
                                        @endif
                                        <td>
                                        <a href="{{ route('tellers.edit', $user->id) }}" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;"><i class="fa fa-edit"></i> Editer</a>

                                        <!--<a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $user->id}})" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>-->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="box-footer">
                          <a href="{{ route('tellers.create') }}" class="btn bg-olive">Ajouter caissier</a>
                        </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

@push('user')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("users.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush
