{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Editer Groupe de Fidélisation')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Groupes de Fidélisation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Groupes de Fidélisation</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i>Fidéliser un client</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('clientgroups.store') }}" method="POST">
                    @csrf
                    <div class="box-body">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="client_id">Nom du client : {{ $client->fullname }}</label>

                      </div>
                  </div>
                  <input type="hidden" value="{{ $client->id }}" name="client_id">


                  <div class="col-md-12">
                    <div class="form-group">
                    <label for="group_id">Groupe de fidélisation</label>
                        <select name="group_id" class="form-control">
                            @foreach ($loyalgroups as $loyalgroup)
                            <option value="{{ $loyalgroup->id }}">{{ $loyalgroup->title }} -- {{ $loyalgroup->rate }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


              </div>
                <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn bg-olive btn-block">Fidéliser</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

@endsection

@push('rate')
<script type="text/javascript">
  $('#group').on('change', function (e) {

    var value = $('#group').val();

    $('#rate').val(value);

  });
</script>
@endpush
