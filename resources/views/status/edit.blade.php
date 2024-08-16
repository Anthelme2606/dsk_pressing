{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Editer Etat')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Etat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer Etat</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-4 col-md-offset-4'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Etat</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('status.update', $etat->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Titre</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $etat->title }}">
                        </div>
                    </div>
                    </div>

                    <div class="box-footer">
                        <button class="btn bg-olive btn-block">Editer</button>
                    </div>
                </form>

          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

@endsection
