<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    {{-- Caissier --}}
    {{-- Admin --}}
    {{-- SuperSpark --}}
    {{-- SuperAdmin --}}
    <li>
      <a href="{{route('admin-dashboard')}}">
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
        <li><a href="{{ route('superadmin.profil.index') }}"><i class="fa fa-circle-o"></i> Mon profil</a></li>
        <li><a href="{{ route('superadmin.setting') }}"><i class="fa fa-circle-o"></i> Changer mot de passe</a></li>
      </ul>
    </li>
    
    <li class="treeview">
      <a href="#">
        <i class="fa fa-plus"></i>
        <span>Gestion des Agences</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('superadmin.agences.create') }}"><i class="fa fa-circle-o"></i> Ajouter une agence</a></li>
        <li><a href="{{ route('superadmin.agences.index') }}"><i class="fa fa-circle-o"></i> Liste des agences</a></li>
        
      </ul>
    </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Gestion des utilisateurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('superadmin.users.create') }}"><i class="fa fa-circle-o"></i> Nouvel utilisateur</a></li>
          <li><a href="{{ route('superadmin.users.index') }}"><i class="fa fa-circle-o"></i> Utilisateurs</a></li>
        </ul>
      </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-plus-square"></i>
        <span>Gestion des Pressings</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('superadmin.pressings.create') }}"><i class="fa fa-circle-o"></i> Ajouter un pressing</a></li>
        <li><a href="{{ route('superadmin.pressings.index') }}"><i class="fa fa-circle-o"></i> Liste des pressings</a></li>
      </ul>
    </li>

  </ul>
