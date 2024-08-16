{{-- \resources\views\deliveryhours\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Heure de retrait')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Heure de retrait
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Heure de retrait</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            @include('inc.messages')
            <div class='col-lg-8 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Heure de retrait</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="{{ route('deliveryhours.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="box-body">


                            <div class="col-md-12">
                              <div class="col-xs-4">
                                <div class="form-group">
                                  <label for="lavage_hour">Durée de Lavage simple (Heure)</label>
                                  <input type="number" class="form-control" name="lavage_hour"/>
                                </div>
                              </div>

                            <div class="col-xs-4">
                              <div class="form-group">
                                <label for="repassage_hour">Durée de repassage (Heure)</label>
                                <input type="number" name="repassage_hour" class="form-control">
                              <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="express_hour">Durée de nettoyage Express (Heure)</label>
                                    <input type="number" name="express_hour" class="form-control">
                                </div>
                              </div>
                          </div>

                      </div>
                      <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn bg-olive btn-block">Ajouter</button>
                    </div>
                </form>
                </div>
                <!-- /.box -->
            </div>
          </section>
          <!-- /.content -->

@endsection
