{{-- \resources\views\stats\search.blade.php --}}
@extends('layouts.app')

@section('title', '| Recherche sur Vente')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-search'></i> Retrait de la journée
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-search'></i> Retrait de la journée</li>
      </ol>
    </section>

    <section class="content">
      @include('inc.messages')
    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Recherche</h3>
            </div>

            <form role="form" method="POST" action="{{ route('totake') }}">
            	@csrf
	            <div class="box-body">
	              <div class="row">
	                <div class="col-xs-4">
                    <label class="">Date de retrait</label>
	                  <input type="date" class="form-control" name="date_totake"  placeholder="Date de retrait" value="{{$date}}">
	                </div>
	                <div class="col-xs-4">
	                  <button class="btn bg-olive" type="submit">Rechercher <i class="fa fa-search" style="font-size: 1em"></i></button>
	                </div>
	              </div>
	            </div>
            <!-- /.box-body -->
        	</form>
          </div>
      </section>

@endsection

@push('control')
<script type="text/javascript">
   var d = new Date();
   document.getElementById('date_totake').valueAsDate = d;
</script>
@endpush
