{{-- \resources\views\Promos\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Editer Promo Spéciale')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Promo Spéciale
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer Promo Spéciale</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Promo Spéciale</h3>
                </div>
                <!-- /.box-header -->

            <form action="{{ route('promospec.update', $promospec->id) }}" method="POST">
                @method("PATCH")
                @csrf
                <div class="box-body">

                  <div class="col-xs-12">
                  <div class="form-group">
                      <label >Code Promo</label>
                      <input type="text" id="title" class="form-control" name="code" value="{{ $promospec->code }}"/>
                  </div>
                  </div>

                  <div class="col-xs-12">
                      <div class="form-group">
                      <label>Pourcentage de remise</label>
                      <input type="number" class="form-control" name="percentage" value="{{ $promospec->percentage }}"/>
                      </div>
                  </div>

                  <div class="col-xs-12">
                    <div class="form-group">
                    <label>Nombre de clients <span style="color: red;">*</span></label>
                    <input type="number" class="form-control" name="nbr_client" value="{{ $promospec->nbr_client }}"/>
                    </div>
                </div>

                  <div class="col-xs-12">
                    <div class="form-group">
                    <label>Date butoire de la promo</label>
                    <input type="date" class="form-control" name="ending_date" value="{{ $promospec->ending_date }}"/>
                    </div>
                </div>
                <div class="col-xs-12">
                  <div class="form-group">
                  <label>Heure butoire</label>
                  <input type="time" class="form-control" name="ending_time" value="{{ $promospec->ending_time }}"/>
                  </div>
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
