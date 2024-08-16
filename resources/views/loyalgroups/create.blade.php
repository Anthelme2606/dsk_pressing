{{-- \resources\views\loyalgroups\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Groupe de Fidélisation')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        <i class='fa fa-plus-square'></i> Groupe de Fidélisation
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Groupe de Fidélisation</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            @include('inc.messages')
            <div class='col-lg-6 col-lg-offset-3'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-tite"><b> Ajouter un groupe de Fidélisation</b></h4>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->

                      <form action="{{ route('loyalgroups.store') }}" class="form-horizontal form-box remove-margin" method="POST" enctype="multipart/form-data">
                        @csrf
                      {{-- {{ Form::open(array('url' => 'loyalgroups', 'enctype' => 'multipart/form-data')) }} --}}
                      <div class="box-body">
                        
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Nom du Groupe <span style="color: red;">*</span></label>
                                  <input type="text" name="title" class="form-control" required/>
                                {{-- {{ Form::label('title', 'Nom du Groupe') }}
                                {{ Form::text('title', '', array('class' => 'form-control')) }} --}}
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Taux de Remise (%) <span style="color: red;">*</span></label>
                                <input type="number" name="rate" min="0" class="form-control" required/>
                                  {{-- {{ Form::label('rate', 'Taux de Remise (%)') }}
                                  {{ Form::number('rate', 0, array('class' => 'form-control')) }} --}}
                              </div>
                          </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" min="0" class="form-control"/>
                                  {{-- {{ Form::label('description', 'Description') }}
                                  {{ Form::textarea('description', '', array('class' => 'form-control')) }} --}}
                              </div>
                          </div>
                      </div>
                      <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-block bg-olive" style="border-radius: 5px;">Ajouter</button>
                      {{-- {{ Form::submit('Ajouter', array('class' => 'btn bg-olive btn-block')) }} --}}
                    </div>
                  {{-- {{ Form::close() }} --}}
                </div>
                <!-- /.box -->
            </div>
          </section>
          <!-- /.content -->

@endsection
