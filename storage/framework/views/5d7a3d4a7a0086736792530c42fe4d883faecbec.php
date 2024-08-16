<?php $__env->startSection('title', '| Editer Article'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-plus-square'></i> Editer Article
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-plus-square'></i> Editer Article</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-plus-square'></i> Editer Article</h3>
                </div>
                <!-- /.box-header -->

            <form action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST">
                <?php echo method_field("PATCH"); ?>
                <?php echo csrf_field(); ?>
                <div class="box-body">

                        <div class="col-xs-12">
                        <div class="form-group">
                            <label >Nom de l'article</label>
                            <input type="text" id="title" class="form-control" name="name" value="<?php echo e($article->name); ?>"/>
                        </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="<?php echo e($article->description); ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12">
                        <div class="form-group">
                            <label>Prix de lavage classique</label>
                            <input type="number" class="form-control" name="classic_price" value="<?php echo e($article->classic_price); ?>"/>
                        </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Prix de repassage</label>
                                <input type="number" class="form-control" name="repass_price" value="<?php echo e($article->repass_price); ?>"/>
                            </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Prix de lavage express</label>
                                    <input type="number" class="form-control" name="express_price" value="<?php echo e($article->express_price); ?>"/>
                                </div>
                                </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn bg-olive btn-block" type="submit">Editer</button>
                </div>
          </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sparqrqm/public_html/testing/resources/views/articles/edit.blade.php ENDPATH**/ ?>