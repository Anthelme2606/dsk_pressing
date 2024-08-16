<?php $__env->startSection('title', '| Dépôts'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-cart-arrow-down"></i> Logs d'impression
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cart-arrow-down"></i> Logs d'impression </li>
  </ol>
</section>




    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title">Liste des logs</h5>
                        
                        

                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Code Dépôt</th>
                                        <th style="width: 15%">Client</th>
                                        <th>Utilisateur</th>
                                        <th>Date dépôt</th>
                                        <th style="width: 15%">Date de retrait prévu</th>

                                        <th>Nombre d'impression</th>
                                        <th>Opérations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td >Dépôt <?php echo e($deposit->code); ?></td>
                                             <td style="width: 10%"><?php echo e($deposit->client); ?></td>
                                             <td style="width: 10%"><?php echo e($deposit->user); ?></td>
                                             <td style="width: 10%"><?php echo e($deposit->deposit_date); ?></td>
                                             <td style="width: 10%"><?php echo e($deposit->retrieve_date); ?></td>
                                             <td style="width: 10%"><?php echo e($deposit->code_count); ?></td>
                                            
                                            <td>
                                                <a href="<?php echo e(route('deposits.show', $deposit->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Voir le dépôt</a>
                                                <a href="javascript:;" data-toggle="modal" onclick="getDetails(<?php echo e($deposit->id); ?>)" data-target="#confirm" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Détails</a>

                                            </td>
                                            <td>
                                                <div class="modal fade" id="confirm">
                                                    <div class="modal-dialog">
                                                        <form action="" id="deleteForm" method="post">
                                                            <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title">Détails d'impression</h4>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <table class="table table-bordered table-striped" id="details">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Utilisateur</th>
                                                                                <th>Date d'impression</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                                                 </div>
                                                            </div>
                                                        </form>
                                                    <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>

                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
   function getDetails(id) {
       var url = '<?php echo e(route("print_per_deposit", ":id")); ?>';
       url = url.replace(':id', id);

       // Effectuer une requête AJAX GET
       $.ajax({
           url: url,
           type: 'GET',
           success: function(response) {
               var tableBody = $('#details tbody');
               tableBody.empty();

               $.each(response['details'], function(index, data) {
                   var row = '<tr>' +
                               '<td>' + data.user + '</td>' +
                               '<td>' + data.action_date + '</td>' +
                             '</tr>';
                   tableBody.append(row);
               });
           },
           error: function(xhr, status, error) {
               console.error(xhr.responseText);
           }
       });
   }
   </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/print/result.blade.php ENDPATH**/ ?>