@extends('layouts.app')

@section('title', '| Promos Spéciales')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square"></i> Promos Spéciales
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-plus-square"></i> Promos Spéciales </li>
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
                    <p>Etes-vous sûr(e) de vouloir supprimer cette promo spéciale?</p>
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
                <h5 class="box-title">Promo Spéciale</h5>
                <a href="{{ route('promospec.create') }}" class="btn bg-olive pull-right"><i class='fa fa-plus-square'></i>  Ajouter Promo Spéciale </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Code promo</th>
                            <th>Pourcentage</th>
                            <th>Nombre de clients</th>
                            <th>Date butoire</th>
                            <th>Heure butoire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($promospecs as $promo)
                        <tr>

                            <td>{{ $promo->code }}</td>
                            <td>{{ $promo->percentage }}</td>
                            <td>{{ $promo->nbr_client }}</td>
                            <td>{{ $promo->ending_date }}</td>
                            <td>{{ $promo->ending_time }}</td>
                            <td>
                            <a href="{{ route('promospec.edit', $promo->id) }}" class="btn btn-info btn-xs" style="margin-right: 3px;"><i class="fa fa-edit"></i> Editer</a>

                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $promospec->id}})"
                            data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="box-footer clearfix">
              <a href="{{ route('promospec.create') }}" class="btn bg-olive"><i class='fa fa-plus-square'></i>  Ajouter Promo Spéciale</a>
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
         var url = '{{ route("promospec.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush

