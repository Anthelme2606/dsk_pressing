<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
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
              Vous êtes connecté!
          </div>
      </div>
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
          <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'caissier|manager')): ?>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                   <h3><?php echo e($nbre_deposit); ?></h3>

                  <p>Retraits en attente</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo e(route('get_list_deposits')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                   <h3><?php echo e($nbre_retrait); ?></h3>

                  <p>Retraits effectuées</p>
                </div>
                <div class="icon">
                  <i class="ion ion-briefcase"></i>
                </div>
                <a href="<?php echo e(route('deliveries.index')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo e($nbre_customer); ?></h3>

              <p>Clients Inscrits (Faire un dépôt)</p>
            </div>
            <div class="icon">
              <i class="fa fa-smile-o"></i>
            </div>
            <a href="<?php echo e(route('checkcustomer')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>
          <?php endif; ?>


          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                  <div class="inner">
                      <h3><?php echo e($nb_retraits_90j_plus); ?></h3>

                      <p>Nb de dépôts prêts à être retirés depuis 90j ou plus</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-bag"></i>
                  </div>
                  <a href="<?php echo e(route('get_list_deposits')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3><?php echo e($nb_retraits_31_89j); ?></h3>

                      <p>Nb de dépôts prêts à être retirés depuis 31 - 89j </p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-briefcase"></i>
                  </div>
                  <a href="<?php echo e(route('deliveries.index')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                  <div class="inner">
                      <h3><?php echo e($nb_retraits_0_30j); ?></h3>

                      <p>Nb de dépôts prêts à être retirés entre 0 - 30j</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-smile-o"></i>
                  </div>
                  <a href="<?php echo e(route('checkcustomer')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>

          </div>
          </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e($nbre_user); ?></h3>

              <p>Utilisateurs Inscrits</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo e(route('users.index')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'classeur')): ?>
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                  <div class="inner">
                      <h3><?php echo e($nbre_deposit); ?></h3>

                      <p>Livraisons en attente</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-bag"></i>
                  </div>
                  <a href="<?php echo e(route('get_list_deposits')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3><?php echo e($nbre_retrait); ?></h3>

                      <p>Livraisons effectuées</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-briefcase"></i>
                  </div>
                  <a href="<?php echo e(route('deliveries.index')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                  <div class="inner">
                      <h3><?php echo e($nbre_customer); ?></h3>

                      <p>Clients Inscrits</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-smile-o"></i>
                  </div>
                  <a href="<?php echo e(route('clients.index')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>

          </div>
          </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e($nbre_user); ?></h3>

              <p>Utilisateurs Inscrits</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo e(route('users.index')); ?>" class="small-box-footer">Voir Plus <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <?php endif; ?>


      </div>

      <!-- /.row -->
      <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'caissier|manager|admin')): ?>
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
      <?php endif; ?>
      

      
      
      
      
      
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
   url:"<?php echo e(route('customer_search.action')); ?>",
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/dashboard.blade.php ENDPATH**/ ?>