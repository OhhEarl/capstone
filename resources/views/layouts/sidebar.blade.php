<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <div class="text-center d-none d-md-inline">
    <button class="fa fa-bars" id="sidebarToggle"></button>
  </div>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
    <i class="fa fa-line-chart" aria-hidden="true"></i>
      <span>Dashboard</span></a>
      <hr class="sidebar-divider d-none d-md-block">
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('products') }}">
    <i class="fa fa-list-ul" aria-hidden="true"></i>
      <span>List of Foods</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sidebarToggle').click(function() {
            $('body').toggleClass('sidebar-toggled');
            $('#accordionSidebar').toggleClass('toggled');
        });
    });
</script>
