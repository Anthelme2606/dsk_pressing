{{-- \resources\views\articles\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Article')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>
            <i class='fa fa-plus-square'></i> Ajouter Article
        </h4>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class='fa fa-plus-square'></i> Ajouter Article</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('inc.messages')
        <div class='col-lg-9 col-lg-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-tite"><b> Validation d'un retrait</b></h4>
                    {{-- <h3 class="box-title"><i class='fa fa-plus-square'></i> Ajouter Article</h3> --}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('addMoney') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <input type="hidden" value="{{ $deposit->id }}" name="id"/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >Date du dépôt</label>
                                    <input type="text" id="title" class="form-control" name="name" value="{{ $deposit->deposit_date }}" disabled/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Montant du dépôt</label>
                                    <input type="text" class="form-control" name="description" value="{{ $deposit->total }}" disabled/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Remise</label>
                                    <input type="text" class="form-control" name="description" value="{{ $deposit->discount }}" disabled/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre d'article(s)</label>
                                    <input type="text" class="form-control" name="classic_price" value="{{ $qte }}" disabled="true"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Reste à payer</label>
                                    <input type="text" class="form-control" name="repass_price" value="{{ $deposit->total - $deposit->advanced - $deposit->discount }}" disabled="true"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Montant versé</label>
                                    <input type="number" class="form-control" name="money_plus" min="0" max="{{ $deposit->total - $deposit->advanced - $deposit->discount }}" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date de retrait</label>
                                    <input type="text" class="form-control" name="retreive_date" value="{{ $deposit->retrieve_date }}" disabled="true"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button class="btn bg-olive btn-block" type="submit" style="border-radius: 5px;">Ajouter</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->

@endsection
