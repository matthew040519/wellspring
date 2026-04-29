<nav class="navbar navbar-vertical navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <!-- scrollbar removed-->
          <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
              <li class="nav-item">
                <!-- parent pages-->
                @if(Auth::user()->role == 1)
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-home" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon-wrapper"><span class="fas fa-caret-right dropdown-indicator-icon"></span></div><span class="nav-link-icon"><span data-feather="pie-chart"></span></span><span class="nav-link-text">Home</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                      <li class="collapsed-nav-item-title d-none">Home
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/admin/dashboard">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Home</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/admin/products">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Products</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/admin/orders">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Orders</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div>
                @elseif(Auth::user()->role == 3)
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-home" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon-wrapper"><span class="fas fa-caret-right dropdown-indicator-icon"></span></div><span class="nav-link-icon"><span data-feather="pie-chart"></span></span><span class="nav-link-text">Home</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                      <li class="collapsed-nav-item-title d-none">Home
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/merchant/home">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Home</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div>
                @elseif(Auth::user()->role == 2)
                <li class="nav-item">
                <!-- label-->
                    <div class="nav-item-wrapper">
                      <div class="d-flex align-items-center px-3 py-2">
                        {{-- <span class="nav-link-icon"><span data-feather="package"></span></span> --}}
                        <span class="nav-link-text-wrapper ms-2">
                          <strong>Subscription:</strong>
                          <span style="color: {{ Auth::user()->member->package ? '#198754' : '#dc3545' }};">
                            {{ Auth::user()->member->package ? Auth::user()->member->package->package_name : 'No Active Package' }}
                          </span>
                        </span>
                      </div>
                    </div>
                    <div class="nav-item-wrapper">
                     
                    </div>  
                    <p class="navbar-vertical-label">Dashboard</p>
                    <hr class="navbar-vertical-line" />
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/home" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="home"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Home</span></span>
                        </div>
                      </a>
                    </div>
                </li>
                <div class="nav-item-wrapper">
                  <a class="nav-link dropdown-indicator label-1" href="#nv-wallets" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-wallets">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon-wrapper"><span class="fas fa-caret-right dropdown-indicator-icon"></span></div><span class="nav-link-icon"><span class="fa fa-wallet"></span></span><span class="nav-link-text">Wallets</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" id="nv-wallets" data-bs-parent="#navbarVerticalCollapse">
                      <li class="collapsed-nav-item-title d-none">Wallets
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/members/dashboard">
                          <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa fa-wallet"></i>  Commission Wallet</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/members/top-up-wallet">
                          <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa fa-arrow-up"></i> Top Up Wallet</span>
                          
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/members/withdrawal-wallet">
                          <div class="d-flex align-items-center"><span class="nav-link-text"> <i class="fa fa-money-bill-wave"></i> Withdrawal Wallet</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/members/airdrop-wallet">
                          <div class="d-flex align-items-center"><span class="nav-link-text"> <i class="fa fa-rocket"></i> Airdrop Wallet</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      
                    </ul>
                  </div>
                </div>
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/genealogy/{{ Auth::user()->member->id }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="git-branch"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Genealogy</span></span>
                        </div>
                      </a>
                    </div>
                <div class="nav-item-wrapper">
                  <a class="nav-link dropdown-indicator label-1" href="#nv-reports" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-reports">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon-wrapper"><span class="fas fa-caret-right dropdown-indicator-icon"></span></div><span class="nav-link-icon"><span class="fa fa-chart-bar"></span></span><span class="nav-link-text">Reports</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" id="nv-reports" data-bs-parent="#navbarVerticalCollapse">
                      <li class="collapsed-nav-item-title d-none">Reports
                      </li>
                     <li class="nav-item"><a class="nav-link" href="/members/pairing-report">
                          <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa fa-link"></i> Pairing Report</span>
                          
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/members/direct-invite-report">
                          <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa fa-user-friends"></i> Direct Invite Report</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/members/daily-phx-report">
                          <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa fa-calendar-day"></i> Daily PHX Report</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/members/unilevel-report">
                          <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa fa-sitemap"></i> Unilevel Report</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/members/p2p-transfer-report">
                          <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa fa-recycle"></i> P2P Transfer Report</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div>
                <li class="nav-item">
                <!-- label-->
                    <p class="navbar-vertical-label">Portals
                    </p>
                    <hr class="navbar-vertical-line" />
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/package" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Subscription Plan</span></span>
                        </div>
                      </a>
                    </div>
                    {{-- <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/tasks" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="check-square"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Tasks</span></span>
                        </div>
                      </a>
                    </div> --}}
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/ads-program" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                          <span class="nav-link-icon"><span data-feather="tv"></span></span>
                          <span class="nav-link-text-wrapper">
                          <span class="nav-link-text">Ads Program</span>
                          </span>
                        </div>
                      </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/e-ventures" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span data-feather="briefcase"></span></span>
                          <span class="nav-link-text-wrapper">
                          <span class="nav-link-text">Co Ownership Program</span>
                          </span>
                        </div>
                      </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/e-market" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span data-feather="shopping-cart"></span></span>
                          <span class="nav-link-text-wrapper">
                          <span class="nav-link-text">E-Market</span>
                          </span>
                        </div>
                      </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/e-chat" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span data-feather="message-circle"></span></span>
                          <span class="nav-link-text-wrapper">
                          <span class="nav-link-text">E-Chat</span>
                          </span>
                        </div>
                      </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/games" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span data-feather="dribbble"></span></span>
                          <span class="nav-link-text-wrapper">
                          <span class="nav-link-text">E-Games</span>
                          </span>
                        </div>
                      </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/watchbox" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span data-feather="watch"></span></span>
                          <span class="nav-link-text-wrapper">
                          <span class="nav-link-text">E-WatchBox</span>
                          </span>
                        </div>
                      </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span data-feather="settings"></span></span>
                          <span class="nav-link-text-wrapper">
                          <span class="nav-link-text">E-Services</span>
                          </span>
                        </div>
                      </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="/members/e-loading" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span data-feather="smartphone"></span></span>
                          <span class="nav-link-text-wrapper">
                          <span class="nav-link-text">E-Loading</span>
                          </span>
                        </div>
                      </a>
                    </div>
                  </li>
                @endif
                <li class="nav-item">
                <!-- label-->
                    <p class="navbar-vertical-label">Account
                    </p>
                    <hr class="navbar-vertical-line" />
                    <!-- parent pages-->
                    @if(Auth::user()->role == 2)
                    <div class="nav-item-wrapper">
                      <a class="nav-link label-1" href="/members/profile" role="button" data-bs-toggle="" aria-expanded="false">Profile</a>
                    </div>
                    @endif
                     <div class="nav-item-wrapper">
                      {{-- <a class="nav-link label-1" href="/members/logout" role="button" data-bs-toggle="" aria-expanded="false">Logout</a> --}}
                       <a class="nav-link label-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="get" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
              </li>
            </ul>
          </div>
        </div>
        <div class="navbar-vertical-footer">
          <button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button>
        </div>
      </nav>