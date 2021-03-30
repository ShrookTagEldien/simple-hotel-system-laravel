     <!-- Sidebar Menu -->
     <nav class="mt-2" style="min-height: 100%;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="/admin" class="nav-link @if (Route::current()->getName()== 'dash') active @endif">
              <!--<i class="nav-icon fas fa-tachometer-alt"></i>-->
              <p>
                DashBoard
                <!--<i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
            <a href="/admin/Manger" class="nav-link @if (Route::current()->getName()== 'Managers') active @endif">
               Manage Managers
            </a>
            <a href="/admin/receptionist" class="nav-link @if (Route::current()->getName()== 'rec') active @endif">
               Manage Receptionists
            </a>
            <a href="/admin/clients" class="nav-link @if (Route::current()->getName()== 'clients') active @endif">
              <p>
                Manage Clients
              </p>
            </a>
            <a href="/admin/floors" class="nav-link @if (Route::current()->getName()== 'floors') active @endif">
              <p>
                Manage Floors
              </p>
            </a>
            <a href="/admin/rooms" class="nav-link @if (Route::current()->getName()== 'rooms') active @endif">
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
