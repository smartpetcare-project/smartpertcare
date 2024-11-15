   <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
       <div class="sidebar-header">
           <div class="logo-icon">
               <img src="{{ URL::asset('build/images/logo-icon.png') }}" class="logo-img" alt="">
           </div>
           <div class="logo-name flex-grow-1">
               <h5 class="mb-0">SmartPet Care</h5>
           </div>
           <div class="sidebar-close">
               <span class="material-icons-outlined">close</span>
           </div>
       </div>
       <div class="sidebar-nav">
           <!--navigation-->
           <ul class="metismenu" id="sidenav">
               <li>
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon"><i class="material-icons-outlined">home</i>
                       </div>
                       <div class="menu-title">Dashboard</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/admin') }}"><i class="material-icons-outlined">arrow_right</i>Analysis</a>
                       </li>                       
                   </ul>
               </li>                              
               {{-- <li class="menu-label">UI Elements</li> --}}
               {{-- <li>
                   <a href="{{ url('/cards') }}">
                       <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                       </div>
                       <div class="menu-title">Cards</div>
                   </a>
               </li> --}}
               {{-- <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon" style="font-size: 25px"><i class="fadeIn animated bx bx-world"></i>
                       </div>
                       <div class="menu-title">Website Utama</div>
                   </a>
                   <ul>
                       <li>
                           <a class="has-arrow" href="javascript:;">
                               <i class="material-icons-outlined">arrow_right</i>
                               Banner
                           </a>
                           <ul>
                               <li>
                                   <a href="{{ url('/admin/banner') }}">
                                       <i class="material-icons-outlined">arrow_right</i>
                                       View
                                   </a>
                               </li>
                               <li>
                                   <a href="{{ url('/admin/banner/create') }}">
                                       <i class="material-icons-outlined">arrow_right</i>
                                       Tambah Banner
                                   </a>
                               </li>
                           </ul>
                       </li>
                   </ul>
               </li> --}}
               <li>
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                       </div>
                       <div class="menu-title">Produk</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/admin/product') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Views</a>
                       </li>
                       <li><a href="{{ url('/admin/product/create') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Tambah
                               Produk</a>
                       </li>
                   </ul>
               </li>
               <li>
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon" style="font-size: 25px"><i
                               class="fadeIn animated bx bx-book-content"></i></div>
                       <div class="menu-title">Artikel</div>
                   </a>
                   <ul>
                       <li>
                           <a href="{{ url('/admin/article') }}"
                               class="{{ request()->is('article') || request()->is('article/preview/*') || request()->is('article/*') ? 'active' : '' }}">
                               <i class="material-icons-outlined">arrow_right</i>Views
                           </a>
                       </li>
                       <li>
                           <a href="{{ url('/admin/article/create') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Tambah
                               Artikel</a>
                       </li>
                   </ul>
               </li>

               <li>
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon" style="font-size: 25px"><i
                               class="fadeIn animated bx bx-book-content"></i></div>
                       <div class="menu-title">Layanan</div>
                   </a>
                   <ul>
                       <li>
                           <a href="{{ url('/admin/service') }}"
                               class="{{ request()->is('service') || request()->is('service/preview/*') || request()->is('service/*') ? 'active' : '' }}">
                               <i class="material-icons-outlined">arrow_right</i>Views
                           </a>
                       </li>
                       <li>
                           <a href="{{ url('/admin/service/create') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Tambah
                               Layanan</a>
                       </li>
                   </ul>
               </li>

               <li>
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon" style="font-size: 35px"><i class="fadeIn animated bx bx-list-check"></i>
                       </div>
                       <div class="menu-title">Kategori</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/admin/category') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Views</a>
                       </li>
                       <li><a href="{{ url('/admin/category/create') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Tambah Kategori</a>
                       </li>
                   </ul>
               </li>
               {{-- <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">card_giftcard</i>
                       </div>
                       <div class="menu-title">Components</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/component-alerts') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Alerts</a>
                       </li>
                       <li><a href="{{ url('/component-accordions') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Accordions</a>
                       </li>
                       <li><a href="{{ url('/component-badges') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Badges</a>
                       </li>
                       <li><a href="{{ url('/component-buttons') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Buttons</a>
                       </li>
                       <li><a href="{{ url('/component-carousels') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Carousels</a>
                       </li>
                       <li><a href="{{ url('/component-media-object') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Media
                               Objects</a>
                       </li>
                       <li><a href="{{ url('/component-modals') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Modals</a>
                       </li>
                       <li><a href="{{ url('/component-navs-tabs') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Navs & Tabs</a>
                       </li>
                       <li><a href="{{ url('/component-navbar') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Navbar</a>
                       </li>
                       <li><a href="{{ url('/component-paginations') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Pagination</a>
                       </li>
                       <li><a href="{{ url('/component-popovers-tooltips') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Popovers
                               & Tooltips</a>
                       </li>
                       <li><a href="{{ url('/component-progress-bars') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Progress</a>
                       </li>
                       <li><a href="{{ url('/component-spinners') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Spinners</a>
                       </li>
                       <li><a href="{{ url('/component-notifications') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Notifications</a>
                       </li>
                       <li><a href="{{ url('/component-avtars-chips') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Avatrs &
                               Chips</a>
                       </li>
                       <li><a href="{{ url('/component-typography') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Typography</a>
                       </li>
                       <li><a href="{{ url('/component-text-utilities') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Utilities</a>
                       </li>
                   </ul>
               </li>
               <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">view_agenda</i>
                       </div>
                       <div class="menu-title">Icons</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/icons-line-icons') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Line Icons</a>
                       </li>
                       <li><a href="{{ url('/icons-boxicons') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Boxicons</a>
                       </li>
                       <li><a href="{{ url('/icons-feather-icons') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Feather
                               Icons</a>
                       </li>
                   </ul>
               </li>
               <li class="menu-label">Forms & Tables</li>
               <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">toc</i>
                       </div>
                       <div class="menu-title">Forms</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/form-elements') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Form Elements</a>
                       </li>
                       <li><a href="{{ url('/form-input-group') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Input Groups</a>
                       </li>
                       <li><a href="{{ url('/form-radios-and-checkboxes') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Radios &
                               Checkboxes</a>
                       </li>
                       <li><a href="{{ url('/form-layouts') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Forms Layouts</a>
                       </li>
                       <li><a href="{{ url('/form-validations') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Form Validation</a>
                       </li>
                       <li><a href="{{ url('/form-wizard') }}"><i class="material-icons-outlined">arrow_right</i>Form
                               Wizard</a>
                       </li>
                       <li><a href="{{ url('/form-file-upload') }}"><i
                                   class="material-icons-outlined">arrow_right</i>File Upload</a>
                       </li>
                       <li><a href="{{ url('/form-date-time-pickes') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Date
                               Pickers</a>
                       </li>
                       <li><a href="{{ url('/form-select2') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Select2</a>
                       </li>
                       <li><a href="{{ url('/form-repeater') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Form Repeater</a>
                       </li>
                   </ul>
               </li>
               <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">api</i>
                       </div>
                       <div class="menu-title">Tables</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/table-basic-table') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Basic Table</a>
                       </li>
                       <li><a href="{{ url('/table-datatable') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Data Table</a>
                       </li>
                   </ul>
               </li>
               <li class="menu-label">Pages</li>
               <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">lock</i>
                       </div>
                       <div class="menu-title">Authentication</div>
                   </a>
                   <ul>
                       <li><a class="has-arrow" href="javascript:;"><i
                                   class="material-icons-outlined">arrow_right</i>Basic</a>
                           <ul>
                               <li><a href="{{ url('/auth-basic-login') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Login</a></li>
                               <li><a href="{{ url('/auth-basic-register') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Register</a></li>
                               <li><a href="{{ url('/auth-basic-forgot-password') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Forgot Password</a></li>
                               <li><a href="{{ url('/auth-basic-reset-password') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Reset Password</a></li>
                           </ul>
                       </li>
                       <li><a class="has-arrow" href="javascript:;"><i
                                   class="material-icons-outlined">arrow_right</i>Cover</a>
                           <ul>
                               <li><a href="{{ url('/auth-cover-login') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Login</a></li>
                               <li><a href="{{ url('/auth-cover-register') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Register</a></li>
                               <li><a href="{{ url('/auth-cover-forgot-password') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Forgot Password</a></li>
                               <li><a href="{{ url('/auth-cover-reset-password') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Reset Password</a></li>
                           </ul>
                       </li>
                       <li><a class="has-arrow" href="javascript:;"><i
                                   class="material-icons-outlined">arrow_right</i>Boxed</a>
                           <ul>
                               <li><a href="{{ url('/auth-boxed-login') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Login</a></li>
                               <li><a href="{{ url('/auth-boxed-register') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Register</a></li>
                               <li><a href="{{ url('/auth-boxed-forgot-password') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Forgot Password</a></li>
                               <li><a href="{{ url('/auth-boxed-reset-password') }}" target="_blank"><i
                                           class="material-icons-outlined">arrow_right</i>Reset Password</a></li>
                           </ul>
                       </li>
                   </ul>
               </li>
               <li>
                   <a href="{{ url('/user-profile') }}">
                       <div class="parent-icon"><i class="material-icons-outlined">person</i>
                       </div>
                       <div class="menu-title">User Profile</div>
                   </a>
               </li>
               <li>
                   <a href="{{ url('/timeline') }}">
                       <div class="parent-icon"><i class="material-icons-outlined">join_right</i>
                       </div>
                       <div class="menu-title">Timeline</div>
                   </a>
               </li>
               <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">report_problem</i>
                       </div>
                       <div class="menu-title">Pages</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/pages-error-404') }}" target="_blank"><i
                                   class="material-icons-outlined">arrow_right</i>404
                               Error</a>
                       </li>
                       <li><a href="{{ url('/pages-error-505') }}" target="_blank"><i
                                   class="material-icons-outlined">arrow_right</i>505
                               Error</a>
                       </li>
                       <li><a href="{{ url('/pages-coming-soon') }}" target="_blank"><i
                                   class="material-icons-outlined">arrow_right</i>Coming Soon</a>
                       </li>
                       <li><a href="{{ url('/pages-starter-page') }}" target="_blank"><i
                                   class="material-icons-outlined">arrow_right</i>Blank Page</a>
                       </li>
                   </ul>
               </li>
               <li>
                   <a href="{{ url('/faq') }}">
                       <div class="parent-icon"><i class="material-icons-outlined">help_outline</i>
                       </div>
                       <div class="menu-title">FAQ</div>
                   </a>
               </li>
               <li>
                   <a href="{{ url('/pricing-table') }}">
                       <div class="parent-icon"><i class="material-icons-outlined">sports_football</i>
                       </div>
                       <div class="menu-title">Pricing</div>
                   </a>
               </li>
               <li class="menu-label">Charts & Maps</li>
               <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">fitbit</i>
                       </div>
                       <div class="menu-title">Charts</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/charts-apex-chart') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Apex</a>
                       </li>
                       <li><a href="{{ url('/charts-chartjs') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Chartjs</a>
                       </li>
                   </ul>
               </li>
               <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">sports_football</i>
                       </div>
                       <div class="menu-title">Maps</div>
                   </a>
                   <ul>
                       <li><a href="{{ url('/map-google-maps') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Google Maps</a>
                       </li>
                       <li><a href="{{ url('/map-vector-maps') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Vector Maps</a>
                       </li>
                   </ul>
               </li>
               <li class="menu-label">Others</li>
               <li>
                   <a class="has-arrow" href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">face_5</i>
                       </div>
                       <div class="menu-title">Menu Levels</div>
                   </a>
                   <ul>
                       <li><a class="has-arrow" href="javascript:;"><i
                                   class="material-icons-outlined">arrow_right</i>Level
                               One</a>
                           <ul>
                               <li><a class="has-arrow" href="javascript:;"><i
                                           class="material-icons-outlined">arrow_right</i>Level
                                       Two</a>
                                   <ul>
                                       <li><a href="javascript:;"><i
                                                   class="material-icons-outlined">arrow_right</i>Level Three</a>
                                       </li>
                                   </ul>
                               </li>
                           </ul>
                       </li>
                   </ul>
               </li>
               <li>
                   <a href="javascript:void(0);">
                       <div class="parent-icon"><i class="material-icons-outlined">description</i>
                       </div>
                       <div class="menu-title">Documentation</div>
                   </a>
               </li>
               <li>
                   <a href="javascript:void(0);">
                       <div class="parent-icon"><i class="material-icons-outlined">support</i>
                       </div>
                       <div class="menu-title">Support</div>
                   </a>
               </li> --}}
           </ul>
           <!--end navigation-->
       </div>
   </aside>
   <!--end sidebar-->
