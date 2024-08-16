<?php $__env->startSection('title', '| Ajouter Groupe de Fidélisation'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Fidélisations
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Fidélisations</li>
      </ol>
    </section>

<!-- Main content -->
          <section class="content">
            <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-lg-12">
                  <div class="box box-primary">
                  <div class="box-header with-border">
                       <div class="box-header with-border">
                         <h5 class="box-title"><i class='fa fa-search'></i> Recherche de clients </h5>
                       </div>
                   <div class="box-body">

                     <div class="row">
                     <div class='col-lg-4 col-lg-offset-4'>
                       <div class="form-group">
                         <input type="text" name="search" id="search" class="form-control" placeholder="Recherche" />
                       </div>
                     </div>
                   </div>

                    <div class="table-responsive">
                     <h5 ><b>Nombre de Client(s) :</b> <span id="total_records"></span></h5>
                     <table id="example2" class="table table-bordered table-hover">
                      <thead>
                       <tr>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Action</th>
                       </tr>
                      </thead>
                      <tbody>

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

<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('public/js/jquery-3.4.0.min.js')); ?>"></script>

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
   url:"<?php echo e(route('customer_search.client-group')); ?>",
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/clientgroups/create.blade.php ENDPATH**/ ?>