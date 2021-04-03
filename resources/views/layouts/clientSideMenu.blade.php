     <!-- Sidebar Menu -->
     <nav class="mt-2" style="height: auto">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            
            <a href="{{route('home')}}"class="nav-link @if (Route::current()->getName()== 'reservation.create') active @endif">
              Make Reservation
            </a>
            <a href="{{route('reservation.list')}}" class="nav-link @if (Route::current()->getName()== 'reservation.myClients') active @endif">
              <p>
                My Reservations
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>