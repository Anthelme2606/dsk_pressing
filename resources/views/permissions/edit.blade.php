@extends('layouts.app')

@section('title', '| Editer Permission')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class='fa fa-edit'></i> Editer Permission
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class='fa fa-edit'></i> Editer Permission</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">

    <div class='col-lg-4 col-lg-offset-4'>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class='fa fa-key'></i> Editer {{$permission->name}}</h3>
            </div>

            <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                @csrf
                @method('PATCH')
            <div class="box-body">

                <div class="form-group">
                    <label>Nom Permission</label>
                    <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
                </div>

           </div>

           <div class="box-footer">
            <button type="submit" class="btn bg-olive">Editer</button>
            </div>
            </form>

        </div>
    </div>
</div>
</section>

@endsection
