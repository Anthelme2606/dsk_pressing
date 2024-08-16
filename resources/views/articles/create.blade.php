{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Article')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        <i class='fa fa-plus-square'></i> Ajouter Article
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Ajouter Article</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            @include('inc.messages')
            <div class='col-lg-7 col-lg-offset-2'>
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-tite"><b> Ajout d'un nouvel article</b></h4>
                        {{-- <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Article</h3> --}}
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Nom de l'article <span style="color: red;">*</span></label>
                                        <input type="text" id="title" class="form-control" name="name" value="{{ old('name') }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="description"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Prix Nettoyage classique <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="classic_price" value="{{ old('classic_price') }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Prix Repassage <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="repass_price" value="{{ old('repass_price') }}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Prix Nettoyage Express <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="express_price" value="{{ old("express_price") }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label>Image de l'article</label>
                                        <input type="file" name="image"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button class="btn bg-olive btn-block" type="submit" style="border-radius: 5px;">Ajouter</button>
                        </div>
                  </form>
                </div>
                <!-- /.box -->
            </div>
          </section>
          <!-- /.content -->

@endsection
