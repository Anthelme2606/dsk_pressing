{{-- \resources\views\Agences\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Agence')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Agence
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Agence</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            @include('inc.messages')
            <div class='col-lg-6 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Agence</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="{{ route('agences.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                                <div class="col-xs-12">
                                <div class="form-group">
                                    <label >Nom de l'agence <span style="color: red;">*</span></label>
                                    <input type="text" id="title" class="form-control" name="name" required/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label>Adresse de l'agence <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="address" required/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group">
                                        <label>Contact de l'agence <span style="color: red;">*</span></label>
                                        <input id="phone" type="tel" name="phone" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Pays de l'agence <span style="color: red;">*</span></label>
                                    <select name="country_id" class="form-control" required>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                  <label>Pressing de l'agence <span style="color: red;">*</span></label>
                                  <select name="pressing_id" class="form-control" required>
                                      @foreach ($pressings as $pressing)
                                          <option value="{{ $pressing->id }}">{{ $pressing->name }}</option>
                                      @endforeach
                                  </select>
                                </div> --}}
                                <input type="hidden" name="pressing_id" value="{{ auth()->user()->agency()->pressing_id }}">

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
