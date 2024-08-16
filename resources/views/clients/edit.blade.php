{{-- \resources\views\clients\edit.blade.php --}}
@extends('layouts.app')

@section('title', '| Editer Client')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class='fa fa-user-plus'></i> Editer Client
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class='fa fa-user-plus'></i> Editer Client</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      @include('inc.messages')
      <div class='col-md-8 col-md-offset-2'>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-user-plus'></i> Editer {{$client->fullname}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="box-body">

                        <div class="col-md-12">

                            <div class="form-group">
                              <label>Nom complet du client</label>
                              <input type="text" name="fullname" class="form-control" id="name" onkeyup="changeToUpperCase(this)" value="{{ $client->fullname }}">
                            </div>

                            <div class="form-group">
                                <label>Email du client</label>
                                <input type="email" name="email" class="form-control" value="{{ $client->email }}"/>
                            </div>

                            <div class="form-group">
                                <label>Numero de téléphone</label>
                                <input type="tel" name="phone_number" class="form-control" value="{{ $client->phone_number }}"/>
                            </div>

                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" name="address" class="form-control" value="{{ $client->address }}"/>
                            </div>

                            {{-- <div class="form-group">
                              <label>Parrainé ? Veuillez renseigner le code de parrinage de votre parrain(e)</label>
                              <input type="number" name="sponsor_code" class="form-control"/>
                            </div> --}}

                            <div class="form-group">
                                <label>Photo de profil</label>
                                <input type="file" placeholder="Entrez votre photo de profil" name="picture">
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-block bg-olive" style="border-radius: 5px;">Editer client</button>
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
