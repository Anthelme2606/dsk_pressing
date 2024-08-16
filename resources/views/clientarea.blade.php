@extends('layouts.app2')

@section('content')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63fd7667cb765bbf"></script>
<!-- Content Header (Page header) -->
    <br><section class="content-header">
      <h4>
        <b>Espace client</b>
      </h4>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-smile-o"></i> Espace client</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="panel panel-default">
          <div class="panel-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
          </div>
      </div>
      <!-- Small boxes (Stat box) -->
      {{-- @can('Roles Administration & Permission') --}}
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-" style="background-color: rgb(54, 117, 98); color:white;">
          {{-- style="background-color: rgb(78, 199, 163); color:white;" --}}
            <div class="inner">
              <h3 style="font-family: georgia;">{{ $countDeposit }}</h3>

              <p>Dépots effectués</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            {{-- <a href="{{ route('mydeposits') }}" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
               <h3 style="font-family: georgia;">{{ $countDelivery }}</h3>

              <p>Retraits effectués</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            {{-- <a href="{{ route('mydeliveries') }}" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-" style="background-color: darkred; color:white;">
            <div class="inner">
              <h3 style="font-family: georgia;">{{ Auth::guard('client')->user()->account()->amount }}</h3>

              <p>Solde du compte</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            {{-- <a href="{{ route('users.index') }}#" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->



      </div>

      <br><div class="row">
        <div class="col-lg-12">
          <div class="box box-primary">
          <div class="box-header with-border">
               <div class="box-header with-border">
                 <h6 class="box-title"><i class='fa fa-search'></i> Rechercher un dépôt spécifique </h6>
               </div>
           <div class="box-body">

             <div class="row">
             <div class='col-lg-4 col-lg-offset-4'>
               <div class="form-group">
                 <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher" />
               </div>
             </div>
           </div>

            <div class="table-responsive">
             <h5 class="text-align: center;"><b>Nombre total de dépôts(s) :</b><span id="total_records" style="font-family: georgia; font-size:24px; font-weight:600; color:rgb(54, 117, 98);"> {{ $countDeposit }}</span></h5>
             <br><table id="example2" class="table table-bordered table-hover">
              <thead>
               <tr>
                <th>N°</th>
                <th>Code dépôt</th>
                <th>Date de dépôt</th>
                <th>Date de retrait</th>
                <th>Quantité</th>
                <th>Receptionniste</th>
                <th>Etat</th>
                <th>Montant total</th>
                <th>Actions</th>
               </tr>
              </thead>
              <tbody>
                @foreach ($myDeposits as $deposit)
                <tr>

                    <td>{{ $deposit->id }}</td>
                    <td>{{ $deposit->code }}</td>
                    <td>{{ $deposit->deposit_date->format('d/m/Y à H:m:s') }}</td>
                    <td>{{ $deposit->retrieve_date->format('d/m/Y à H:m:s') }}</td>
                    <td>{{ $deposit->nbr_articles() }}</td>
                    <td>{{ $deposit->user()->fullname }}</td>
                    <td>{{ $deposit->status }}</td>
                    <td>{{ $deposit->total }}</td>
                    {{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                    <a href="{{ route('client-show', $deposit->id) }}" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;"><i class="fa fa-info"></i> Consulter</a>

                    {{-- <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $depositUnit->id}})" data-target="#confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Supprimer</a> --}}

                    </td>
                </tr>
                @endforeach
            </tbody>
             </table>
            </div>

           </div>
          </div>
         </div>
        </div>

     </div>
    </section>

    <!-- /.content -->
@endsection

@push('search')
<script src="{{ asset('public/js/jquery-3.4.0.min.js') }}"></script>

<script>

  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  console.log(query);
  /*if(query===''){
    $('tbody').html("");
    $('#total_records').text("");
  }else{
    fetch_customer_data(query);

  }*/
  fetch_customer_data(query);
 });
});
</script>

@endpush
