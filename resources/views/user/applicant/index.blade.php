@extends('layout.main')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-full max-w-full px-3 mt-6">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex justify-between align-middle">

                    <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
                        <h6 class="mb-1">Lamaran</h6>
                    </div>

                    {{-- <div class="p-4 mt-1">
                        <a href="{{route('mitra.program.create')}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">Buat Program</a>
                    </div> --}}


                </div>

                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        @forelse ($applicants as $programs)
                        <div class="w-full max-w-full  p-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                <div class="relative h-[200px] w-full max-h-[200px] shadow-xl rounded-2xl">
                                    <img src="{{asset('storage/'.$programs->program->mitra->logo)}}" alt="img-blur-shadow" class="max-w-full shadow-soft-2xl w-full h-full rounded-2xl" />
                                </div>

                                <div class="flex-auto px-1 pt-6">

                                    <a href="javascript:;">
                                        <h5>{{$programs->program->title}}</h5>
                                    </a>
                                    <p>@if ($programs->status == 'Terdaftar')
                                        <span class="bg-blue-300 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Terdaftar</span>
                                        @elseif ($programs->status == 'Seleksi')
                                        <span class="bg-yellow-300 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Seleksi</span>
                                        @elseif($programs->status == 'Interview')
                                        <span class="bg-lime-300 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-lime-900 dark:text-lime-300">Interview</span>
                                        @elseif($programs->status == 'Tidak Lolos')
                                        <span class="bg-red-300 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Lolos</span>
                                        @else
                                        <span class="bg-green-300 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Lolos</span>
                                        @endif</p>
                                    {{-- <p class="mb-6 leading-normal text-sm">{!!$program->description!!}</p> --}}
                                    <div class="flex items-center mt-4 ">
                                        <a href="{{route('user.applicant.show', $programs->program->slug)}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">Detail</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        @empty
                        <div class="flex justify-center w-full">
                            <h1 class="text-lg text-center font-semibold mb-4">Belum ada lamaran</h1>
                        </div>
                        @endforelse

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
