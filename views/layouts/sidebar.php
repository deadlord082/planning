<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>planning</title>
        </head>
    <body>
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <form action="index.php">
            <input name="route" value="home" hidden>
            <button type="submit" class="brand-link nav-link">
            <img src="./assets/logo.png" alt="Planning Logo" class="img-fluid elevation-3">
            </button>
        </form>
      
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="images/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">User hmmm user ?</a>
            </div>
          </div> -->
      
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <form action="index.php">
                        <input name="route" value="home" hidden>            
                        <button type="submit" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Acceuil</p>
                        </button>
                    </form>
                  </li>
                  <li class="nav-item">
                    <form action="index.php">
                        <input name="route" value="calendarClass" hidden>            
                        <button type="submit" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Calendrier Classe</p>
                        </button>
                    </form>
                  </li>
                  <li class="nav-item">
                    <form action="index.php">
                        <input name="route" value="listClass" hidden>            
                        <button type="submit" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Liste des classes</p>
                        </button>
                    </form>
                  </li>
                  <li class="nav-item">
                    <form action="index.php">
                        <input name="route" value="listModule" hidden>            
                        <button type="submit" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Liste des modules</p>
                        </button>
                    </form>
                  </li>
                  <li class="nav-item">
                    <form action="index.php">
                        <input name="route" value="listTeacher" hidden>            
                        <button type="submit" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Liste des formateurs</p>
                        </button>
                    </form>
                  </li>
                  <li class="nav-item">
                    <form action="index.php">
                        <input name="route" value="listGrade" hidden>            
                        <button type="submit" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Liste des niveaux</p>
                        </button>
                    </form>
                  </li>
                </ul>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
</body>
</html>