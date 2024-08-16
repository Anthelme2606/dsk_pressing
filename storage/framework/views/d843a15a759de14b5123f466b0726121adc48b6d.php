<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    
    
    
    
    <li>
      <a href="<?php echo e(route('dashboard')); ?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>

    
    <li class="treeview">
      <a href="#">
        <i class="fa fa-cog"></i>
        <span>Paramètres</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo e(route('profils.index')); ?>"><i class="fa fa-circle-o"></i> Mon profil</a></li>
        <li><a href="<?php echo e(route('setting')); ?>"><i class="fa fa-circle-o"></i> Changer mot de passe</a></li>
      </ul>
    </li>

    
    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-plus-square"></i>
            <span>Configurations</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo e(route('codesuffixes.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter Suffixe Code</a></li>
            <li><a href="<?php echo e(route('codesuffixes.index')); ?>"><i class="fa fa-circle-o"></i> Suffixes</a></li>
            <li><a href="<?php echo e(route('deliveryhours.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter Heure de retrait</a></li>
            <li><a href="<?php echo e(route('deliveryhours.index')); ?>"><i class="fa fa-circle-o"></i> Heures de retraits</a></li>
            <li><a href="<?php echo e(route('promos.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter une promotion</a></li>
            <li><a href="<?php echo e(route('promos.index')); ?>"><i class="fa fa-circle-o"></i> Liste des promotions</a></li>
        </ul>
    </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager|admin')): ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Clients Fidèles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('clientgroups.create')); ?>"><i class="fa fa-circle-o"></i> Fidéliser Client</a></li>
          <li><a href="<?php echo e(route('clientgroups.index')); ?>"><i class="fa fa-circle-o"></i> Liste des clients fidèles</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Groupes de Fidelisation</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('loyalgroups.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter Groupe</a></li>
          <li><a href="<?php echo e(route('loyalgroups.index')); ?>"><i class="fa fa-circle-o"></i> Liste des groupes</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'caissier|manager|admin')): ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-cart-arrow-down"></i>
          <span>Gestion des Dépôts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('get_list_deposits')); ?>"><i class="fa fa-circle-o"></i> Liste des Dépôts</a></li>
          <li><a href="<?php echo e(route('deposit_search')); ?>"><i class="fa fa-circle-o"></i> Liste des Dépôts à terme</a></li>
          <li><a href="<?php echo e(route('checkcustomer')); ?>"><i class="fa fa-circle-o"></i> Nouveau Dépôt</a></li>

        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'caissier|manager|admin')): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-suitcase"></i>
          <span>Gestion des Retraits</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('deliveries.index')); ?>"><i class="fa fa-circle-o"></i> Liste des Retraits</a></li>
          <li><a href="<?php echo e(route('onday')); ?>"><i class="fa fa-circle-o"></i> Retraits faits ajourd'hui</a></li>
          <li><a href="<?php echo e(route('search_retrieve')); ?>"><i class="fa fa-circle-o"></i> Retrait sur une période</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Entrées/Sorties</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('in_out.index')); ?>"><i class="fa fa-circle-o"></i>Liste des mouvements</a></li>
          <li><a href="<?php echo e(route('in_out.search')); ?>"><i class="fa fa-circle-o"></i>Recherche sur une période</a></li>

        </ul>
      </li>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager|admin')): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Bilan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('search')); ?>"><i class="fa fa-circle-o"></i>Recherche sur Vente</a></li>
          <li><a href="<?php echo e(route('searchDiscount')); ?>"><i class="fa fa-circle-o"></i>Remises sur commandes</a></li>
          <li><a href="<?php echo e(route('getCustomerDeposit')); ?>"><i class="fa fa-circle-o"></i>Dépôt par client</a></li>
          <li><a href="<?php echo e(route('saleDay')); ?>"><i class="fa fa-circle-o"></i>Etat des ventes du jour</a></li>
          <li><a href="<?php echo e(route('searchDaily')); ?>"><i class="fa fa-circle-o"></i>Recherche bilan journalier</a></li>
          <li><a href="<?php echo e(route('totake')); ?>"><i class="fa fa-circle-o"></i>Retrait du jour</a></li>
          <li><a href="<?php echo e(route('range')); ?>"><i class="fa fa-circle-o"></i>Stats des commandes</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager|admin')): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-money"></i>
          <span>Recettes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          
          <li><a href="<?php echo e(route('receipeNewToDay')); ?>"><i class="fa fa-circle-o"></i> Recette Journalière</a></li>
          <li><a href="<?php echo e(route('receipeAllToDay')); ?>"><i class="fa fa-circle-o"></i> Recette Générale Journalier</a></li>
          <li><a href="<?php echo e(route('searchReceipt')); ?>"><i class="fa fa-circle-o"></i> Commandes soldées</a></li>
          <li><a href="<?php echo e(route('searchLeftpay')); ?>"><i class="fa fa-circle-o"></i> Impayés</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i>Promos spéciales</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager|admin')): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i>
          <span>Gestion des Etats</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('status.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter Etat</a></li>
          <li><a href="<?php echo e(route('status.index')); ?>"><i class="fa fa-circle-o"></i> Liste des Etats</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager|admin')): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus-square"></i>
          <span>Gestion des Articles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('articles.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter un Article</a></li>
          <li><a href="<?php echo e(route('articles.index')); ?>"><i class="fa fa-circle-o"></i> Liste des Articles</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'caissier|manager|admin')): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Gestion des Clients</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('clients.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter un Client</a></li>
          <li><a href="<?php echo e(route('clients.index')); ?>"><i class="fa fa-circle-o"></i> Liste des Clients</a></li>
        </ul>
      </li>
    <?php endif; ?>

      
    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin|manager')): ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Gestion des Caissiers</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('tellers.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter un Caissier</a></li>
          <li><a href="<?php echo e(route('tellers.index')); ?>"><i class="fa fa-circle-o"></i> Liste des Caissiers</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin|manager')): ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Gestion des Laveurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('laveurs.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter un Laveur</a></li>
          <li><a href="<?php echo e(route('laveurs.index')); ?>"><i class="fa fa-circle-o"></i> Liste des Laveurs</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin|manager')): ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-smile-o"></i>
          <span>Gestion des Classeurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('classeurs.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter un Classeur</a></li>
          <li><a href="<?php echo e(route('classeurs.index')); ?>"><i class="fa fa-circle-o"></i> Liste des Classeurs</a></li>
        </ul>
      </li>
    <?php endif; ?>


    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
      <li class="treeview">
        <a href="<?php echo e(route('permissions.index')); ?>#">
         <i class="fa fa-unlock"></i> <span>Gestion des permissions</span>
       </a>
     </li>

     <li>
       <a href="<?php echo e(route('roles.index')); ?>"><i class="fa fa-key"></i><span>Gestion des rôles</span></a>
     </li>
    <?php endif; ?>


      


    
    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-plus"></i>
        <span>Gestion des Agences</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo e(route('agences.create')); ?>"><i class="fa fa-circle-o"></i> Ajouter une agence</a></li>
        <li><a href="<?php echo e(route('agences.index')); ?>"><i class="fa fa-circle-o"></i> Liste des agences</a></li>
        <li><a href="<?php echo e(route('agences.index')); ?>"><i class="fa fa-circle-o"></i> Utilisateur - Agence</a></li>
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
          <li><a href="<?php echo e(route('users.create')); ?>"><i class="fa fa-circle-o"></i> Nouvel utilisateur</a></li>
          <li><a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-circle-o"></i> Utilisateurs</a></li>
        </ul>
      </li>
     <?php endif; ?>

    

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin|caissier')): ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-bar-chart"></i>
        <span>Statistiques</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo e(route('search')); ?>"><i class="fa fa-circle-o"></i>Recherche sur Vente</a></li>
        <li><a href="<?php echo e(route('getCustomerDeposit')); ?>"><i class="fa fa-circle-o"></i>Dépôt par client</a></li>
        <li><a href="<?php echo e(route('getRatioClient')); ?>"><i class="fa fa-circle-o"></i>Classement client</a></li>
        <li><a href="<?php echo e(route('saleDay')); ?>"><i class="fa fa-circle-o"></i> Etat des ventes du jour</a></li>
        <li><a href="<?php echo e(route('totake')); ?>"><i class="fa fa-circle-o"></i> Retrait du jour</a></li>
        <li>
      </ul>
    </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart"></i>
          <span>Logs d'impression</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('logs.index')); ?>"><i class="fa fa-circle-o"></i> Logs</a></li>
          <li><a href="<?php echo e(route('log.search')); ?>"><i class="fa fa-circle-o"></i> Recherche sur les logs</a></li>

        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'laveur')): ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart"></i>
          <span>Gestion du linge</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('traitements.waiting')); ?>"><i class="fa fa-circle-o"></i>En attente de traitement</a></li>
          <li><a href="<?php echo e(route('traitements.in_progress')); ?>"><i class="fa fa-circle-o"></i>En cours de traitement</a></li>
          <li><a href="<?php echo e(route('traitements.treated')); ?>"><i class="fa fa-circle-o"></i> Traité</a></li>
          <li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'classeur')): ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart"></i>
          <span>Traitement</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo e(route('traitements.treated_all')); ?>"><i class="fa fa-circle-o"></i>En attente de traitement</a></li>
            <li><a href="<?php echo e(route('traitements.classed')); ?>"><i class="fa fa-circle-o"></i> Classé</a></li>
          <li>
        </ul>
      </li>
    <?php endif; ?>




  </ul>
<?php /**PATH /home/sparqrqm/public_html/testing/resources/views/inc/menu.blade.php ENDPATH**/ ?>