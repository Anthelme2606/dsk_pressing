{{-- \resources\views\stats\search.blade.php --}}
@extends('layouts.app')

@section('title', '| Recherche sur Dépôt par client')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-search'></i> Recherche de dépôt par client
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-search'></i> Recherche de dépôt par client</li>
      </ol>
    </section>

    <section class="content">
    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Recherche</h3>
            </div>

            <form role="form" method="POST" action="{{ route('searchdeposit') }}">
            	@csrf
	            <div class="box-body">
	              <div class="row">
                  <div class="col-lg-3"></div>

                    <div class="col-lg-6">
                        <h4 class="text-center">Recherche de dépôt par client</h4><hr>
                        <input type="hidden" name="customer_id" id="customer_id"  class="form-control">
                        <div class="form-group">
                            <!--<label>Nom du client</label>-->
                            <input type="text" name="customer" id="customer" placeholder="Entrer le nom du client" class="form-control">
                        </div>
                        <div id="customer_list"></div>
                    </div>

                    <div class="col-lg-3"></div>

    	             <div class="col-xs-4">
                    <label class="">Du</label>
	                  <input type="date" class="form-control" name="date_debut" id="date_debut" placeholder="Date de début" required>
	                </div>
	                <div class="col-xs-4">
                    <label class="">Au</label>
	                  <input type="date" class="form-control" name="date_fin" id="date_fin" placeholder="Date de Fin" required>
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

@push('getcustomer')
<script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
<script type="text/javascript">
//     $(document).ready(function(){

//     fetch_customer_data();

//     function fetch_customer_data(query = '')
//     {
//         $.ajax({
//             url:"{{ route('getUserList') }}",
//             method:'GET',
//             data:{'customer':query},
//             dataType:'json',
//             success:function(data)
//             {
//                 // console.log(data)
//                 $('tbody').html(data.table_data);
//                 // $('#toptal_records').text(data.total_data);
//             }
//         })
//     }

//     $(document).on('keyup', '#customer', function(){
//         var query = $(this).val();
//         console.log(query);

//         fetch_customer_data(query);
//     });
// });

// jQuery wait till the page is fullt loaded
            $(document).ready(function () {
                // keyup function looks at the keys typed on the search box
                $('#customer').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable
                    var query = $(this).val();

                    $.ajax({
                          // assign a controller function to perform search action - route name is search
                          url:"{{ route('getUserList') }}",
                          // since we are getting data methos is assigned as GET
                          type:"GET",
                          // data are sent the server
                          data:{'customer':query},
                          // if search is succcessfully done, this callback function is called
                          success:function (data) {
                            console.log(data)
                              // print the search results in the div called country_list(id)
                             $('#customer_list').html(data);
                          }
                      });
                    // call to an ajax function
                    // if(query ==''){

                    // //   $('#customer_list').html("");
                    // //   $('#customer_id').val("");
                    // }else{

                    //     $.ajax({
                    //       // assign a controller function to perform search action - route name is search
                    //       url:"{{ route('getCustomer') }}",
                    //       // since we are getting data methos is assigned as GET
                    //       type:"GET",
                    //       // data are sent the server
                    //       data:{'customer':query},
                    //       // if search is succcessfully done, this callback function is called
                    //       success:function (data) {
                    //         console.log(data)
                    //           // print the search results in the div called country_list(id)
                    //          $('#customer_list').html(data);
                    //       }
                    //   })
                      // end of ajax call
                    // }
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).text();
                    // assign the value to the search box
                    $('#customer_id').val($(this).attr('data-id'))
                    $('#customer').val(value);
                    // after click is done, search results segment is made empty
                    $('#customer_list').html("");
                });
            });

   var d = new Date();
   var d1 = new Date();
   d1.setDate(d1.getDate()-30);
   document.getElementById('date_debut').valueAsDate = d1;
   document.getElementById('date_fin').valueAsDate = d;
</script>
@endpush
