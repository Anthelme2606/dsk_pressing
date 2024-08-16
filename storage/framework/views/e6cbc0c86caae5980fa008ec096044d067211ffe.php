<?php $__env->startSection('content'); ?>
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
              <?php if(session('status')): ?>
                  <div class="alert alert-success" role="alert">
                      <?php echo e(session('status')); ?>

                  </div>
              <?php endif; ?>
          </div>
      </div>
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-" style="background-color: rgb(54, 117, 98); color:white;">
          
            <div class="inner">
              <h3 style="font-family: georgia;"><?php echo e($countDeposit); ?></h3>

              <p>Dépots effectués</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
               <h3 style="font-family: georgia;"><?php echo e($countDelivery); ?></h3>

              <p>Retraits effectués</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-" style="background-color: darkred; color:white;">
            <div class="inner">
              <h3 style="font-family: georgia;"><?php echo e(Auth::guard('client')->user()->account()->amount); ?></h3>

              <p>Solde du compte</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            
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
             <h5 class="text-align: center;"><b>Nombre total de dépôts(s) :</b><span id="total_records" style="font-family: georgia; font-size:24px; font-weight:600; color:rgb(54, 117, 98);"> <?php echo e($countDeposit); ?></span></h5>
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
                <?php $__currentLoopData = $myDeposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($deposit->id); ?></td>
                    <td><?php echo e($deposit->code); ?></td>
                    <td><?php echo e($deposit->deposit_date->format('d/m/Y à H:m:s')); ?></td>
                    <td><?php echo e($deposit->retrieve_date->format('d/m/Y à H:m:s')); ?></td>
                    <td><?php echo e($deposit->nbr_articles()); ?></td>
                    <td><?php echo e($deposit->user()->fullname); ?></td>
                    <td><?php echo e($deposit->status); ?></td>
                    <td><?php echo e($deposit->total); ?></td>
                    
                    <td>
                    <a href="<?php echo e(route('client-show', $deposit->id)); ?>" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;"><i class="fa fa-info"></i> Consulter</a>

                    

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->startPush('search'); ?>
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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/clientarea.blade.php ENDPATH**/ ?>