     <!-- Sidebar Menu -->
     <nav class="mt-2" style="height: auto">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="/manager" class="nav-link @if (Route::current()->getName()== 'dash') active @endif">
              <!--<i class="nav-icon fas fa-tachometer-alt"></i>-->
              <p>
                DashBoard
                <!--<i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
            <a href="/manager/receptionist" class="nav-link @if (Route::current()->getName()== 'rec') active @endif">
               Manage Receptionists
            </a>
            <a href="/manager/clients" class="nav-link @if (Route::current()->getName()== 'clients') active @endif">
              <p>
                Manage Clients
              </p>
            </a>
            <a href="/manager/floors" class="nav-link @if (Route::current()->getName()== 'floors') active @endif">
              <p>
                Manage Floors
              </p>
            </a>
            <a href="/manager/rooms" class="nav-link @if (Route::current()->getName()== 'rooms') active @endif">
              <p>
              Manage Rooms
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------>
