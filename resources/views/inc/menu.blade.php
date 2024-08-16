<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    {{-- Caissier --}}
    {{-- Admin --}}
    {{-- SuperSpark --}}
    {{-- SuperAdmin --}}
    <li>
      <a href="{{route('dashboard')}}">
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
        <li><a href="{{ route('profils.index') }}"><i class="fa fa-circle-o"></i> Mon profil</a></li>
        <li><a href="{{ route('setting') }}"><i class="fa fa-circle-o"></i> Changer mot de passe</a></li>
      </ul>
    </li>

    {{-- <li>
        <a href="{{ route('licences.index') }}">
            <i class="fa fa-history"></i> <span>Licence</span>
        </a>
    </li> --}}
    @role('admin')
    <li class="treeview">
        <a href="#">
            <i class="fa fa-plus-square"></i>
            <span>Configurations</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('codesuffixes.create') }}"><i class="fa fa-circle-o"></i> Ajouter Suffixe Code</a></li>
            <li><a href="{{ route('codesuffixes.index') }}"><i class="fa fa-circle-o"></i> Suffixes</a></li>
            <li><a href="{{ route('deliveryhours.create') }}"><i class="fa fa-circle-o"></i> Ajouter Heure de retrait</a></li>
            <li><a href="{{ route('deliveryhours.index') }}"><i class="fa fa-circle-o"></i> Heures de retraits</a></li>
            <li><a href="{{ route('promos.create') }}"><i class="fa fa-circle-o"></i> Ajouter une promotion</a></li>
            <li><a href="{{ route('promos.index') }}"><i class="fa fa-circle-o"></i> Liste des promotions</a></li>
        </ul>
    </li>
    @endrole

    @role('manager|admin')
    <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Clients Fidèles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('clientgroups.create') }}"><i class="fa fa-circle-o"></i> Fidéliser Client</a></li>
          <li><a href="{{ route('clientgroups.index') }}"><i class="fa fa-circle-o"></i> Liste des clients fidèles</a></li>
        </ul>
      </li>
    @endrole

    @role('admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Groupes de Fidelisation</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('loyalgroups.create') }}"><i class="fa fa-circle-o"></i> Ajouter Groupe</a></li>
          <li><a href="{{ route('loyalgroups.index') }}"><i class="fa fa-circle-o"></i> Liste des groupes</a></li>
        </ul>
      </li>
    @endrole

    @role('caissier|manager|admin')
    <li class="treeview">
        <a href="#">
          <i class="fa fa-cart-arrow-down"></i>
          <span>Gestion des Dépôts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('get_list_deposits') }}"><i class="fa fa-circle-o"></i> Liste des Dépôts</a></li>
          <li><a href="{{ route('deposit_search') }}"><i class="fa fa-circle-o"></i> Liste des Dépôts à terme</a></li>
          <li><a href="{{ route('checkcustomer') }}"><i class="fa fa-circle-o"></i> Nouveau Dépôt</a></li>

        </ul>
      </li>
    @endrole

    @role('caissier|manager|admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-suitcase"></i>
          <span>Gestion des Retraits</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('deliveries.index') }}"><i class="fa fa-circle-o"></i> Liste des Retraits</a></li>
          <li><a href="{{ route('onday') }}"><i class="fa fa-circle-o"></i> Retraits faits ajourd'hui</a></li>
          <li><a href="{{ route('search_retrieve') }}"><i class="fa fa-circle-o"></i> Retrait sur une période</a></li>
        </ul>
      </li>
    @endrole

    <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Entrées/Sorties</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('in_out.index') }}"><i class="fa fa-circle-o"></i>Liste des mouvements</a></li>
          <li><a href="{{ route('in_out.search') }}"><i class="fa fa-circle-o"></i>Recherche sur une période</a></li>

        </ul>
      </li>

    @role('manager|admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Bilan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('search') }}"><i class="fa fa-circle-o"></i>Recherche sur Vente</a></li>
          <li><a href="{{ route('searchDiscount') }}"><i class="fa fa-circle-o"></i>Remises sur commandes</a></li>
          <li><a href="{{ route('getCustomerDeposit') }}"><i class="fa fa-circle-o"></i>Dépôt par client</a></li>
          <li><a href="{{ route('saleDay') }}"><i class="fa fa-circle-o"></i>Etat des ventes du jour</a></li>
          <li><a href="{{ route('searchDaily') }}"><i class="fa fa-circle-o"></i>Recherche bilan journalier</a></li>
          <li><a href="{{ route('totake') }}"><i class="fa fa-circle-o"></i>Retrait du jour</a></li>
          <li><a href="{{ route('range') }}"><i class="fa fa-circle-o"></i>Stats des commandes</a></li>
        </ul>
      </li>
    @endrole

    @role('manager|admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-money"></i>
          <span>Recettes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          {{-- <li><a href="#"><i class="fa fa-circle-o"></i> Recettes</a></li>--> --}}
          <li><a href="{{ route('receipeNewToDay') }}"><i class="fa fa-circle-o"></i> Recette Journalière</a></li>
          <li><a href="{{ route('receipeAllToDay') }}"><i class="fa fa-circle-o"></i> Recette Générale Journalier</a></li>
          <li><a href="{{ route('searchReceipt') }}"><i class="fa fa-circle-o"></i> Commandes soldées</a></li>
          <li><a href="{{ route('searchLeftpay') }}"><i class="fa fa-circle-o"></i> Impayés</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i>Promos spéciales</a></li>
        </ul>
      </li>
    @endrole

    @role('manager|admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Gestion des Etats</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('status.create') }}"><i class="fa fa-circle-o"></i> Ajouter Etat</a></li>
          <li><a href="{{ route('status.index') }}"><i class="fa fa-circle-o"></i> Liste des Etats</a></li>
        </ul>
      </li>
    @endrole

    @role('manager|admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus-square"></i>
          <span>Gestion des Articles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('articles.create') }}"><i class="fa fa-circle-o"></i> Ajouter un Article</a></li>
          <li><a href="{{ route('articles.index') }}"><i class="fa fa-circle-o"></i> Liste des Articles</a></li>
        </ul>
      </li>
    @endrole

    @role('caissier|manager|admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Gestion des Clients</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('clients.create') }}"><i class="fa fa-circle-o"></i> Ajouter un Client</a></li>
          <li><a href="{{ route('clients.index') }}"><i class="fa fa-circle-o"></i> Liste des Clients</a></li>
        </ul>
      </li>
    @endrole

      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Management des Clients</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('mydeposits') }}"><i class="fa fa-circle-o"></i> Mes dépôts</a></li>
          <li><a href="{{ route('mydeliveries') }}"><i class="fa fa-circle-o"></i> Mes retraits</a></li>
        </ul>
    </li> --}}
    @role('admin|manager')
    <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Gestion des Caissiers</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('tellers.create') }}"><i class="fa fa-circle-o"></i> Ajouter un Caissier</a></li>
          <li><a href="{{ route('tellers.index') }}"><i class="fa fa-circle-o"></i> Liste des Caissiers</a></li>
        </ul>
      </li>
    @endrole

    @role('admin|manager')
    <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Gestion des Laveurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('laveurs.create') }}"><i class="fa fa-circle-o"></i> Ajouter un Laveur</a></li>
          <li><a href="{{ route('laveurs.index') }}"><i class="fa fa-circle-o"></i> Liste des Laveurs</a></li>
        </ul>
      </li>
    @endrole

    @role('admin|manager')
    <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Gestion des Classeurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('classeurs.create') }}"><i class="fa fa-circle-o"></i> Ajouter un Classeur</a></li>
          <li><a href="{{ route('classeurs.index') }}"><i class="fa fa-circle-o"></i> Liste des Classeurs</a></li>
        </ul>
      </li>
    @endrole


    @role('admin')
      <li class="treeview">
        <a href="{{ route('permissions.index') }}#">
         <i class="fa fa-unlock"></i> <span>Gestion des permissions</span>
       </a>
     </li>

     <li>
       <a href="{{ route('roles.index') }}"><i class="fa fa-key"></i><span>Gestion des rôles</span></a>
     </li>
    @endrole


      {{-- SuperSpark --}}


    {{-- SUperAdmin --}}
    @role('admin')
    <li class="treeview">
      <a href="#">
        <i class="fa fa-plus"></i>
        <span>Gestion des Agences</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('agences.create') }}"><i class="fa fa-circle-o"></i> Ajouter une agence</a></li>
        <li><a href="{{ route('agences.index') }}"><i class="fa fa-circle-o"></i> Liste des agences</a></li>
        <li><a href="{{ route('agences.index') }}"><i class="fa fa-circle-o"></i> Utilisateur - Agence</a></li>
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
          <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i> Nouvel utilisateur</a></li>
          <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Utilisateurs</a></li>
        </ul>
      </li>
     @endrole

    {{-- @role('admin')
    <li class="treeview">
      <a href="#">
        <i class="fa fa-plus-square"></i>
        <span>Gestion des Pressings</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('pressings.create') }}"><i class="fa fa-circle-o"></i> Ajouter un pressing</a></li>
        <li><a href="{{ route('pressings.index') }}"><i class="fa fa-circle-o"></i> Liste des pressings</a></li>
      </ul>
    </li>
    @endrole --}}

    @role('admin|caissier')
    <li class="treeview">
      <a href="#">
        <i class="fa fa-bar-chart"></i>
        <span>Statistiques</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('search') }}"><i class="fa fa-circle-o"></i>Recherche sur Vente</a></li>
        <li><a href="{{ route('getCustomerDeposit') }}"><i class="fa fa-circle-o"></i>Dépôt par client</a></li>
        <li><a href="{{ route('getRatioClient') }}"><i class="fa fa-circle-o"></i>Classement client</a></li>
        <li><a href="{{ route('saleDay') }}"><i class="fa fa-circle-o"></i> Etat des ventes du jour</a></li>
        <li><a href="{{ route('totake') }}"><i class="fa fa-circle-o"></i> Retrait du jour</a></li>
        <li>
      </ul>
    </li>
    @endrole

    @role('admin')
    <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart"></i>
          <span>Logs d'impression</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('logs.index') }}"><i class="fa fa-circle-o"></i> Logs</a></li>
          <li><a href="{{ route('log.search') }}"><i class="fa fa-circle-o"></i> Recherche sur les logs</a></li>

        </ul>
      </li>
    @endrole

    @role('laveur')
    <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart"></i>
          <span>Gestion du linge</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('traitements.waiting') }}"><i class="fa fa-circle-o"></i>En attente de traitement</a></li>
          <li><a href="{{ route('traitements.in_progress') }}"><i class="fa fa-circle-o"></i>En cours de traitement</a></li>
          <li><a href="{{ route('traitements.treated') }}"><i class="fa fa-circle-o"></i> Traité</a></li>
          <li>
        </ul>
      </li>
    @endrole

    @role('classeur')
    <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart"></i>
          <span>Traitement</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('traitements.treated_all') }}"><i class="fa fa-circle-o"></i>En attente de traitement</a></li>
            <li><a href="{{ route('traitements.classed') }}"><i class="fa fa-circle-o"></i> Classé</a></li>
          <li>
        </ul>
      </li>
    @endrole




  </ul>
