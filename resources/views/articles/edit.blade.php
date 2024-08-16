{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Editer Article')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Article
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer Article</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Article</h3>
                </div>
                <!-- /.box-header -->

            <form action="{{ route('articles.update', $article->id) }}" method="POST">
                @method("PATCH")
                @csrf
                <div class="box-body">

                        <div class="col-xs-12">
                        <div class="form-group">
                            <label >Nom de l'article</label>
                            <input type="text" id="title" class="form-control" name="name" value="{{ $article->name }}"/>
                        </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $article->description }}"/>
                            </div>
                        </div>
                        <div class="col-xs-12">
                        <div class="form-group">
                            <label>Prix de lavage classique</label>
                            <input type="number" class="form-control" name="classic_price" value="{{ $article->classic_price }}"/>
                        </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Prix de repassage</label>
                                <input type="number" class="form-control" name="repass_price" value="{{ $article->repass_price }}"/>
                            </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Prix de lavage express</label>
                                    <input type="number" class="form-control" name="express_price" value="{{ $article->express_price }}"/>
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
