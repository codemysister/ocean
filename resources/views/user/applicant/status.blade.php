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

                    <div class="p-5 sm:w-1/3">


                        <ol class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">
                            <li class="mb-10 ml-6">
                                <span class="absolute flex items-center justify-center w-8 h-8 {{$applicant->status == 'Terdaftar' ? 'bg-green-300 ' : 'bg-gray-100'}} rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                    <svg aria-hidden="true" class="w-5 h-5 {{$applicant->status == 'Terdaftar' ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400'}} " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="font-medium leading-tight">Terdaftar</h3>
                                <p class="text-sm">Proses screening CV</p>
                            </li>
                            <li class="mb-10 ml-6">
                                <span class="absolute flex items-center justify-center w-8 h-8 {{$applicant->status == 'Seleksi' ? 'bg-green-300 ' : 'bg-gray-100'}} rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                    <svg aria-hidden="true" class="w-5 h-5 {{$applicant->status == 'Seleksi' ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400'}}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="font-medium leading-tight">Seleksi</h3>
                                <p class="text-sm">Proses pengerjaan tes intern</p>
                            </li>
                            <li class="mb-10 ml-6">
                                <span class="absolute flex items-center justify-center w-8 h-8 {{$applicant->status == 'Interview' ? 'bg-green-300 ' : 'bg-gray-100'}} rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                    <svg aria-hidden="true" class="w-5 h-5 {{$applicant->status == 'Interview' ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400'}} dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="font-medium leading-tight">Interview</h3>
                                <p class="text-sm">Proses interview</p>
                            </li>
                            <li class="ml-6">
                                <span class="absolute flex items-center justify-center w-8 h-8 {{$applicant->status == 'Lolos' ? 'bg-green-300 ' : 'bg-gray-100'}} rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                    <svg aria-hidden="true" class="w-5 h-5 {{$applicant->status == 'Lolos' ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400'}}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="font-medium leading-tight">Lolos</h3>
                                <p class="text-sm">Pengumuman lolos seleksi</p>
                            </li>
                        </ol>

                    </div>

                    <div class="w-[90%]  mx-auto ">
                        @if ($applicant->status == 'Terdaftar')

                        <h1 class="text-lg sm:mt-24 text-center font-semibold">Anda sedang memasuki proses screening CV</h1>
                        <p class="text-center font-semibold">Pantau terus progressmu ya</p>

                        @elseif($applicant->status == 'Seleksi')


                            @if ($program->submission == null)

                            <h1 class="text-lg text-center sm:mt-24 font-semibold mb-4">Anda sedang memasuki proses tes intern</h1>
                            <p class="text-center font-semibold">Belum ada tes / penugasan</p>

                            @else

                                @if ($applicant->submission == null)
                                <h1 class="text-lg text-center font-semibold mb-4">Anda sedang memasuki proses tes intern</h1>
                                <div class="mb-4">
                                    <label for="" class="font-bold block">Tugas Intern</label>
                                    <p>
                                        @php
                                        $description = $program->submission->description;
                                        $description = str_replace('<ul>', '<ul style="list-style-type: disc; padding-left: 1rem">', $description);
                                            $description = str_replace('<ol>', '<ol style="list-style-type: decimal; padding-left: 1rem">', $description);
                                                @endphp
                                                {!! $description !!}
                                            </p>
                                        </div>


                                        <div class="mb-4">
                                            <label for="" class="font-bold block mb-2">File tugas</label>
                                            <a href="{{asset('/storage/'.$program->submission->submission)}}" class="py-1 w-full px-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 rounded-lg"><i class="far fa-file-pdf pr-2"></i>tugas</a>
                                        </div>

                                        <div class="mb-4">
                                            <p><b>Deadline</b> : {{Carbon\Carbon::create($program->submission->deadline, 'Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM YYYY, HH:mm \W\I\B')}}</p>
                                        </div>

                                        <div class="mb-4">
                                            <label for="" class="font-bold block mb-2">Pengumpulan</label>
                                            <form action="{{route('user.applicant.submit', ['program' => $program, 'applicant' => $applicant])}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="submission" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="submission..." aria-label="submission" aria-describedby="submission-addon" />
                                                @error('submission')
                                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                                @enderror
                                                <button type="submit" class="text-white bg-gradient-to-r mt-2 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="confirm('Apakah anda yakin untuk mengumpulkan tes ? (setelah submit tidak dapat mengedit kembali)')">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>




                                    </div>

                                </div>
                                @else
                                <h1 class="text-lg sm:mt-24 text-center font-semibold">Anda sudah mengumpulkan tes intern</h1>
                                <p class="text-center font-semibold">Pantau terus progressmu ya</p>
                                @endif


                            @endif


                        @elseif($applicant->status == 'Interview')

                            @if ($applicant->interview == null)

                            <h1 class="text-lg text-center sm:mt-24 font-semibold mb-4">Anda sedang memasuki proses interview</h1>
                            <p class="text-center font-semibold">Belum ada jadwal interview</p>

                            @else
                            <h1 class="text-lg text-center font-semibold mb-4">Anda sedang memasuki proses interview</h1>

                            <div class="mb-4">
                                <label for="" class="font-bold block">Undangan Interview</label>
                                <p>
                                    @php
                                    $description = $applicant->interview->description;
                                    $description = str_replace('<ul>', '<ul style="list-style-type: disc; padding-left: 1rem">', $description);
                                        $description = str_replace('<ol>', '<ol style="list-style-type: decimal; padding-left: 1rem">', $description);
                                            @endphp
                                            {!! $description !!}
                                        </p>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="font-bold block">Jadwal</label>
                                        <p>{{$date = Carbon\Carbon::create($applicant->interview->interview_date, 'Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM YYYY')}} ({{Carbon\Carbon::create($applicant->interview->interview_start, 'Asia/Jakarta')->locale('id')->isoFormat('H.mm') . ' - ' . Carbon\Carbon::create($applicant->interview->interview_end, 'Asia/Jakarta')->locale('id')->isoFormat('H.mm') . ' WIB'}})</p>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="font-bold block">Link</label>
                                        <p>
                                            <a class="text-blue-600" href="//{{$applicant->interview->link}}">{{$applicant->interview->link}}</a>

                                        </p>
                                    </div>

                                        @if ($applicant->interview->confirmation == null)

                                        <div class="mb-4">

                                            <label for="confirmation" class="block font-bold">Konfirmasi Kehadiran</label>
                                            <form action="{{route('user.applicant.confirmation', ['program' => $program, 'applicant' => $applicant])}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select id="confirmation" name="confirmation" class="bg-gray-50 w-full sm:w-1/3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mt-2 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="" selected>Pilih</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                                </select>
                                                <button type="submit" class="text-white bg-gradient-to-r mt-2 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="confirm('Apakah anda yakin untuk konfirmasi ini ? (setelah submit tidak dapat mengedit kembali)')">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                        @else
                                        <p class="text-center font-semibold">Anda sudah konfirmasi interview</p>
                                        @endif

                            @endif

                        @elseif($applicant->status == 'Lolos')

                        @if ($program->information == null)

                            <h1 class="text-lg text-center sm:mt-24 font-semibold mb-4">Selamat Anda dinyatakan lolos seleksi program <b>{{$program->title}}</b></h1>
                            <p class="text-center font-semibold">Silahkan pantau terus info selanjutnya dari mitra</p>
                            @else
                            <h1 class="text-lg text-center font-semibold mb-4">Selamat Anda dinyatakan lolos seleksi program <b>{{$program->title}}</b></h1>
                            <label for="" class="font-bold block">Informasi peserta lolos</label>
                                <p>
                                    @php
                                    $description = $program->information->information;
                                    $description = str_replace('<ul>', '<ul style="list-style-type: disc; padding-left: 1rem">', $description);
                                        $description = str_replace('<ol>', '<ol style="list-style-type: decimal; padding-left: 1rem">', $description);
                                            @endphp
                                            {!! $description !!}
                                        </p>
                                    </div>

                            @endif

                        @else

                        <h1 class="text-lg text-center sm:mt-24 font-semibold mb-4">Mohon maaf Anda belum lolos seleksi program <b>{{$program->title}}</b></h1>
                        <p class="text-center font-semibold">Tetap semangat dan jangan menyerah ya :)</p>

                        @endif


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
