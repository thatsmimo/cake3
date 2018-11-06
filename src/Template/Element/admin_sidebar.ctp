<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= $this->request->webroot ?>img/<?= $setting['logo'] ?>" height="128px" width="128px" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $setting['site_name']?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $this->request->webroot ?>img/<?= $userDetails['image'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  class="d-block"><?= $userDetails['username'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($this->request->params['controller'] == 'Users'){  ?>

          <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
			  <?php if ($this->request->params['action'] == 'home'){ $className = 'active'; }else{ $className = ''; } ?>
                <a href="<?php echo $this->Url->build(['controller'=> 'users','action'=>'home','prefix'=>'admin']) ?>" class="nav-link <?= $className ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
			  <?php if ($this->request->params['action'] == 'settings'){ $className1 = 'active'; }else{ $className1 = ''; } ?>
                <a href="<?php echo $this->Url->build(['controller'=> 'users','action'=>'settings','prefix'=>'admin']) ?>" class="nav-link <?= $className1 ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Site Settings</p>
                </a>
              </li>
            </ul>
          </li>
		  <?php }else { ?>

          <li class="nav-item has-treeview ">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'home', 'prefix' => 'admin']) ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $this->Url->build(['controller'=> 'users','action'=>'settings','prefix'=>'admin']) ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Site Settings</p>
                </a>
              </li>
            </ul>
          </li>
		  <?php } ?>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($this->request->params['controller'] == 'Sites') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Site Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
			  <?php if ($this->request->params['action'] == 'add') {
                $className = 'active';
              } else {
                $className = '';
              } ?>
                <a href="<?php echo $this->Url->build(['controller' => 'sites', 'action' => 'add', 'prefix' => 'admin']) ?>" class="nav-link <?= $className ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
			  <?php if ($this->request->params['action'] == 'list') {
                $className1 = 'active';
              } else {
                $className1 = '';
              } ?>
                <a href="<?php echo $this->Url->build(['controller' => 'sites', 'action' => 'list', 'prefix' => 'admin']) ?>" class="nav-link <?= $className1 ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
		  <?php 
  } else { ?>

          <li class="nav-item has-treeview ">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Site Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $this->Url->build(['controller' => 'sites', 'action' => 'add', 'prefix' => 'admin']) ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $this->Url->build(['controller' => 'sites', 'action' => 'list', 'prefix' => 'admin']) ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
		  <?php 
  } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>