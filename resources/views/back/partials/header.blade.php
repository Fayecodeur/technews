   <div class="header">
       <div class="header-left">
           <a href="index.html" class="logo">
               <span class="logoclass">Technews</span>
           </a>
       </div>
       <a href="javascript:void(0);" id="toggle_btn">
           <i class="fe fe-text-align-left"></i>
       </a>
       <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
       <ul class="nav user-menu">

           <li class="nav-item dropdown has-arrow">
               <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                   <span class="user-img"> <img src="{{ asset('storage/profile/' . Auth::user()->image) }}"
                           alt="Photo de profil" width="40" height="40"
                           style="border-radius: 50%; object-fit: cover;"></span>
               </a>
               <div class="dropdown-menu">
                   <div class="user-header">
                       <div class="avatar avatar-sm">
                           <img src="assets/img/profiles/avatar-01.png" alt="User Image"
                               class="avatar-img rounded-circle" />
                       </div>
                       <div class="user-text">
                           <h6>{{ Auth::user()->name }}</h6>
                           <p class="text-muted mb-0">Administrateur</p>
                       </div>
                   </div>
                   <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                   <a class="dropdown-item" href="settings.html">Paramettre</a>
                   <form action="{{ route('logout') }}" method="POST">
                       @csrf
                       <button class="dropdown-item">Deconnexion</button>
                   </form>
               </div>
           </li>
       </ul>
       <div class="top-nav-search">
           <form>
               <input type="text" class="form-control" placeholder="Search here" />
               <button class="btn" type="submit">
                   <i class="fas fa-search"></i>
               </button>
           </form>
       </div>
   </div>
