@extends('layout.main')
@section('content')

<div class="w-full px-6 mx-auto">
    <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
        <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
    </div>
    <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-auto max-w-full px-3">
                <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                    @if (Auth::user()->hasRole('mitra') && Auth::user()->profileMitra->logo != null)
                    <img src="{{asset('storage/'.$user->profileMitra->logo)}}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl h-14" />
                    @else
                    <img src="{{asset('storage/profile_default.jpg')}}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl h-14" />
                    @endif
                </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                    <h5 class="mb-1">{{$user->name}}</h5>
                    <p class="mb-0 font-semibold leading-normal text-sm">{{$user->getRoleNames()[0]}}</p>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                <div class="relative right-0">
                    <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl" nav-pills role="tablist">

                        @if (Auth::user()->hasRole('mitra') && Auth::user()->profileMitra->profileLengkap())

                        <li class="z-30 flex-auto text-center">
                            <a href="{{route('mitra.program.index')}}" class="z-30 block font-semibold w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link active href="javascript:;" role="tab" aria-selected="true">
                                <span class="ml-1">Dashboard</span>
                            </a>
                        </li>

                        @else

                        <li class="z-30 flex-auto text-center w-full">
                            <a href="{{route('mitra.profile.edit', Auth::user()->profileMitra->uuid)}}" class="z-30 font-semibold block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link active href="javascript:;" role="tab" aria-selected="true">
                                <span class="ml-1">Lengkapi Profile</span>
                            </a>
                        </li>

                        @endif

                        {{-- <li class="z-30 flex-auto text-center">
                            <a class="z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                                <svg class="text-slate-700" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>document</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(154.000000, 300.000000)">
                                                    <path class="fill-slate-800" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                                    <path class="fill-slate-800" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ml-1">Messages</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                                <svg class="text-slate-700" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>settings</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(304.000000, 151.000000)">
                                                    <polygon class="fill-slate-800" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                                                    <path class="fill-slate-800" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                                    <path class="fill-slate-800" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ml-1">Settings</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-full max-w-full px-3 mt-6">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex justify-between align-middle">

                    <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
                        <h6 class="mb-1">Program</h6>
                        <p class="leading-normal text-sm">Architects design houses</p>
                    </div>

                    @if (Auth::user()->hasRole('mitra') && Auth::user()->profileMitra->profileLengkap())

                    <div class="p-4 mt-1">
                        <a href="{{route('mitra.program.create')}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">Buat Program</a>
                    </div>

                    @else

                    <div class="p-4 mt-1">
                        <a href="{{route('btn.profile')}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">Buat Program</a>
                    </div>

                    @endif


                </div>
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                <div class="relative">
                                    <a class="block shadow-xl rounded-2xl">
                                        <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="max-w-full shadow-soft-2xl rounded-2xl" />
                                    </a>
                                </div>
                                <div class="flex-auto px-1 pt-6">
                                    <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-slate-800 text-sm bg-clip-text">Project #2</p>
                                    <a href="javascript:;">
                                        <h5>Modern</h5>
                                    </a>
                                    <p class="mb-6 leading-normal text-sm">As Uber works through a huge amount of internal management turmoil.</p>
                                    <div class="flex items-center justify-between">
                                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">View Project</button>
                                        <div class="mt-2">
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-1.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Elena Morison
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-2.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Ryan Milly
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-3.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Nick Daniel
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-4.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Peterson
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                <div class="relative">
                                    <a class="block shadow-xl rounded-2xl">
                                        <img src="../assets/img/home-decor-2.jpg" alt="img-blur-shadow" class="max-w-full shadow-soft-2xl rounded-xl" />
                                    </a>
                                </div>
                                <div class="flex-auto px-1 pt-6">
                                    <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-slate-800 text-sm bg-clip-text">Project #1</p>
                                    <a href="javascript:;">
                                        <h5>Scandinavian</h5>
                                    </a>
                                    <p class="mb-6 leading-normal text-sm">Music is something that every person has his or her own specific opinion about.</p>
                                    <div class="flex items-center justify-between">
                                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">View Project</button>
                                        <div class="mt-2">
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-3.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Nick Daniel
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-4.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Peterson
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-1.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Elena Morison
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-2.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Ryan Milly
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                <div class="relative">
                                    <a class="block shadow-xl rounded-2xl">
                                        <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow" class="max-w-full shadow-soft-2xl rounded-2xl" />
                                    </a>
                                </div>
                                <div class="flex-auto px-1 pt-6">
                                    <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-slate-800 text-sm bg-clip-text">Project #3</p>
                                    <a href="javascript:;">
                                        <h5>Minimalist</h5>
                                    </a>
                                    <p class="mb-6 leading-normal text-sm">Different people have different taste, and various types of music.</p>
                                    <div class="flex items-center justify-between">
                                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">View Project</button>
                                        <div class="mt-2">
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-4.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Peterson
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-3.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Nick Daniel
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-2.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Ryan Milly
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-1.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Elena Morison
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                <div class="relative">
                                    <a class="block shadow-xl rounded-2xl">
                                        <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow" class="max-w-full shadow-soft-2xl rounded-2xl" />
                                    </a>
                                </div>
                                <div class="flex-auto px-1 pt-6">
                                    <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-slate-800 text-sm bg-clip-text">Project #3</p>
                                    <a href="javascript:;">
                                        <h5>Minimalist</h5>
                                    </a>
                                    <p class="mb-6 leading-normal text-sm">Different people have different taste, and various types of music.</p>
                                    <div class="flex items-center justify-between">
                                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">View Project</button>
                                        <div class="mt-2">
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-4.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Peterson
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-3.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Nick Daniel
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-2.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Ryan Milly
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                            <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid ease-soft-in-out text-xs rounded-circle hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
                                                <img class="w-full rounded-circle" alt="Image placeholder" src="../assets/img/team-1.jpg" />
                                            </a>
                                            <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm" role="tooltip">
                                                Elena Morison
                                                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="pt-4">
        <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                    <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                        ©
                        <script>
                            document.write(new Date().getFullYear() + ",");
                        </script>
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                    <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://creative-tim.com/blog" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>



@endsection
