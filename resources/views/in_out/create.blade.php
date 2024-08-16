{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Entrée/Sortie')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Ajouter Entrée/Sortie
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Entrée/Sortie</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            @include('inc.messages')
            <div class='col-lg-6 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Entrée/Sortie</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="{{ route('in_out.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                                <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Libellé <span style="color: red;">*</span></label>
                                    <input type="text" id="libelle" class="form-control" name="libelle" required/>
                                </div>
                                <div class="form-group">
                                    <label>Montant <span style="color: red;">*</span></label>
                                    <input type="number" id="montant" class="form-control" name="montant" required/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label>Type <span style="color: red;">*</span></label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="in">Entrée</option>
                                        <option value="out">Sortie</option>
                                    </select>
                                    
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                  <div class="form-group">
                                  <label>Date <span style="color: red;">*</span></label>
                                  <input type="date" class="form-control" name="action_date" required/>
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
