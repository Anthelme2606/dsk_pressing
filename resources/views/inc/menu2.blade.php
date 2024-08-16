<ul class="sidebar-menu" data-widget="tree">
    <li class="header" style="background-color: rgb(54, 117, 98); color:white;">MENU</li>
    {{-- Caissier --}}
    {{-- Admin --}}
    {{-- SuperSpark --}}
    {{-- SuperAdmin --}}
    <li>
      <a href="{{route('clientarea')}}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>

    {{-- All --}}
    <li class="treeview">
      <a href="#">
        <i class="fa fa-cog"></i>
        <span>Paramètres</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('profil-client') }}"><i class="fa fa-circle-o"></i> Mon profil</a></li>
        <li><a href="{{ route('setting-client') }}"><i class="fa fa-circle-o"></i> Changer mot de passe</a></li>
      </ul>
    </li>



      <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Mes opérations</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('clientdeposit') }}"><i class="fa fa-circle-o"></i> Mes dépôts</a></li>
          <li><a href="{{ route('clientwithdraw') }}"><i class="fa fa-circle-o"></i> Mes retraits</a></li>
        </ul>
    </li>

    {{-- <li class="treeview">
      <a href="#">
        <i class="fa fa-money"></i>
        <span>Mon compte</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Solde</a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Promos</a></li>
      </ul>
  </li> --}}


  </ul>
