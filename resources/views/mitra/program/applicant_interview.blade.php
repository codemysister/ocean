@extends('layout.main')
@section('content')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-full max-w-full px-3 mt-6">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class=" rounded-t-2xl bg-black px-5 py-10">

                    <div class="flex justify-between">

                        @include('mitra.program.partial.header_program')


                        <div class="flex flex-col">
                            <a href="{{route('mitra.program.edit', $program->slug)}}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</a>
                            <a href="{{route('mitra.program.destroy', $program->slug)}}" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" data-confirm-delete="true">Hapus</a>
                        </div>
                    </div>


                </div>



                @include('mitra.program.partial.navbar_program')



                <div class="w-11/12 mx-auto">

                    <div class="flex text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 my-4" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div>
                            Seleksi ( proses interview intern )
                        </div>
                    </div>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto my-5">


                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jadwal Interview
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Konfirmasi Kehadiran
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Proses ke lolos
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($applicants as $applicant)

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$loop->iteration}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$applicant->userProfile->user->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">


                                        @if ($applicant->interview == null)

                                        <p class="font-semibold">Jadwal belum diset</p>

                                        @else


                                        <p>
                                            {{$date = Carbon\Carbon::create($applicant->interview->interview_date, 'Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM YYYY')}}
                                        </p>
                                        <p>
                                            ({{Carbon\Carbon::create($applicant->interview->interview_start, 'Asia/Jakarta')->locale('id')->isoFormat('H.mm') . ' - ' . Carbon\Carbon::create($applicant->interview->interview_end, 'Asia/Jakarta')->locale('id')->isoFormat('H.mm') . ' WIB'}})
                                        </p>

                                        {{-- <a href="{{asset($applicant->submission->submission)}}" class="py-1 px-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 rounded-lg"><i class="far fa-file-pdf pr-2"></i>tugas</a> --}}

                                        @endif


                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($applicant->interview == null)

                                        <p class="font-semibold">Jadwal belum diset</p>

                                        @else
                                            @if ($applicant->interview->confirmation == "Hadir")
                                            <p class="font-semibold">Hadir</p>
                                            @elseif($applicant->interview->confirmation == "Tidak Hadir")
                                            <p class="font-semibold">Tidak hadir</p>
                                            @else
                                            <p class="font-semibold">Belum konfirmasi</p>
                                            @endif
                                        @endif
                                    </td>

                                    <td class="whitespace-nowrap">
                                        <button data-modal-target="modal-interview" data-modal-toggle="modal-interview" class="text-white w-full  mx-auto {{$applicant->interview != null ? 'bg-gray-500' : 'bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800'}}  font-medium rounded-lg text-sm px-5 my-5 py-2.5 text-center mr-2 mb-4" onclick="setInputId({{$applicant->id}})" {{$applicant->interview != null ? "disabled" : ''}}>{{$applicant->interview != null ? 'Jadwal Terkirim' : 'Set jadwal'}}</button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <form class="inline-flex" action="{{route('mitra.program.applicant.reject', ['program' => $program->slug, 'applicant' => $applicant->uuid])}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-white cursor-pointer bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-full text-sm p-1 text-center inline-flex items-center mr-2 " onclick="return confirm('Apakah Anda yakin menolak peserta ini?')">
                                                <svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </form>

                                        <form class="inline-flex" action="{{route('mitra.program.applicant.pass_applicant', ['program' => $program->slug, 'applicant' => $applicant->uuid])}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-white cursor-pointer bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-sm p-1 text-center inline-flex items-center mr-2" onclick="return confirm('Apakah Anda yakin meloloskan peserta ini?')">
                                                <svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>

                {{ $applicants->links() }}


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


        {{-- Modal Daftar --}}
        <div id="modal-interview" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah tes
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-interview">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">

                        <form action="{{route('mitra.program.applicant.invite', $program->slug)}}" method="POST">
                            @csrf

                            <input type="hidden" name="applicant_id">

                            <div class="flex flex-col mb-2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Deskripsi</span>
                                <div class="w-full">
                                    <input id="x" type="hidden" name="description">
                                    <trix-editor id="trix" type="text" name="description" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="description" aria-label="description" aria-describedby="description-addon" value="{{old('description')}}" input="x" /></trix-editor>
                                    @error('description')
                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex gap-4 mb-2">
                                <div class="flex flex-col w-full">
                                    <span class="text-sm font-medium text-slate-700 mb-2">Tanggal Interview</span>
                                    <input type="date" name="interview_date" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="tanggal berakhir..." aria-label="interview_date" aria-describedby="interview_date-addon" value="{{old('interview_date')}}" />
                                    @error('interview_date')
                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex gap-4 mb-2">

                                <div class="flex flex-col w-1/2">
                                    <span class="text-sm font-medium text-slate-700 mb-2">Mulai</span>
                                    <input type="time" name="interview_start" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="tanggal mulai..." aria-label="interview_start" aria-describedby="interview_start-addon" value="{{old('interview_start')}}" />
                                    @error('interview_start')
                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="flex flex-col w-1/2">
                                    <span class="text-sm font-medium text-slate-700 mb-2">Berakhir</span>
                                    <input type="time" name="interview_end" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="tanggal berakhir..." aria-label="interview_end" aria-describedby="interview_end-addon" value="{{old('interview_end')}}" />
                                    @error('interview_end')
                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="flex gap-4 mb-2">
                            <div class="flex flex-col w-full">
                                <span class="text-sm font-medium text-slate-700 mb-2">Link meeting</span>
                                <input type="text" name="link" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="judul..." aria-label="link" aria-describedby="link-addon" value="{{old('link')}}" />
                                @error('link')
                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-center items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            <button data-modal-hide="modal-interview" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        @endsection


        <script>
            function setInputId(id)
            {
                const inputId = document.querySelector('input[name=applicant_id]');
                inputId.value = id;
            }
        </script>
