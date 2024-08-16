{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Code Promo')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter une promotion
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter </li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            @include('inc.messages')
            <div class='col-lg-6 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Pressing</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="{{ route('pressings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                                <div class="col-xs-12">
                                <div class="form-group">
                                    <label >Nom du pressing</label>
                                    <input type="text" id="title" class="form-control" name="name"/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label>Details du pressing</label>
                                    <input type="text" class="form-control" name="details"/>
                                    </div>
                                </div>
                                <div class="col-xs-12">

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
