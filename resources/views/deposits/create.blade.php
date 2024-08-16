{{-- \resources\views\deposits\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Client')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Dépôt
          <small>#007612</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Nouveau Dépôt</li>
        </ol>
    </section>

<!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Spark PRESSING, Inc.
            <small class="pull-right">Date: {{ $date->format('d, F, Y') }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>


      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
              <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qté</th>
              <th>Article</th>
              <th>Désignation</th>
              <th>Montant</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($depositedarticles as $depositedarticle)
            <tr>
              <td>{{ $depositedarticle->quantity }}</td>
              <td>{{ $depositedarticle->article_title }}</td>
              <td>{{ $depositedarticle->designation }}</td>
              <td>{{ $depositedarticle->amount }}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">

          <p class="lead">Nouveau Dépôt :</p>

          {{ Form::open(array('url' => 'deposits', 'enctype' => 'multipart/form-data')) }}

                            {{ Form::hidden('client_id', $id, array('class' => 'form-control')) }}

                            <div class="form-group">
                                {{ Form::label('client_name', 'Nom du Client') }}
                                {{ Form::text('client_name', $name, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('quantity', 'Nombre d\'Article') }}
                                {{ Form::text('quantity', $nbre, array('class' => 'form-control')),  }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('total_net', 'Total NET') }}
                                {{ Form::text('total_net', $balance, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('taxe', 'Taxe') }}
                                {{ Form::text('taxe', $taxe, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('total_ttc', 'Total TTC') }}
                                {{ Form::text('total_ttc', $total, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('discount', 'Montant Versé') }}
                                {{ Form::text('discount', '', array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                              {{ Form::label('date_retrait', 'Date de Retrait') }}
                              {{ Form::date('date_retrait', '', array('class' => 'form-control')) }}
                            </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          {{ Form::submit('Ajouter', array('class' => 'btn bg-olive pull-right')) }}
        </div>
      </div>
      {{ Form::close() }}
    </section>
    <!-- /.content -->

@endsection
