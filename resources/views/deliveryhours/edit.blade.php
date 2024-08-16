{{-- \resources\views\deliveryhours\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Editer Heure de retrait')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Heure de retrait
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer eure de retrait</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer eure de retrait</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('deliveryhours.update', $deliveryhour->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                <div class="box-body">

                    <div class="col-xs-4">
                        <div class="form-group">
                          <label for="lavage_hour">Durée de Lavage simple (Heure)</label>
                          <input type="number" class="form-control" name="lavage_hour" value="{{ $deliveryhour->lavage_hour }}"/>
                        </div>
                      </div>

                    <div class="col-xs-4">
                      <div class="form-group">
                        <label for="repassage_hour">Durée de repassage (Heure)</label>
                        <input type="number" name="repassage_hour" class="form-control" value="{{ $deliveryhour->repassage_hour }}">
                      </div>
                    </div>

                      <div class="col-xs-4">
                        <div class="form-group">
                            <label for="express_hour">Durée de nettoyage Express (Heure)</label>
                            <input type="number" name="express_hour" class="form-control" value="{{ $deliveryhour->express_hour }}">
                        </div>
                      </div>
                  </div>
                <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn bg-olive">Editer</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

@endsection
