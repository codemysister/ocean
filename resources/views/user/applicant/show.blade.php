@extends('layout.main')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-full max-w-full px-3 mt-6">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class=" rounded-t-2xl bg-black px-5 py-10">

                    <div class="flex justify-between">
                        <div>
                            <div class="flex gap-2 align-middle justify-between pb-0 mb-4">
                                <div class="flex gap-2 h-full">
                                    <h6 class="mb-1 text-white font-bold text-xl">{{$program->title}}</h6>
                                    @if ($program->intern_type == 'Paid')
                                    <span class="bg-green-700 text-white text-center text-xs font-medium mr-2 px-2.5 py-0.5 pt-1.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{$program->intern_type}}</span>
                                    @else
                                    <span class="bg-gray-700 text-white text-center text-xs font-medium mr-2 px-2.5 py-0.5 pt-1.5 rounded dark:bg-gray-700 dark:text-green-400 border border-white">{{$program->intern_type}}</span>
                                    @endif
                                </div>
                            </div>

                            <p class="text-xs text-white"><b>Skema : </b>{{$program->work_mode}}</p>
                            <p class="text-xs text-white"><b>Durasi : </b>{{$program->duration}} bulan</p>
                            <p class="text-xs text-white"><b>Periode : </b>{{Carbon\Carbon::parse($program->start)->locale('id')->isoFormat('D MMMM YYYY')}} - {{Carbon\Carbon::parse($program->end)->locale('id')->isoFormat('D MMMM YYYY')}}</p>
                            <p class="text-xs text-white"><b>Domisili : </b>{{$program->mitra->address}}</p>
                        </div>


                    </div>
                </div>


                @include('user.applicant.partial.navbar_program')


                <div class="p-5 flex flex-col sm:flex-row text-sm">

                    <div class="w-full md:w-1/2">
                        <div class="mb-4">
                            <label for="" class="font-bold block">Deskripsi</label>
                            <p>
                                @php
                                $description = $program->description;
                                $description = str_replace('<ul>', '<ul style="list-style-type: disc; padding-left: 1rem">', $description);
                                    $description = str_replace('<ol>', '<ol style="list-style-type: decimal; padding-left: 1rem">', $description);
                                        @endphp
                                        {!! $description !!}
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="font-bold block mb-2">Guidebook</label>
                                    <a href="{{asset('/storage/'.$program->guidebook)}}" class="py-1 px-2 text-white bg-blue-400 rounded-lg"><i class="far fa-file-pdf pr-2"></i>guidebook.pdf</a>
                                </div>
                            </div>

                            @if (Auth::user()->hasRole('user'))
                            <div class="w-full md:w-1/2">
                                <label for="" class="font-bold block mb-2">Tentang Mitra</label>

                                <div class="flex gap-2 align-middle mb-2">
                                    <div class="relative h-[55px] w-[55px] max-h-[55px] max-w-[55px] shadow-xl rounded-2xl">
                                        <img src="{{asset('storage/'.$program->mitra->logo)}}" alt="img-blur-shadow" class="max-w-full shadow-soft-2xl w-full h-full rounded-2xl" />
                                    </div>

                                    <div>
                                        <p>{{$program->mitra->user->name}}</p>
                                        <a href="//{{ $program->mitra->website }}" class="text-blue-600">{{$program->mitra->website}}</a>
                                    </div>
                                </div>

                                <p>{{$program->mitra->address}}</p>

                            </div>
                            @endif


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
