{{-- \resources\views\deliveries\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Nouveau retrait')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-suitcase'></i> Nouveau retrait
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-suitcase'></i> Nouveau retrait</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      @include('inc.messages')
      <div class='col-lg-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"> Nouveau retrait</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  {{ Form::open(array('url' => 'deliveries', 'enctype' => 'multipart/form-data')) }}
                    <div class="box-body">
                          {{ Form::hidden('deposit_id', $deposit->id, array('class' => 'form-control')) }}
                          {{ Form::hidden('deposit_code', $deposit->deposit_code, array('class' => 'form-control')) }}
                          {{ Form::hidden('client_id', $deposit->client_id, array('class' => 'form-control')) }}

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="col-lg-4">
                                  <div class="form-group">
                                    {{ Form::label('date_depot', 'Date du dépôt') }}
                                    {{ Form::date('date_depot', $date, array('class' => 'form-control')) }}
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('quantity', 'Nombre d\'article(s)') }}
                                      {{ Form::number('quantity', $deposit->quantity, array('class' => 'form-control')) }}
                                  </div>

                                  <div class="form-group">
                                    {{ Form::label('date_retrait', 'Date de retrait') }}
                                    {{ Form::date('date_retrait', $date_now, array('class' => 'form-control')) }}
                                  </div>
                              </div>

                              <div class="col-lg-4">
                                    <div class="form-group">
                                      {{ Form::label('deposit_amount', 'Montant du dépôt') }}
                                      {{ Form::number('deposit_amount', $deposit->deposit_amount, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                      {{ Form::label('left_pay', 'Reste à payer') }}
                                      {{ Form::number('left_pay', $deposit->left_pay, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                      {{ Form::label('mode_reglement', 'Mode de règlement') }}
                                      {!! Form::select('mode_reglement', [null => 'Selectionner'] + 
                                      ['RESTE' => 'RESTE','FLOOZ'=>'FLOOZ','T-MONEY'=>'T-MONEY','AUTRE'=>'AUTRE'], null,
                                      ['class' => 'form-control']) !!}
                                    </div>
                              </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                      {{ Form::label('discount', 'Remise') }}
                                      {{ Form::number('discount', $deposit->discount, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                      {{ Form::label('amount_paid', 'Montant versé') }}
                                      {{ Form::number('amount_paid', $deposit->left_pay, array('class' => 'form-control','required' => 'required')) }}
                                    </div>

                                    <div class="form-group" style="display: none;" id="reference_div">
                                      {{ Form::label('reference', 'Reference') }}
                                      {{ Form::text('reference','', array('class' => 'form-control')) }}
                                    </div>
                              </div>

                            </div>
                          </div>
                    <!-- /.box-body -->
                  </div>

                  <div class="box-footer">
                    {{ Form::submit('Valider retrait', array('class' => 'btn btn-flat btn-block bg-olive')) }}
                  </div>
            {{ Form::close() }}
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->


@endsection

@push('scriptdelivery')

<script type="text/javascript">

$('#mode_reglement').on('change', function (e) {
  var optionSelected = $("option:selected", this);
  var valueSelected = this.value;
  if((valueSelected === 'FLOOZ') ||  (valueSelected === 'T-MONEY') ||  (valueSelected === 'AUTRE')){
    $('#reference_div').show();
  }else{
    $('#reference_div').hide()
  }
});
</script>
@endpush
