<?php $__env->startSection('title', '| Nouvel article du Panier'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class='fa fa-cart-arrow-down'></i> Nouvel article du Panier
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class='fa fa-cart-arrow-down'></i> Nouvel article du Panier</li>
        </ol>
    </section>

    <div class="pad margin no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            Vous pouvez ajouter autant d'articles au Panier de dépôt en cliquant sur " Ajouter encore un article ".<br>
            Pour terminer le dépôt d'article, Cliquer sur " Valider Dépôt "
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class='col-lg-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="<?php echo e(route('get_list_deposits')); ?>" class="btn btn-default pull-right">Liste des Dépôts</a>
                    <h3 class="box-title"><i class='fa fa-cart-arrow-down'></i> Nouvel article du Panier</h3>
                    <h3><b>Client :</b><?php echo e($client->fullname); ?></h3>

                    <?php if($checked == true || $checked == 1): ?>
                    <h3><b>Groupe de fidélisation: </b><?php echo e($group_title); ?></h3>
                    <?php endif; ?>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="<?php echo e(route('doDeposit')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <input type="hidden" name="client_id" value="<?php echo e($id); ?>">
                        <input type="hidden" name="action" id="elt" value=""/>

                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4">
                                <div class="form-group">
                                    <label> Dépôt à faire</label>
                                    <select class="form-control article" id="action" required>
                                        <option value="0">Nettoyage classique</option>
                                        <option value="1">Nettoyage Express</option>
                                        <option value="2">Repassage</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <table id="dynamic_field" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th><label>Désignation<span style="color: red;">*</span></label></th>
                                <th><label>Description</label></th>
                                <th><label>Quantité<span style="color: red;">*</span></label></th>
                                <th><label>Rangement<span style="color: red;">*</span></label></th>
                                <th><label>Prix Unitaire</label></th>
                                <th><label>Montant</label></th>
                                <th><label>Etat</label></th>
                                <th><button class="btn bg-olive" title="Ajouter Article" id="add" type="button"><i class="fa fa-plus"></i></button> </th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>

                                <td>
                                    <input type="hidden" name="client_id" value="<?php echo e($id); ?>">
                                    <div class="form-group">
                                        <select class="form-control article" id="article_id[]" name="article_id[]" required>
                                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($article->id); ?>"><?php echo e($article->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="designation[]" type="text" value="" id="designation[]">
                                    </div>
                                </td>



                                <td>
                                    <div class="form-group">
                                        <input class="form-control qty" name="quantity[]" type="number" value="" id="quantity" required autofocus/>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <select class="form-control tidy" id="tidy" name="tidy[]" required>
                                            <option value="Cintre">Cintre</option>
                                            <option value="Plié(e)">Plié(e)</option>
                                        </select>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <input class="form-control price_" name="price_[]" type="number" id="price_[]" disabled>
                                        <input class="form-control price" name="price[]" type="hidden" value="" id="price[]" required>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <input class="form-control amount_" name="amount_[]" type="number" value="" id="amount_[]" disabled>
                                        <input class="form-control amount" name="amount[]" type="hidden" value="" id="amount[]">
                                    </div>
                                </td>

                                <td style="width: 15%">
                                    <?php $__currentLoopData = $etats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input name="etats_0[]" type="checkbox" value="<?php echo e($etat->id); ?>">
                                        <label><?php echo e($etat->title, ucfirst($etat->title)); ?></label><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td style="border: none;"></td>

                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <?php if($checked != true || $checked != 1): ?>
                            <td style="border: none;"></td>
                            <?php endif; ?>
                            <td style="border: none;"></td>
                            <td><b>Total</b></td>
                            <td><b class="total"></b></td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <?php if($checked != true || $checked != 1): ?>
                            <td style="border: none;"></td>
                            <?php endif; ?>
                            <td style="border: none;"></td>
                            <td><b>Remise</b></td>
                            <td><b id="total_discount"></b></td>
                                </tr>

                            </tfoot>
                        </table>


                        <?php if($checked != true || $checked != 1): ?>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="discount">Remise</label>
                                <input class="form-control" id="nbre" name="discount" type="number" value="" min="0" max="100">
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="discount">Remise</label>
                                <input class="form-control" id="nbre" name="discount" type="number" value="<?php echo e($percentage); ?>" min="0" max="100" readonly>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="amount_paid">Avance<span style="color: red;">*</span></label>
                                <input class="form-control" id="amount_paid" name="amount_paid" type="number" value="0" required>
                                <small style="color: red" id="errorMessage"></small>
                            </div>
                        </div>

                        <div class="col-lg-3" style="display: none;">
                            <div class="form-group">
                                <label for="date_retrait">Date de Retrait</label>
                                <input class="form-control" id="date_retrait" name="date_retrait" type="date" value="">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="date_retrait">Mode de règlement<span style="color: red;">*</span></label>
                                <select class="form-control" id="mode_reglement" name="mode_reglement" required>
                                    <option value="ESPECE">Espèce</option>
                                    <option value="AVANCE">Paiement par carte</option>
                                    <option value="FLOOZ">Mobile money</option>
                                    <option value="AUTRE">Autre</option>
                                </select>
                            </div>
                        </div>
                        <?php if($checked != true || $checked != 1): ?>
                        <div class="col-lg-3" style="" id="reference_div">
                            <div class="form-group">
                                <label for="reference">Code promo</label>
                                <input class="form-control" id="promo" name="promo" type="text" placeholder="Code promo client" >
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>

                    <div class="box-footer">

                        <input class="btn btn-flat btn-block bg-olive" type="submit" value="Valider Dépôt">
                    </div>

                </form>
            </div>
            <!-- /.box -->

        </div>
    </section>
    <!-- /.content -->

<script type="text/javascript">
    document.getElementById("nbre").addEventListener("input", function(){
        total_discount();
    })
    var action = document.getElementById("action").value;
    document.getElementById("action").addEventListener("input", function(){
        var action = document.getElementById("action").value;
        document.getElementById("elt").value = action;
    });




    document.getElementById("elt").value = action;

    var nbre=document.getElementById('nbre');
    var promo = document.getElementById('promo');
    nbre.addEventListener("input", function(){
        total_discount()
        if(nbre.value != ""){
            promo.disabled = true;
        } else {
            promo.disabled = false;
        }
    });

    promo.addEventListener("input", function(){
        if(promo.value != ""){
            nbre.disabled = true;
        } else {
            nbre.disabled = false;
        }
    })

    nbre.addEventListener("input",function() {
        total_discount()
        if(nbre.value < 0 || nbre.value > 100 ) {
            nbre.value = 0;
        }
    });

    var amount_paid=document.getElementById('amount_paid');
    amount_paid.addEventListener("input",function() {
        if(amount_paid.value < 0 ) {
            amount_paid.value = 0;
        }
    });

    var quantity=document.getElementById('quantity');
    quantity.addEventListener("input",function() {
        if(quantity.value < 0 ) {
            quantity.value = 0;
        }
    });

</script>

<script type="text/javascript">

    $(document).ready(function(){
        var i=1;
        <?php $j = 1; ?>


        $('#add').click(function(){
            //var con = 'etats_'+i+'[]';
            //"etats_'+i+'"
            var action = document.getElementById("action").value;
            document.getElementById("elt").value = action;
            $("#action").prop("disabled", true);
            $('#dynamic_field').prepend('<tr id="row'+i+'"><td><div class="form-group"><select class="form-control article" id="article_id[]" name="article_id[]" required><?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($article->id); ?>"><?php echo e($article->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></td><td><div class="form-group"><input class="form-control" name="designation[]" type="text" value="" id="designation[]" autofocus></div></td><td><div class="form-group"><input class="form-control qty" name="quantity[]" type="number" value="" id="quantity" required min="0" autofocus></div></td><td><div class="form-group"><select class="form-control tidy" id="tidy" name="tidy[]" required><option value="Cintre">Cintre</option><option value="Plié(e)">Plié(e)</option></select></div></td><td><div class="form-group"><input class="form-control price_" name="price_[]" type="number" id="price_[]" disabled><input class="form-control price" name="price[]" type="hidden" value="" id="price[]" required></div></td><td><div class="form-group"><input class="form-control amount_" name="amount_[]" type="number" value="" id="amount_[]" disabled><input class="form-control amount" name="amount[]" type="hidden" value="" id="amount[]"></div></td><td style="width: 15%"> <?php $__currentLoopData = $etats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><input name="etats_'+i+'[]" type="checkbox" value="<?php echo e($etat->id); ?>"> <label><?php echo e($etat->title, ucfirst($etat->title)); ?></label><br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td><td><button type="button" name="remove" id="'+i+'" class="btn bg-red btn_remove">X</button></td></tr>');
            $('.article').trigger('change');
            i++;
            console.log('j ==== '+"<?php echo e($j); ?>")
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
            total();
            total_discount();
        });

        $('#submit').click(function(){
            $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });

        $('#mode_reglement').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if((valueSelected === 'FLOOZ') ||  (valueSelected === 'T-MONEY') ||  (valueSelected === 'AUTRE')){
                $('#reference_div').show();
            }else{
                $('#reference_div').hide()
            }
        });

        $('tbody').delegate('.article','change',function (){
            var tr = $(this).parent().parent().parent();
            var id = tr.find('.article').val();
            var e = $('#action').val();
            var dataId={'id':id, 'unit':e};

            $.ajax({
                type : 'GET',
                url : '<?php echo e(route('findPrice')); ?>',
                dataType: 'json',
                data : dataId,
                success:function(data){
                    //console.log(data)
                    tr.find('.price').val(data);
                    tr.find('.price_').val(data);
                }
            });
        });

        $('.article').trigger('change');



        $('tbody').delegate('.article','change',function (){
            var tr = $(this).parent().parent().parent();
            tr.find('.qty');
            total();
            total_discount();
        });

        $('tbody').delegate('.qty,.price','change',function (){
            var tr = $(this).parent().parent().parent();
            var qty= tr.find('.qty').val();
            var price = tr.find('.price').val();
            //console.log(price);
            var amount= (qty * price);
            tr.find('.amount').val(amount);
            tr.find('.amount_').val(amount);
            total();
            total_discount();
        });
    });

    function total()
    {
        var total = 0;
        $('.amount').each(function(i,e){
            var amount = $(this).val()-0;
            total +=amount;
        })
        $('.total').html(total);


        var discount = $('#nbre').val();
        var total_discount = total * discount/100;

        $("#amount_paid").attr({
            "max" : total-total_discount,        // substitute your own
            "min" : 0    // values (or variables) here
        });
    };

    function totalValue(){
        var total = 0;
        $('.amount').each(function(i,e){
            var amount = $(this).val()-0;
            total +=amount;
        })
        return total;
    }

    function total_discount()
    {
        var total = 0;
        $('.amount').each(function(i,e){
            var amount = $(this).val()-0;
            total +=amount;
        })
        var discount = $('#nbre').val();
        var total_discount = total * discount/100;

        $('#total_discount').html(total_discount);

        $("#amount_paid").attr({
            "max" : total-total_discount,        // substitute your own
            "min" : 0    // values (or variables) here
        });
    };

    function total_discout(){
        var total = 0;
        $('.amount').each(function(i,e){
            var amount = $(this).val()-0;
            total +=amount;
        })
        var discount = $('#nbre').val();
        var total_discount = total * discount/100;
        return total_discount;
    }

    Date.prototype.addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    };

    var date = new Date();
    //alert(date.addDays(5));
    document.getElementById('date_retrait').valueAsDate = date.addDays(2);

</script>

<script src="<?php echo e(asset('js/jquery-3.4.0.min.js')); ?>"></script>


<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/depositedarticles/create.blade.php ENDPATH**/ ?>