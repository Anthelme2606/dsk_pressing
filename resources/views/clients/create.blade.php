{{-- \resources\views\customers\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Ajouter Client')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        <i class='fa fa-user-plus'></i> Ajouter un client
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-user-plus'></i> Ajouter Client</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      @include('inc.messages')
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-tite"><b> Ajout d'un nouveau client</b></h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('clients.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom complet du client <span style="color: red;">*</span></label>
                                    <input type="text" name="fullname" class="form-control" id="name" onkeyup="changeToUpperCase(this)" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email du client</label>
                                    <input type="email" name="email" class="form-control"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numero de téléphone <span style="color: red;">*</span></label>
                                    <input type="tel" name="phone_number" class="form-control" min="0" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse </label>
                                    <input type="text" name="address" class="form-control"/>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Parrainé ? Veuillez renseigner le code de parrinage de votre parrain(e)</label>
                                    <input type="number" name="sponsor_code" class="form-control"/>
                                </div>
                            </div>

                        </div> --}}

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-block bg-olive" style="border-radius: 5px;">Ajouter client</button>
                    </div>
                </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->
  <script>
    function changeToUpperCase(t){
      var eleVal = document.getElementById(t.name);
      eleVal.value= eleVal.value.toUpperCase();

    }
  </script>
  <script>
    $('#firstname').on('keypress', function() {
        var $this = $(this), value = $this.val();
        if (value.length === 1) {
          $this.val( value.charAt(0).toUpperCase() );
        }
    });

    $('#address').on('keypress', function() {
        var $this = $(this), value = $this.val();
        if (value.length === 1) {
          $this.val( value.charAt(0).toUpperCase() );
        }
    });

</script>

@endsection
