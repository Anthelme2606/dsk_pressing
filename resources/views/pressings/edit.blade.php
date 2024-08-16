{{-- \resources\views\Pressings\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Editer Pressing')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Pressing
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer Pressing</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Pressing</h3>
                </div>
                <!-- /.box-header -->

            <form action="{{ route('pressings.update', $pressing->id) }}" method="POST">
                @method("PATCH")
                @csrf
                <div class="box-body">

                        <div class="col-xs-12">
                        <div class="form-group">
                            <label >Nom du Pressing</label>
                            <input type="text" id="title" class="form-control" name="name" value="{{ $pressing->name }}" required/>
                        </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                            <label>Courte description</label>
                            <input type="text" class="form-control" name="details" value="{{ $pressing->details }}" required/>
                            </div>
                        </div>
                        <div class="col-xs-12">

                        </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn bg-olive btn-block" type="submit">Editer</button>
                </div>
          </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

@endsection
