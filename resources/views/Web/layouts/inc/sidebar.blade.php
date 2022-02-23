<?php //use Illuminate\Http\Request; ?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/" target="_blank">
            <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="me-1 font-weight-bold">{{$setting->sitr_title}}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse px-0 w-auto h-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{Route::is('/') ? 'active' :''}}  {{--{{ request()->is('admin/*') || checkActive(url('admin')) ? 'active' : '' }}--}}" href="{{url('admin')}}" >
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                                            <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text me-1">الرئيسية</span>
                </a>

            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 me-4 text-uppercase text-xs font-weight-bolder opacity-6">الادارات الرئيسية</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link active_main_tap {{Route::is('orders.*') ? 'active' :'collapsed'}}" aria-controls="pagesExamples" role="button" aria-expanded="{{Route::is('orders.*')? 'true' :'false'}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center ms-2">
                        <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>office</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g id="office" transform="translate(153.000000, 2.000000)">
                                            <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" opacity="0.6"></path>
                                            <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text me-1">الطلبات</span>
                </a>
                <div class="collapse {{Route::is('orders.*') ? 'show' :''}}" id="pagesExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('orders.new') ? 'active' :''}}" {{--data-bs-toggle="collapse" aria-expanded="false"--}} href="{{aurl('orders/new')}}">
                                <span class="sidenav-mini-icon"> ط ج </span>
                                <span class="sidenav-normal"> الطلبات الجديدة <b class="caret"></b></span>
                            </a>
{{--                            <div class="collapse " id="profileExample">--}}
{{--                                <ul class="nav nav-sm flex-column">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link " href="../../pages/pages/profile/overview.html">--}}
{{--                                            <span class="sidenav-mini-icon text-xs"> P </span>--}}
{{--                                            <span class="sidenav-normal"> Profile Overview </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link " href="../../pages/pages/profile/teams.html">--}}
{{--                                            <span class="sidenav-mini-icon text-xs"> T </span>--}}
{{--                                            <span class="sidenav-normal"> Teams </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link " href="../../pages/pages/profile/projects.html">--}}
{{--                                            <span class="sidenav-mini-icon text-xs"> A </span>--}}
{{--                                            <span class="sidenav-normal"> All Projects </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('orders.current') ? 'active' :''}}" href="{{aurl('orders/current')}}">
                                <span class="sidenav-mini-icon"> ط ح </span>
                                <span class="sidenav-normal"> الطلبات الحالية <b class="caret"></b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('orders.previous') ? 'active' :''}}" href="{{aurl('orders/previous')}}">
                                <span class="sidenav-mini-icon"> ط ح </span>
                                <span class="sidenav-normal"> الطلبات المنتهية <b class="caret"></b></span>
                            </a>
                        </li>
{{--                        <li class="nav-item ">--}}
{{--                            <a class="nav-link " --}}{{--data-bs-toggle="collapse" aria-expanded="false"--}}{{-- href="#profileExample">--}}
{{--                                <span class="sidenav-mini-icon"> م </span>--}}
{{--                                <span class="sidenav-normal"> المستخدمين <b class="caret"></b></span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse " id="profileExample">--}}
{{--                                <ul class="nav nav-sm flex-column">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link " href="../../pages/pages/profile/overview.html">--}}
{{--                                            <span class="sidenav-mini-icon text-xs"> P </span>--}}
{{--                                            <span class="sidenav-normal"> Profile Overview </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link " href="../../pages/pages/profile/teams.html">--}}
{{--                                            <span class="sidenav-mini-icon text-xs"> T </span>--}}
{{--                                            <span class="sidenav-normal"> Teams </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link " href="../../pages/pages/profile/projects.html">--}}
{{--                                            <span class="sidenav-mini-icon text-xs"> A </span>--}}
{{--                                            <span class="sidenav-normal"> All Projects </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link active_main_tap {{Route::is('drivers.*')? 'active' :'collapsed'}}" aria-controls="componentsExamples" role="button" aria-expanded="{{Route::is('/drivers/*')? 'true' :'false'}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns:svgjs="http://svgjs.com/svgjs" width="12px" height="12px"  x="0" y="0"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <title>المندوبين</title>
                            <g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m356.261 512c-.864-2.862-1.454-5.757-2.571-8.584-15.952-40.342-54.301-66.416-97.69-66.416-7.383 0-14.573.802-21.53 2.26l72.74 72.74z"
                                        fill="#000000" class="color-background" data-original="#000000"></path>
                                    <path
                                        d="m155.896 512h108.893l-60.707-60.707c-23.04 13.246-40.385 34.788-48.186 60.707z"
                                        fill="#000000" class="color-background" data-original="#000000"></path>
                                    <path
                                        d="m387.477 512h63.523v-75c0-41.353-33.647-75-75-75h-218.789l53.41 53.41c14.249-5.129 29.385-8.41 45.379-8.41 55.781 0 105.073 33.516 125.581 85.386 2.549 6.445 4.384 13.011 5.896 19.614z"
                                        fill="#000000" class="color-background" data-original="#000000"></path>
                                    <path
                                        d="m182.064 429.275-64.658-64.658c-32.335 8.329-56.406 37.485-56.406 72.383v75h63.625c7.872-34.437 28.788-63.871 57.439-82.725z"
                                        fill="#000000" class="color-background" data-original="#000000"></path>
                                    <path
                                        d="m391 90c0-50.464-59.297-90-135-90s-135 39.536-135 90c0 11.867 3.442 21.63 8.661 30h252.678c5.219-8.37 8.661-18.133 8.661-30z"
                                        fill="#000000" class="color-background" data-original="#000000"></path>
                                    <path
                                        d="m151 198.788v26.212c0 57.891 47.109 107 105 107s105-49.109 105-107v-26.212c-23.937 16.286-60.461 26.212-105 26.212s-81.063-9.926-105-26.212z"
                                        fill="#000000" class="color-background" data-original="#000000"></path>
                                    <path d="m151 150c0 24.853 47.01 45 105 45s105-20.147 105-45z" fill="#000000"
                                          data-original="#000000" class="color-background"></path>
                                </g>
                            </g></svg>

                    </div>
                    <span class="nav-link-text me-1">المندوبين</span>
                </a>
                <div class="collapse {{Route::is('drivers.*') ? 'show' :''}}" id="componentsExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('drivers.all') ? 'active' :''}}" href="{{aurl('drivers/all')}}" >
                                <span class="sidenav-mini-icon"> م </span>
                                <span class="sidenav-normal"> كل المندوبين </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#clientsExamples" class="nav-link active_main_tap {{Route::is('clients.*')? 'active' :'collapsed'}}" aria-controls="componentsExamples" role="button" aria-expanded="{{Route::is('clients.*')? 'true' :'false'}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center ms-2">
{{--                        <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
{{--                            <title>العملاء</title>--}}
{{--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">--}}
{{--                                    <g transform="translate(1716.000000, 291.000000)">--}}
{{--                                        <g transform="translate(1.000000, 0.000000)">--}}
{{--                                            <path class="color-background" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" opacity="0.59858631"></path>--}}
{{--                                            <path class="color-foreground" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>--}}
{{--                                            <path class="color-foreground" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>--}}
{{--                                        </g>--}}
{{--                                    </g>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
                        <svg  width="12px" height="12px"  xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                              xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                              viewBox="0 0 512 512.002" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <title>العملاء</title>
                            <g>
                                <path  class="color-background" xmlns="http://www.w3.org/2000/svg"
                                       d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0"
                                       fill="#000000" data-original="#000000"></path>
                                <path  class="color-background" xmlns="http://www.w3.org/2000/svg"
                                       d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0"
                                       fill="#000000" data-original="#000000"></path>
                            </g></svg>
                    </div>
                    <span class="nav-link-text me-1">العملاء</span>
                </a>
                <div class="collapse {{Route::is('clients.*') ? 'show' :''}}" id="clientsExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('clients.all') ? 'active' :''}}"  href="{{aurl('clients/all')}}" >
                                <span class="sidenav-mini-icon"> ع </span>
                                <span class="sidenav-normal"> كل العملاء </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#adminsExamples" class="nav-link active_main_tap {{Route::is('admins.*')? 'active' :'collapsed'}}" aria-controls="componentsExamples" role="button" aria-expanded="{{Route::is('admins.*')? 'true' :'false'}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center ms-2">
                        <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>المشرفين</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(1.000000, 0.000000)">
                                            <path class="color-background" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" opacity="0.59858631"></path>
                                            <path class="color-foreground" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                                            <path class="color-foreground" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text me-1">المشرفين</span>
                </a>
                <div class="collapse {{Route::is('admins.*') ? 'show' :''}}" id="adminsExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('admins.all') ? 'active' :''}}"  href="{{aurl('admins/all')}}" >
                                <span class="sidenav-mini-icon"> م </span>
                                <span class="sidenav-normal"> كل المشرفين </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#slidersExamples" class="nav-link active_main_tap {{Route::is('slider.*')? 'active' :'collapsed'}}" aria-controls="componentsExamples" role="button" aria-expanded="{{Route::is('slider.*')? 'true' :'false'}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns:svgjs="http://svgjs.com/svgjs" width="12px" height="12px" x="0" y="0"
                             viewBox="0 0 508 508" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <title>صور العرض</title>
                            <g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path class="color-background"
                                        d="m254 376c-22.056 0-40 17.944-40 40s17.944 40 40 40 40-17.944 40-40-17.944-40-40-40zm0 60c-11.028 0-20-8.972-20-20s8.972-20 20-20 20 8.972 20 20-8.972 20-20 20zm-140-54c-18.748 0-34 15.252-34 34s15.252 34 34 34 34-15.252 34-34-15.252-34-34-34zm0 48c-7.72 0-14-6.28-14-14s6.28-14 14-14 14 6.28 14 14-6.28 14-14 14zm280-48c-18.748 0-34 15.252-34 34s15.252 34 34 34 34-15.252 34-34-15.252-34-34-34zm0 48c-7.72 0-14-6.28-14-14s6.28-14 14-14 14 6.28 14 14-6.28 14-14 14zm-60-230c29.776 0 54-24.224 54-54s-24.224-54-54-54-54 24.224-54 54 24.224 54 54 54zm0-88c18.748 0 34 15.252 34 34s-15.252 34-34 34-34-15.252-34-34 15.252-34 34-34zm164 81.07c5.51 0 10 4.49 10 10s-4.49 10-10 10-10-4.49-10-10 4.49-10 10-10zm-488 20c-5.51 0-10-4.48-10-10 0-5.51 4.49-10 10-10s10 4.49 10 10c0 5.52-4.49 10-10 10zm468-131.428h-50v-19.642c0-5.523-4.477-10-10-10h-328c-5.523 0-10 4.477-10 10v20h-50c-16.569 0-30 13.431-30 30v45.723c0 5.318 4 9.973 9.306 10.334 5.822.397 10.694-4.236 10.694-9.976v-46.081c.01-5.5 4.5-9.99 10-10h50v206h-50c-5.5-.01-9.99-4.5-10-10v-49.93c0-5.74-4.872-10.373-10.694-9.976-5.306.361-9.306 5.016-9.306 10.334v49.572c0 16.569 13.431 30 30 30h50v20c0 5.523 4.477 10 10 10h328c5.523 0 10-4.477 10-10v-20.358h50c16.569 0 30-13.431 30-30v-49.572c0-5.318-4-9.973-9.306-10.334-5.822-.396-10.694 4.237-10.694 9.976v49.93c-.01 5.5-4.5 9.99-10 10h-50v-206h50c5.5.01 9.99 4.5 10 10v46.081c0 5.74 4.872 10.373 10.694 9.976 5.306-.361 9.306-5.016 9.306-10.334v-45.723c0-16.569-13.431-30-30-30zm-70-9.642v262.172l-133.226-124.538c-16.977-15.87-43.573-15.869-60.549 0l-29.901 27.951-73.111-91.388c-3.008-3.76-6.877-6.582-11.214-8.295v-65.902zm-308 92.195 99.601 124.5c8.322 10.402 23.939-2.092 15.617-12.494l-18.362-22.953 31.028-29.004c9.317-8.71 23.916-8.71 33.233 0l121.69 113.756h-282.807z"
                                        fill="#000000" data-original="#000000"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text me-1">صور العرض</span>
                </a>
                <div class="collapse {{Route::is('slider.*') ? 'show' :''}}" id="slidersExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('slider.all') ? 'active' :''}}"  href="{{aurl('slider/all')}}" >
                                <span class="sidenav-mini-icon"> ص </span>
                                <span class="sidenav-normal"> سلايدر الرئيسية </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('offerSlider.all') ? 'active' :''}}"  href="{{aurl('offerSlider/all')}}" >
                                <span class="sidenav-mini-icon"> ص </span>
                                <span class="sidenav-normal"> سلايدر الفروع </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#contactExamples" class="nav-link active_main_tap {{Route::is('contact.*')? 'active' :'collapsed'}}" aria-controls="componentsExamples" role="button" aria-expanded="{{Route::is('contact.*')? 'true' :'false'}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns:svgjs="http://svgjs.com/svgjs" width="12px" height="12px" x="0" y="0"
                             viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <title>قائمة الشكاوى</title>
                            <g>
                                <path xmlns="http://www.w3.org/2000/svg" class="color-background"
                                      d="m18 1h-12a5.006 5.006 0 0 0 -5 5v8a5.009 5.009 0 0 0 4 4.9v3.1a1 1 0 0 0 1.555.832l5.745-3.832h5.7a5.006 5.006 0 0 0 5-5v-8a5.006 5.006 0 0 0 -5-5zm-2 12h-8a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2zm2-4h-12a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2z"
                                      fill="#000000" data-original="#000000"></path>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text me-1">قائمة الشكاوى</span>
                </a>
                <div class="collapse {{Route::is('contact.*') ? 'show' :''}}" id="contactExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('contact.all') ? 'active' :''}}"  href="{{aurl('contact/all')}}" >
                                <span class="sidenav-mini-icon"> م </span>
                                <span class="sidenav-normal">  قائمة الشكاوى </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#settingExamples" class="nav-link active_main_tap {{Route::is('setting.*')? 'active' :'collapsed'}}" aria-controls="componentsExamples" role="button" aria-expanded="{{Route::is('setting.*')? 'true' :'false'}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="12px" height="12px" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                <title>الاعدادات العامة</title>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path class="color-background" d="M496.659,312.107l-47.061-36.8c0.597-5.675,1.109-12.309,1.109-19.328c0-7.019-0.491-13.653-1.109-19.328l47.104-36.821    c8.747-6.912,11.136-19.179,5.568-29.397L453.331,85.76c-5.227-9.557-16.683-14.464-28.309-10.176l-55.531,22.293    c-10.645-7.68-21.803-14.165-33.344-19.349l-8.448-58.901C326.312,8.448,316.584,0,305.086,0h-98.133    c-11.499,0-21.205,8.448-22.571,19.456l-8.469,59.115c-11.179,5.035-22.165,11.435-33.28,19.349l-55.68-22.357    C76.52,71.531,64.04,76.053,58.856,85.568L9.854,170.347c-5.781,9.771-3.392,22.464,5.547,29.547l47.061,36.8    c-0.747,7.189-1.109,13.44-1.109,19.307s0.363,12.117,1.109,19.328l-47.104,36.821c-8.747,6.933-11.115,19.2-5.547,29.397    l48.939,84.672c5.227,9.536,16.576,14.485,28.309,10.176l55.531-22.293c10.624,7.659,21.781,14.144,33.323,19.349l8.448,58.88    C185.747,503.552,195.454,512,206.974,512h98.133c11.499,0,21.227-8.448,22.592-19.456l8.469-59.093    c11.179-5.056,22.144-11.435,33.28-19.371l55.68,22.357c2.688,1.045,5.483,1.579,8.363,1.579c8.277,0,15.893-4.523,19.733-11.563    l49.152-85.12C507.838,331.349,505.448,319.083,496.659,312.107z M256.019,341.333c-47.061,0-85.333-38.272-85.333-85.333    s38.272-85.333,85.333-85.333s85.333,38.272,85.333,85.333S303.08,341.333,256.019,341.333z" fill="#000000" data-original="#000000"></path>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text me-1">الاعدادات العامة</span>
                </a>
                <div class="collapse {{Route::is('setting.*') ? 'show' :''}}" id="settingExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link {{Route::is('setting.all') ? 'active' :''}}"  href="{{aurl('setting/all')}}" >
                                <span class="sidenav-mini-icon"> ع </span>
                                <span class="sidenav-normal">  الاعدادات العامة </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


        </ul>
    </div>
{{--    <div class="sidenav-footer mx-3 mt-3 pt-3">--}}
{{--        <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">--}}
{{--            <div class="full-background" style="background-image: url('../../assets/img/curved-images/white-curved.jpg')"></div>--}}
{{--            <div class="card-body text-start p-3 w-100">--}}
{{--                <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">--}}
{{--                    <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>--}}
{{--                </div>--}}
{{--                <div class="docs-info">--}}
{{--                    <h6 class="text-white up mb-0 text-end">تحتاج مساعدة?</h6>--}}
{{--                    <p class="text-xs font-weight-bold text-end">يرجى التحقق من مستنداتنا</p>--}}
{{--                    <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/soft-ui-dashboard" target="_blank" class="btn btn-white btn-sm w-100 mb-0">توثيق</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</aside>

@push('admin_js')
    <script>
        $(document).on('click','.active_main_tap',function () {
            $('.active_main_tap').removeClass('active');
            $('.active_main_tap').attr('aria-expanded','false');
            // $(this).addClass('active');
            // $(this).attr('aria-expanded','true');
        })
    </script>
    <script>
        $(document).ready(function () {
            {{--alert({{Route::getCurrentRoute()->getPath()}})--}}
            {{--alert({{Route::getCurrentRoute()->getPath()}})--}}
            var links = $('a.nav-link') ;
            $('a.nav-link').each(function(key,value){
                // if(window.location == value){ //pathname
                //     alert(window.location )
                    // alert(value )
                // }

                // if (window.location.href.indexOf(value) != -1){
                {{--if({{Request::url()}} == value){--}}
                {{--    alert(value)--}}
                {{--}--}}
                // code
{{--                @endif--}}
                // if (value == window.location.pathname){
                //     alert(value)
                //     // $(this).parent().parent().parent().parent().find('.active_main_tap').addClass('active')
                //     return false;
                // // $('.active_main_tap').removeClass('active');
                // // $('.active_main_tap').attr('aria-expanded','false');
                // // $(this).addClass('active');
                // // $(this).next('.collapse').find().attr('href') == url()->current();
                // }
            })
        })
    </script>
@endpush
