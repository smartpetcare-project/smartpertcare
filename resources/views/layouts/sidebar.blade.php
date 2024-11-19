   <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
       <div class="sidebar-header">
           <div class="logo-icon">
               <img src="{{ URL::asset('main-website/images/resources/logosmartpetscare.png') }}" class="logo-img" alt="">
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
               <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="material-icons-outlined">spa</i></div>
                        <div class="menu-title">Reservasi Grooming</div>
                    </a>
                    <ul>
                        <li><a href="{{ url('/admin/grooming') }}"><i class="material-icons-outlined">arrow_right</i> Views</a></li>
                    </ul>
                </li>
           </ul>
           <!--end navigation-->
       </div>
   </aside>
   <!--end sidebar-->
