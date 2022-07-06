<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8" />
<title>@yield('title')</title>

<meta name="description" content="Latest updates and statistic charts" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>

{{-- Data Table --}}
<script src="//code.jquery.com/jquery.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
{{-- End Table --}}

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script src="{{asset('js/jscolor.js')}}"></script>

<script>
   WebFont.load({
    google: {
      families: [
        "Poppins:300,400,500,600,700",
        "Roboto:300,400,500,600,700"
      ]
    },
    active: function() {
      sessionStorage.fonts = true;
    }
  });
</script>

<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css"/>
<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css"/>
<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="{{asset('image/config/logo/'.$preset->dashboardLogo)}}"/>
<link href="assets/customize.css" rel="stylesheet" type="text/css" />

<style>
  .bodyBackround{
    background-color:  {{$preset->bodyBackround}};
  }
  .m-aside-menu.m-aside-menu--skin-light .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__heading .m-menu__link-text,
  .m-aside-menu.m-aside-menu--skin-light .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__link .m-menu__link-text,
  .m-aside-menu.m-aside-menu--skin-light .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__heading .m-menu__link-icon,
  .m-aside-menu.m-aside-menu--skin-light .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__link .m-menu__link-icon,
  .m-aside-left--minimize .m-aside-menu.m-aside-menu--skin-light .m-menu__nav > .m-menu__item.m-menu__item--expanded > .m-menu__link > .m-menu__link-icon,
  .m-aside-left--minimize .m-aside-menu.m-aside-menu--skin-light .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__link > .m-menu__link-icon,
  .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__heading .m-menu__link-text,
  .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__link .m-menu__link-text,
  .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__heading .m-menu__link-icon,
  .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__link .m-menu__link-icon,
  .m-aside-left--minimize .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--expanded > .m-menu__link > .m-menu__link-icon,
  .m-aside-left--minimize .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__link > .m-menu__link-icon 
  {
    color: {{$preset->iconActive}};
  }
</style>

</head>

  <body class="m-page--fluid m--skin-  m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default bodyBackround">
    <div class="m-grid m-grid--hor m-grid--root m-page">
      <header id="m_header" class="m-grid__item m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
          <div class="m-stack m-stack--ver m-stack--desktop" >

            <div class="m-stack__item m-brand  m-brand--skin-light" style="background-color: {{$preset->headerKiri}}">
              <div class="m-stack m-stack--ver m-stack--general">

                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                  <a href="{{route('welcome')}}" class="m-brand__logo-wrapper">
                    <img alt="" src="{{asset('image/config/logo/wk.png')}}" style="max-width:150px;height:50px;object-fit:cover "/>
                  </a>
                </div>

                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                  <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                    <span></span>
                  </a>
                  <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                    <span></span>
                  </a>
                  <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                    <i class="la la-ellipsis-v "></i>
                  </a>
                </div>

              </div>
            </div>

            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
              <div id="m_header_topbar" class="m-topbar m-stack m-stack--ver m-stack--general m-stack--fluid">
                <div class="m-stack__item m-topbar__nav-wrapper">

                  <ul class="m-topbar__nav m-nav m-nav--inline flex">
                    <li id="view-frontend" class="m-nav__item">
                      <a href="/resume/{{auth::user()->id}}" class="m-menu__link">
                        @if(auth::user()->role == 'alumni')
                        <span class=" m-menu__link-text">View Resume Page</span>
                        <i class="m-menu__link-icon la la-external-link"></i>
                        @endif
                      </a>
                    </li>

                    <li id="avatar" class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                      <a href="#" class="m-nav__link m-dropdown__toggle">
                        <span class="m-topbar__username">{{ Auth::user()->name }}</span>
                        <span class="m-topbar__userpic">
                          <img style="object-fit: cover; height: 40px ; width: 40px" src="{{asset('image/profiles/'.auth::user()->foto)}}" class="m--img-rounded m--marginless" alt=""/>
                        </span>
                      </a>

                      <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                          <div class="m-dropdown__inner">
                            <div class="m-dropdown__header m--align-center" style="background: url({{asset('assets/app/media/img/bg/bg-9.jpg')}}); background-size: cover;">
                              <div class="m-card-user m-card-user--skin-light">
                                <div class="m-card-user__pic">
                                  <img src="{{asset('image/profiles/'.auth::user()->foto)}}" class="m--img-rounded m--marginless" alt=""style="object-fit: cover; height: 70px ; width: 70px"/>
                                </div>
                                <div class="m-card-user__details">
                                  <span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
                                  <a href="" class="m-card-user__email m-link">{{ Auth::user()->email}}</a>
                                </div>
                              </div>
                            </div>
                            <div class="m-dropdown__body">
                              <div class="m-dropdown__content">
                                <ul class="m-nav m-nav--skin-light">
                                  <li class="m-nav__section m--hide">
                                    <span class="m-nav__section-text">Section</span>
                                  </li>
                                  {{-- <li class="m-nav__item">
                                    <a href="#" class="m-nav__link" data-toggle="modal" data-target="#myprofile">
                                    <i class="m-nav__link-icon la la-user"></i>
                                    <span class="m-nav__link-text">My Profile</span>
                                    </a>
                                  </li> --}}
                                  <li class="m-nav__item">
                                    <a href="{{route('profiles')}}" class="m-nav__link">
                                    <i class="m-nav__link-icon la la-user"></i>
                                    <span class="m-nav__link-text">My Profile</span>
                                    </a>
                                  </li>
                                  <li class="m-nav__separator m-nav__separator--fit">

                                  </li>
                                  <li class="m-nav__item">
                                    <a href="{{route('logout')}}" class="m-nav__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      <i class="m-nav__link-icon la la-sign-out"></i>
                                      <span class="m-nav__link-text">Logout</span>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                      </form>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
          <i class="la la-close"></i>
        </button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
          <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
              <li class="m-menu__item @yield('dashboard')"aria-haspopup="true">
                <a href="{{url('/home')}}" class="m-menu__link ">
                  <i class="m-menu__link-icon la la-dashboard"></i>
                  <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                      <span class="m-menu__link-text">Dashboard</span>
                      <span class="m-menu__link-badge"></span>
                    </span>
                  </span>
                </a>
              </li>

              @if(auth::user()->role == 'admin')
              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Pengelolaan Alumni</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              {{-- sub-aside admin --}}
              <li class="m-menu__item @yield('dataAlumni')" aria-haspopup="true">
                <a href="{{url('/inputalumni')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-graduation-cap"></i>
                  <span class="m-menu__link-text"> Data Alumni</span>
                </a>
              </li>

              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Data Master</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              <li class="m-menu__item @yield('dataJurusan')" aria-haspopup="true">
                <a href="{{url('/inputjurusan')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-book"></i>
                  <span class="m-menu__link-text"> Data Jurusan</span>
                </a>
              </li>
              <li class="m-menu__item @yield('dataRayon')" aria-haspopup="true">
                <a href="{{url('/inputrayon')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-archive"></i>
                  <span class="m-menu__link-text"> Data Rayon</span>
                </a>
              </li>
              <li class="m-menu__item @yield('dataInstansi')" aria-haspopup="true">
                <a href="{{url('/inputinstansi')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-building"></i>
                  <span class="m-menu__link-text"> Data Instansi</span>
                </a>
              </li>

              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Landing Page</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              <li class="m-menu__item @yield('infosekolah')" aria-haspopup="true">
                <a href="{{url('/infosekolah')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-university"></i>
                  <span class="m-menu__link-text"> Informasi Sekolah</span>
                </a>
              </li>
              <li class="m-menu__item @yield('infolowongan')" aria-haspopup="true">
                <a href="{{url('/infolowongan')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-industry"></i>
                  <span class="m-menu__link-text"> Informasi Lowongan</span>
                </a>
              </li>
              <li class="m-menu__item @yield('pesan')" aria-haspopup="true">
                <a href="{{url('/pesan')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-envelope"></i>
                  <span class="m-menu__link-text"> Pesan</span>
                </a>
              </li>

              {{-- <li class="m-menu__item @yield('dataStatus')" aria-haspopup="true">
                <a href="{{route('inputstatus')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-user-plus"></i>
                  <span class="m-menu__link-text"> Status</span>
                </a>
              </li> --}}

              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Ketenagakerjaan</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              <li class="m-menu__item @yield('datalamaran')" aria-haspopup="true">
                <a href="{{url('/datalamaran')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-envelope"></i>
                  <span class="m-menu__link-text"> Data Lamaran</span>
                </a>
              </li>

              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Laporan</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              <li class="m-menu__item m-menu__item--submenu  @yield('laporan')" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-bar-chart"></i>
                  <span class="m-menu__link-text">Jejak Alumni</span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                      <li class="m-menu__item" aria-haspopup="true">
                        <a href="{{route('dataAlumni')}}" class="m-menu__link m-menu__toggle">
                          <i class="m-menu__link-icon la la-bar-chart"></i>
                          <span class="m-menu__link-text">Seluruh Jurusan</span>
                        </a>
                      </li>
                    </li>
                    <!-- //foreaech -->
                  </ul>
                </div>
              </li>

              <li class="m-menu__item @yield('color')" aria-haspopup="true">
                <a href="{{route('preset')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon la la-gears"></i>
                  <span class="m-menu__link-text">Color Preset</span>
                </a>
              </li>
              @endif

              @if(auth::user()->role == 'alumni')
              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Alumni</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              {{-- sub-aside alumni --}}
              <li class="m-menu__item @yield('dataAlumni')" aria-haspopup="true">
                <a href="{{route('status.edit')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-file"></i>
                  <span class="m-menu__link-text">Data Saya</span>
                </a>
              </li>
              <li class="m-menu__item @yield('portofolio')" aria-haspopup="true">
                <a href="{{url('/portofolio')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fas fa-medal"></i>
                  <span class="m-menu__link-text">Kelola Portofolio</span>
                </a>
              </li>
              <li class="m-menu__item @yield('RiwayatStatus')" aria-haspopup="true">
                <a href="{{url('/riwayatStatus')}}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-history"></i>
                  <span class="m-menu__link-text">Riwayat Pekerjaan</span>
                </a>
              </li>

              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Informasi</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              <li class="m-menu__item @yield('daftarinstansi')" aria-haspopup="true">
                <a href="{{url('/daftarinstansi')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-file"></i>
                  <span class="m-menu__link-text">Daftar Perusahaan</span>
                </a>
              </li>
              <li class="m-menu__item @yield('daftarinfolowongan')" aria-haspopup="true">
                <a href="{{url('daftarinfolowongan')}}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-history"></i>
                  <span class="m-menu__link-text">Daftar Lowongan</span>
                </a>
              </li>
              <li class="m-menu__item @yield('portofolio')" aria-haspopup="true">
                <a href="{{url('/portofolio')}}" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fas fa-medal"></i>
                  <span class="m-menu__link-text">Status Lamaran</span>
                </a>
              </li>
              @endif
            </ul>
          </div>
          <!-- END: Aside Menu -->
        </div>
{{--Modal Profile  --}}

@yield('content')
