@extends('layouts.app')

@section('title', '| Entrées et sorties')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square"></i> Entrées et sorties
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus-square"></i> Entrées et sorties </li>
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
                    <p>Etes-vous sûr(e) de vouloir supprimer cette action?</p>
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

<div class="modal fade" id="validate">
    <div class="modal-dialog">
        <form action="" id="validateForm" method="post">
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Validation de l'action</h4>
                  </div>
                  <div class="modal-body">
                    {{ csrf_field() }}
                    @method('PUT')
                    <p>Etes-vous sûr(e) de vouloir confirmer cette action?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Non, Fermer</button>
                    <button type="submit" name="" class="btn btn-xs btn-success" data-dismiss="modal" onclick="validateFormSubmit()">Oui, Valider</button>
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
                <h5 class="box-title">Mouvement</h5>
                <h5>Total des entrées: {{ $in_price }}</h5>
                <h5>Total des sorties: {{ $out_price }}</h5>
                <a href="{{ route('in_out.create') }}" class="btn bg-olive pull-right"><i class='fa fa-plus-square'></i>  Ajouter Entrée/Sortie</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Montant</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Effectué le</th>
                            @role('manager')
                            <th>Statut</th>
                            @endrole
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($in_outs as $in_out)
                        <tr>

                            <td>{{ $in_out->libelle }}</td>
                            <td>{{ $in_out->montant }}</td>
                            <td>
                                @if($in_out->type == 'in')
                                    <span class="badge" style="background-color: green; color: white;">Entrée</span>
                                @else
                                    <span class="badge" style="background-color: red; color: white;">Sortie</span>
                                @endif
                            </td>
                            <td>{{ $in_out->action_date }}</td>
                            <td>{{ $in_out->created_at }}</td>
                            @role('manager')
                            <td>
                                @if ($in_out->status == 0)
                                    <span class="badge" style="background-color: red; color: white;">Non validé</span>
                                @else
                                    <span class="badge" style="background-color: green; color: white;">Validé</span>
                                @endif
                            </td>
                            @endrole
                            <td>
                            <a href="{{ route('in_out.edit', $in_out->id) }}" class="btn btn-info btn-xs" style="margin-right: 3px;"><i class="fa fa-edit"></i> Editer</a>

                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $in_out->id}})"
                            data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
                            @role('manager')
                            @if($in_out->status == 0)
                            <a href="javascript:;" data-toggle="modal" onclick="validateData({{ $in_out->id}})"
                                data-target="#validate" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Validation</a>
                            </td>
                            @endif
                            @endrole
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="box-footer clearfix">
              <a href="{{ route('in_out.create') }}" class="btn bg-olive"><i class='fa fa-plus-square'></i>  Ajouter une entrée/sortie</a>
            </div>
        </div>
    </div>
</div>

    </section>
    <!-- /.content -->

@endsection
@push('script')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("in_out.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

     function confirmData(id)
     {
         var id = id;
         var url = '{{ route("in_out.validate", ":id") }}';
         url = url.replace(':id', id);
         $("#validateForm").attr('action', url);
     }

     function validateFormSubmit()
     {
         $("#validateForm").submit();
     }
</script>
@endpush

