@extends('layouts.app2')

@section('content')
<section class="content-header" >
    <h1>
      Dépôt
      <small>PE / {{ $deposit->id }}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li class="active">Nouveau Dépôt</li>
    </ol>
</section>

<div class="pad margin no-print">
  <div class="callout callout-info" style="margin-bottom: 0!important;">
    <h4><i class="fa fa-info"></i> Note:</h4>
    Pour imprimer cette page, veuillez cliquer sur le bouton d'impression en bas de la facture.
  </div>
</div>

<section class="invoice text-center" style="padding-left: 5px; padding-right: 5px;">

  @include('inc.messages')

  <div class="row invoice-info">
      <br/><br/><br/>
  </div>
  @php
      $type_depot = "";
  @endphp

  <div class="row">
    <div style="text-align: center"><img src="{{ asset('public/website/images/z.png') }}" alt="Image du logo" width="40%" style="padding-top: -5%;" ></div>
      <h6 class="text-center"><b>{{ $deposit->user()->agency()->name }}</b></h6>
      <h4 class="text-center" style="font-style: italic;">By INNOV 720</h4>
      <h5 class="text-center">06 BP 6211 Abidjan | Tel : 0141888989</h5>
      <h5 class="text-center" style=" margin-bottom: 12px; font-style: italic;">RCCM : CI – ABJ – 03 – 2022 – B13 - 08464 | N° CC : 2243843 D</h5>

      <h5 class="text-center" style="font-style: italic;"><b>PE/{{ $deposit->id }}</b> | <b>Client :</b>{{ $deposit->client()->fullname }}</h4>

      <p style="text-align: center; font-size: 12px;">Date de réception :  {{$deposit->deposit_date->format("d/m/y")}}  | Date de retrait : <b> {{$deposit->retrieve_date->format("d/m/y")}} </b><a href="javascript:;" data-toggle="modal" data-target="#editHour"><i class="fa fa-pencil no-print"></i></a> </p>

      <p>Traitement : <b>
        @php
            if(count($depositedarticles)>0){
                if($depositedarticles[0]->type_action == 0){
                    $type_depot = "Nettoyage classique";
                } else if($depositedarticles[0]->type_action == 1){
                    $type_depot = "Repassage";
                } else if($depositedarticles[0]->type_action == 2){
                    $type_depot = "Nettoyage express";
                }
            }
        @endphp
        {{ $type_depot }}
    </b></p>
  </div>

  <br/>

    <div class="row">
        <div class="table-responsive">
            <table class="table">
                @php
                    $nbr_articles = 0;
                @endphp
                <thead>
                    <td><b>Qté x Désignation</b></td>
                    <td><b>PU (FCFA)</b></td>
                    <td><b>Total (FCFA)</b></td>
                </thead>

                <tbody>
                    @foreach ($depositedarticles as $depot)
                    @php
                        $nbr_articles += $depot->quantity;
                    @endphp
                    <tr>
                        <td style="font-size: 12px;">
                            {{ $depot->quantity}} x {{ $depot->article()->name }}
                        </td>
                        <td style="font-size: 12px;">

                            @if($depot->type_action == 0)
                                {{ $depot->article()->classic_price}}
                            @endif

                            @if($depot->type_action == 1)
                                {{ $depot->article()->repass_price }}
                            @endif

                            @if($depot->type_action == 2)
                                {{ $depot->article()->express_price }}
                            @endif
                        </td>

                        <td style="font-size: 12px;">
                            @if($depot->type_action == 0)
                                {{ $depot->article()->classic_price * $depot->quantity}}
                            @endif

                            @if($depot->type_action == 1)
                                {{ $depot->article()->repass_price * $depot->quantity }}
                            @endif

                            @if($depot->type_action == 2)
                                {{ $depot->article()->express_price * $depot->quantity }}
                            @endif
                        </td>


                    </tr>


                    @endforeach

                </tbody>

                <tfoot class="text-center">
                    <tr >
                        <td style="font-size: 12px;"><b>Montant total:</b></td>
                        <td></td>
                        <td style="position: absolute; float:right; font-size: 12px;">{{ $deposit->total + $deposit->discount }}</td>
                    </tr>

                    <tr>
                        <td style="font-size: 12px;"><b>Remise:</b></td>
                        <td></td>
                        <td style="position: absolute; float:right; font-size: 12px;">{{ $deposit->discount }}</td>
                    </tr>

                    <tr style="">
                        <td style="font-size: 12px;"><b>Total à payer:</b></td>
                        <td></td>
                        <td style="position: absolute; float:right; font-size: 12px;">{{ $deposit->total }}</td>
                    </tr>

                    <tr>
                        <td style="font-size: 12px;"><b>Avance:</b></td>
                        <td></td>
                        <td style="position: absolute; float:right; font-size: 12px;">{{ $deposit->advanced }}</td>
                    </tr>

                    <tr>
                        @if($deposit->total - $deposit->advanced > 0)
                            <td style="font-size: 12px;"><b>Reste à payer:</b></td>
                            <td></td>

                            <td style="position: absolute; float:right; font-size: 12px;">{{ abs($deposit->total - $deposit->advanced) }}</td>
                        @else
                            <td style="font-size: 12px;"><b>Relicat:</b></td>
                            <td></td>
                            <td style="position: absolute; float:right; font-size: 12px;">{{ abs($deposit->total - $deposit->advanced) }}</td>
                        @endif
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <div class="text-center">
        <h2>
            <b>{{ $nbr_articles }}</b>
        </h2>
        <h4 style="margin-bottom: -5px; ">Pièce(s)</h4>
    </div>

    <style>
        hr {
            border: none;
            border-top: 4px dotted black;
            color: #fff;
            background-color: #fff;
            height: 4px;
            width: 100%;
            padding-top: 10px;
            padding-bottom: 2px;
        }
    </style>

    <div class="row text-center" style="margin-top: -5px;">
        <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 11px; padding-top: 5px;">
            <em style="color: rgb(212, 205, 100);">PRESSING ELEGANCE</em> vous remercie pour votre confiance
        </div>
    </div>

    <div class="row text-center">
    <div class="text-center" style="font-family: georgia,serif; color:black; font-size: 10px; padding-left:5px; padding-right: 5px;">
        Passé 3 mois, la maison n'est plus responsable des vêtements confiés.
    </div>
    </div>

    <div class="row text-center">
        <a href="#" target="blank" class="text-center" style="font-family: georgia,serif; color:black; font-size: 11px;">
            <em style="color: rgb(212, 205, 100);">www.pressingelegance.com</em>
        </a>
    </div>

    <style>
    hr {
        border: none;
        border-top: 4px dotted black;
        color: #fff;
        background-color: #fff;
        height: 4px;
        width: 100%;
        padding-top: 10px;
        padding-bottom: 2px;
    }
    </style>

</section>
@endsection

