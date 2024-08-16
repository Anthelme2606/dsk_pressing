{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Editer Suffixe Code')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Suffixe Code
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer Suffixe Code</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Suffixe Code</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('codesuffixes.update', $codesuffixe->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="box-body">

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="title">Suffixe Code</label>
                            <input type="text" name="title" class="form-control" value="{{ $codesuffixe->title }}"/>
                        </div>
                        <div class="form-group">
                            <label for="title">Agence</label>
                            <select name="agency_id" id="agency_id">
                                @foreach ($agences as $agence)
                                <option value="{{ $agence->id }}" {{ $agence->id == $codesuffixe->agency_id ? "selected": "" }}>{{ $agence->name }}</option>
                                @endforeach
                            </select>
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
