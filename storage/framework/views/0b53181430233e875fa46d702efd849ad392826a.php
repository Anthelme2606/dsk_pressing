<ul class="sidebar-menu" data-widget="tree">
    <li class="header" style="background-color: rgb(54, 117, 98); color:white;">MENU</li>
    
    
    
    
    <li>
      <a href="<?php echo e(route('clientarea')); ?>">
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
        <li><a href="<?php echo e(route('profil-client')); ?>"><i class="fa fa-circle-o"></i> Mon profil</a></li>
        <li><a href="<?php echo e(route('setting-client')); ?>"><i class="fa fa-circle-o"></i> Changer mot de passe</a></li>
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
          <li><a href="<?php echo e(route('clientdeposit')); ?>"><i class="fa fa-circle-o"></i> Mes dépôts</a></li>
          <li><a href="<?php echo e(route('clientwithdraw')); ?>"><i class="fa fa-circle-o"></i> Mes retraits</a></li>
        </ul>
    </li>

    


  </ul>
<?php /**PATH /home/sparqrqm/public_html/testing/resources/views/inc/menu2.blade.php ENDPATH**/ ?>