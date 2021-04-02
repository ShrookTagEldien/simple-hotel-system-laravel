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
            <!--<a href="/receptionist/receptionist" class="nav-link @if (Route::current()->getName()== 'rec') active @endif">-->
            <a href="{{ route('receptionist.showNonApprovedClients' )}}" class="btn btn-info" style="margin-bottom: 20px;">Manage Clients</a>

               Manage Clients
            </a>
            <!--
            <a href="/receptionist/clients" class="nav-link @if (Route::current()->getName()== 'clients') active @endif">
            -->
            
              <p>
                Approved Clients
              </p>
            </a>
            <!--
            <a href="/receptionist/floors" class="nav-link @if (Route::current()->getName()== 'floors') active @endif">
             -->
              <p>
                Clients Reservation
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
