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
      <div class='col-md-6 col-md-offset-3'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Groupe de Fidélisation</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->{{-- Form model binding to automatically populate our fields with user data --}}
                <form action="{{ route('loyalgroups.update', $loyalgroup->id) }}" class="form-horizontal form-box remove-margin" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                <div class="box-body">

                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Nom du Groupe</label>
                          <input type="text" name="title" class="form-control", value="{{ $loyalgroup->title }}"/>
                 
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Taux de remise (%)</label>
                        <input type="number" name="rate" class="form-control", value="{{ $loyalgroup->rate }}"/>
                      </div>
                  </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description du Groupe</label>
                        <input type="text" name="description" class="form-control" value="{{ $loyalgroup->description }}"/>
                      </div>
                  </div>

                  </div>
                <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn bg-olive btn-block">Editer</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

@endsection
