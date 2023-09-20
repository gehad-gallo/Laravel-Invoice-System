
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  
  <div class="app-brand demo ">
    <a href="index.html" class="app-brand-link">
      <img src="{{asset('assets/img/icons/brands/slack.png')}}">
      <span class="app-brand-text demo menu-text fw-bold">Pixi</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  
  
  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item">
  
  <li class="menu-item">
      <a href="{{route('dashboard')}}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>
  <li class="menu-item">
      <a href="{{route('departments')}}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
        <div data-i18n="Departments">Departments</div>
      </a>
    </li>
    </li>


  
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons ti ti-file-dollar'></i>
        <div data-i18n="Invoice">Invoice</div>
      </a>
      <ul class="menu-sub">
       
        <li class="menu-item">
          <a href="{{route('all.invoices')}}" class="menu-link">
            <div data-i18n="Invoices">Invoices</div>
          </a>
        </li>
    
        <li class="menu-item">
          <a href="{{route('add.invoice')}}" class="menu-link">
            <div data-i18n="Create Invoice">Create Invoice</div>
          </a>
        </li>
      </ul>
    </li>
 
 

    <!-- Components -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Employees</span>
    </li>
    <!-- Cards -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Employees">Employees</div>
        <div class="badge bg-label-primary rounded-pill ms-auto">6</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('all.sales.persons')}}" class="menu-link">
            <div data-i18n="Sales Persons">Sales Persons</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="cards-advance.html" class="menu-link">
            <div data-i18n="Support Persons">Support Persons</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="cards-statistics.html" class="menu-link">
            <div data-i18n="Operation offeciers">Operation offeciers</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="cards-analytics.html" class="menu-link">
            <div data-i18n="Deleviery persons">Deleviery persons</div>
          </a>
        </li>
        
      </ul>
    </li>



    <!-- Components -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Clients</span>
    </li>
    <!-- Cards -->
      <li class="menu-item">
      <a href="{{route('all.clients')}}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-layout-grid"></i>
        <div data-i18n="Clients">Clients</div>
      </a>
    </li>
      </ul>
    </li>
 

   
  </ul>
  
  

</aside>