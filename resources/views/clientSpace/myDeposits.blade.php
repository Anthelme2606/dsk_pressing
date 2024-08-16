@extends('layouts.app2')

@section('title', '| Dépôts')

@section('content')

<br><section class="content-header">
  <h1 style="color: rgb(58, 85, 77);">
    <i class="fa fa-cart-arrow-down"></i> Mes dépôts
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cart-arrow-down"></i> Mes dépôts </li>
  </ol>
</section>



    <!-- Main content -->
    <section class="content">
        <section class="content">
            @include('inc.messages')
            <div class="row">
              <div class="col-md-12">
                  <div class="box box-solid">
                      <div class="box-header with-border">
                          <h4 class="box-tite"><b> Liste de mes dépôts</b></h4>
                          {{-- <h3 class="box-title">Administration des utilisateurs</h3> --}}
                          {{-- {{-- <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Rôles</a> --}}
                          {{-- {{-- <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a> --}}
                      </div>
                          <div class="table-responsive">
                            <div class="box-body">

                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                        <th>N°</th>
                                        <th>Code</th>
                                        <th>Réceptionniste</th>
                                        <th>Nombre d'articles</th>
                                        <th>Date de dépôt</th>
                                        <th>Date de retrait</th>
                                        <th>Montant total</th>
                                        <th>Remise</th>
                                        <th>Avance</th>
                                      </tr>
                                  </thead>

                                  <tbody>
                                      @foreach ($deposits as $deposit)
                                      <tr>

                                          <td>PE / {{ $deposit->id }}</td>
                                          <td>{{ $deposit->code }}</td>
                                          <td>{{ $deposit->user()->fullname }}</td>
                                          <td>{{ $deposit->nbr_articles() }}</td>
                                          <td>{{ $deposit->deposit_date->format('d/m/Y à H:i') }}</td>
                                          <td>{{ $deposit->retrieve_date->format('d/m/Y à H:i') }}</td>
                                          <td>{{ $deposit->total }}</td>
                                          <td>{{ $deposit->discount }}</td>
                                          <td>{{ $deposit->advanced }}</td>
                                          {{-- Retrieve array of roles associated to a user and convert to string --}}

                                      </tr>
                                      @endforeach
                                  </tbody>

                              </table>
                            </div>
                          </div>

                          <div class="box-footer">
                            <a onclick="history.back()" class="btn bg-olive" style="border-radius: 5px;">Retour</a>
                          </div>
                  </div>
              </div>
          </div>


        </section>
    </section>

@endsection

