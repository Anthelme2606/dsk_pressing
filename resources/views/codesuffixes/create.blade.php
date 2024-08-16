{{-- \resources\views\codesuffixes\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Suffixe Code')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Suffixe Code
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Suffixe Code</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            @include('inc.messages')
            <div class='col-lg-8 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Suffixe Code</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="{{ route('codesuffixes.store') }}" method="POST">
                        @csrf
                      <div class="box-body">

                            <div class="col-xs-12">
                              <div class="form-group">
                                <label for="title">Suffixe Code</label>
                                <input type="text" class="form-control" name="title" required/>
                              </div>
                              <div class="form-group">
                                <label for="title">Agence</label>
                                <select name="agency_id" id="agency_id" class="form-control" required>
                                    @foreach ($agences as $agence)
                                        <option value="{{ $agence->id }}">{{ $agence->name }}</option>
                                    @endforeach
                                </select>
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
