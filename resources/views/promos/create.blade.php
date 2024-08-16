{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Promo')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Promo
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Promo</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            @include('inc.messages')
            <div class='col-lg-6 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Promo</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="{{ route('promos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                                <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Code Promo <span style="color: red;">*</span></label>
                                    <input type="text" id="title" class="form-control" name="code" required/>
                                </div>
                                <div class="form-group">
                                    <label>Quota <span style="color: red;">*</span></label>
                                    <input type="number" id="title" class="form-control" name="quota" required/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label>Pourcentage de remise <span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" name="percentage" required/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                  <div class="form-group">
                                  <label>Date butoire de la promo <span style="color: red;">*</span></label>
                                  <input type="date" class="form-control" name="ending_date" required/>
                                  </div>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group">
                                <label>Heure butoire</label>
                                <input type="time" class="form-control" name="ending_time"/>
                                </div>
                            </div>

                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button class="btn bg-olive btn-block" type="submit">Ajouter</button>
                        </div>
                  </form>
                </div>
                <!-- /.box -->
            </div>
          </section>
          <!-- /.content -->

@endsection
