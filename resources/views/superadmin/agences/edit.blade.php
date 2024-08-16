
{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app3')

@section('title', '| Editer Article')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Agence      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer Agence</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Agence</h3>
                </div>
                <!-- /.box-header -->

            <form action="{{ route('superadmin.agences.update', $agence->id) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="box-body">

                        <div class="col-xs-12">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label >Nom de l'agence</label>
                                    <input type="text" id="title" class="form-control" name="name" value="{{ $agence->name }}"/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label>Adresse de l'agence</label>
                                    <input type="text" class="form-control" name="address" value="{{ $agence->address }}"/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group">
                                        <label>Contact de l'agence</label>
                                    <input type="tel" class="form-control" name="contact" value="{{ $agence->contact }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Pays de l'agence</label>
                                    <select name="country_id" class="form-control">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
