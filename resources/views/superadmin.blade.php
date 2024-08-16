@extends('layouts.app3')

@section('content')

<!-- Content Header (Page header) -->
    <br><section class="content-header">
      <h4>
        <b>Espace Superadmin - SPARK</b>
      </h4>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-smile-o"></i> Espace Superadmin</li>
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
              <h3 style="font-family: georgia;">{{ $pressings }}</h3>  

              <p>Total des pressings</p>
            </div>
            <div class="icon">
            </div>
            {{-- <a href="{{ route('mydeposits') }}" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
               <h3 style="font-family: georgia;">{{ $agences }}</h3> 

              <p>Total des agences</p>
            </div>
            <div class="icon">
            </div>
            {{-- <a href="{{ route('mydeliveries') }}" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-" style="background-color: rgb(160, 146, 18); color:white;">
            <div class="inner">
              <h3 style="font-family: georgia;">{{ $users }}</h3>

              <p>Total des admins</p>
            </div>
            <div class="icon">
            </div>
            {{-- <a href="{{ route('users.index') }}#" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
          
      </div>

      
    </section>

    <!-- /.content -->
@endsection

@push('search')
<script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>

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
