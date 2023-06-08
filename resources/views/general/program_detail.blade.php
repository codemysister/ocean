@extends('layout.main')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-full max-w-full px-3 mt-6">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class=" rounded-t-2xl bg-black px-5 py-10">

                    <div class="flex justify-between align-middle">
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

                        @if (Auth::user()->hasRole('user'))

                        <div class="flex flex-col ">
                            <button data-modal-target="modal-daftar" data-modal-toggle="modal-daftar" class="text-white mt-[50%] bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Daftar</button>
                        </div>

                        @endif
                    </div>

                </div>
            </div>

            <div class="p-5">

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


    @if (Auth::user()->hasRole('user') && Auth::user()->profileUser->profileLengkap())

    {{-- Modal Daftar --}}
    <div id="modal-daftar" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Daftar
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-daftar">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="flex p-4 mb-4 text-sm text-white border border-blue-300 rounded-lg bg-blue-300 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div>
                            Cek data diri Anda sebelum mendaftar
                        </div>
                      </div>
                    <h2 class="text-center text-xl font-semibold">Data diri</h2>

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mx-auto">
                            <div class="mb-3">
                                <img class="rounded-full w-28 h-28 mx-auto" src="{{asset('storage/'.Auth::user()->profileUser->profile_image)}}" alt="image description">
                            </div>

                            <div class="flex flex-col mb-3">
                                <span class="text-sm font-medium text-slate-700 mb-2">Nama</span>
                                <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{Auth::user()->name}}"  disabled />
                            </div>

                            <div class="flex flex-col mb-3">
                                <span class="text-sm font-medium text-slate-700 mb-2">Email</span>
                                <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{Auth::user()->email}}"  disabled />
                            </div>

                            <div class="flex flex-col mb-3">
                                <span class="text-sm font-medium text-slate-700 mb-2">Nomor telepon</span>
                                <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="+62{{Auth::user()->profileUser->phone}}"  disabled />
                            </div>

                            <div class="flex flex-col mb-3">
                                <span class="text-sm font-medium text-slate-700 mb-2">Alamat</span>
                                <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{Auth::user()->profileUser->address}}"  disabled />
                            </div>

                            <div class="flex flex-col mb-3">
                                <span class="text-sm font-medium text-slate-700 mb-2">CV</span>
                                <input type="file" name="cv" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="cv..." aria-label="cv" aria-describedby="cv-addon" value="{{old('cv')}}" />
                                @error('cv')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex justify-center items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        <button data-modal-hide="modal-daftar" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endif
    @endsection
