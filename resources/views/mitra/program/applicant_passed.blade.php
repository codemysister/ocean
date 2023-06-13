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


                    @if ($program->information == null)
                    <button data-modal-target="modal-lolos" data-modal-toggle="modal-lolos" class="text-white w-full sm:w-1/4 mx-auto bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 my-5 py-2.5 text-center mr-2 mb-4">Tambah informasi kelulusan</button>
                    @endif

                    @if ($program->information == null)

                    <div class="mb-6 mx-auto">
                        {{-- <h1 class="text-lg font-semibold">Anda sedang memasuki proses screening CV</h1> --}}
                        <p class="text-center font-semibold">Belum ada informasi kelulusan</p>
                    </div>
                    @else
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto my-5 ">


                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Informasi
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th class="px-6 py-4 w-[50%] max-w-[50%] font-medium  whitespace-nowrap ">
                                        @php
                                        $description = $program->information->information;
                                        $description = str_replace('<a>', '<a style="color: blue;">', $description);
                                            $description = str_replace('<ul>', '<ul style="list-style-type: disc; padding-left: 1rem">', $description);
                                                $description = str_replace('<ol>', '<ol style="list-style-type: decimal; padding-left: 1rem">', $description);

                                                    @endphp
                                                    {!! $description !!}
                                                </th>

                                                <td class="px-6 py-4 space-x-3">
                                                    <div class="flex items-center ">
                                                        <button type="button" data-modal-target="modal-edit-tugas" data-modal-toggle="modal-edit-tugas" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                            Edit
                                                        </button>

                                                        @if ($program->information != null)

                                                        {{-- Modal Edit Submission --}}
                                                        <div id="modal-edit-tugas" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative w-full max-w-2xl max-h-full">
                                                                <!-- Modal content -->
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <!-- Modal header -->
                                                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                            Edit tes
                                                                        </h3>
                                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-edit-tugas">
                                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <div class="p-6 space-y-6">

                                                                        <form action="{{route('mitra.program.applicant.update.information', ['program' => $program->slug, 'information' => $program->information ])}}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <div class="flex flex-col mb-2">
                                                                                <span class="text-sm font-medium text-slate-700 mb-2">Informasi</span>

                                                                                <div class="w-full">
                                                                                    <input id="x" type="hidden" name="information" value="{{$program->information->information}}">
                                                                                    <trix-editor id="trix" type="text" name="information" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="information" aria-label="information" aria-describedby="information-addon" input="x" /></trix-editor>
                                                                                    @error('information')
                                                                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <!-- Modal footer -->
                                                                        <div class="flex justify-center items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                                                            <button data-modal-hide="modal-edit-tugas" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endif

                                                    </div>
                                                </td>
                                            </tr>





                                        </tbody>
                                    </table>

                                </div>

                                @endif


                                {{-- Modal Daftar --}}
                                <div id="modal-lolos" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Tambah informasi kelulusan
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-lolos">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <div class="flex text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 my-4" role="alert">
                                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Info</span>
                                                    <div>
                                                        Tambah informasi lebih lanjut ke peserta lolos seleksi
                                                    </div>
                                                </div>

                                                <form action="{{route('mitra.program.applicant.submit.information', $program->slug)}}" method="POST">
                                                    @csrf

                                                    <div class="flex flex-col mb-2">
                                                        <span class="text-sm font-medium text-slate-700 mb-2">Informasi</span>
                                                        <div class="w-full">
                                                            <input id="x" type="hidden" name="information">
                                                            <trix-editor id="trix" type="text" name="information" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="information" aria-label="information" aria-describedby="information-addon" value="{{old('information')}}" input="x" /></trix-editor>
                                                            @error('information')
                                                            <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex justify-center items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                                    <button data-modal-hide="modal-lolos" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                                <div class="flex text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 my-4" role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        Lolos ( daftar peserta lolos )
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
                                                    Action
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
                                                <td class="px-6 py-4 space-x-3">
                                                    <button type="button" data-modal-target="modal-detail-{{$applicant->uuid}}" data-modal-toggle="modal-detail-{{$applicant->uuid}}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                        Detail
                                                    </button>


                                                    {{-- Modal Edit Submission --}}
                                                    <div id="modal-detail-{{$applicant->uuid}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative w-full max-w-2xl max-h-full">
                                                            <!-- Modal content -->
                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <!-- Modal header -->
                                                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                        Detail peserta lolos
                                                                    </h3>
                                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-edit-tugas">
                                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="p-6 space-y-6">

                                                                    <div class="mx-auto">
                                                                        <div class="mb-3">
                                                                            <img class="rounded-full w-28 h-28 mx-auto" src="{{asset('storage/'.$applicant->userProfile->profile_image)}}" alt="image description">
                                                                        </div>


                                                                        <div class="flex flex-col mb-3">
                                                                            <span class="text-sm font-medium text-slate-700 mb-2">Nama</span>
                                                                            <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{$applicant->userProfile->user->name}}"  disabled />
                                                                        </div>

                                                                        <div class="flex flex-col mb-3">
                                                                            <span class="text-sm font-medium text-slate-700 mb-2">Email</span>
                                                                            <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{$applicant->userProfile->user->email}}"  disabled />
                                                                        </div>

                                                                        <div class="flex flex-col mb-3">
                                                                            <span class="text-sm font-medium text-slate-700 mb-2">Nomor telepon</span>
                                                                            <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="+62{{$applicant->userProfile->phone}}"  disabled />
                                                                        </div>

                                                                        <div class="flex flex-col mb-3">
                                                                            <span class="text-sm font-medium text-slate-700 mb-2">Alamat</span>
                                                                            <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{$applicant->userProfile->address}}"  disabled />
                                                                        </div>

                                                                        <div class="flex flex-col mb-3">
                                                                            <span class="text-sm font-medium text-slate-700 mb-2">CV</span>
                                                                            <a href="{{asset('/storage/'.$applicant->cv)}}" class="py-1 px-2 text-white w-full sm:w-1/4 whitespace-nowrap bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 rounded-lg"><i class="far fa-file-pdf pr-2"></i>Cv.pdf</a>
                                                                        </div>

                                                                    </div>


                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="flex justify-center items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">

                                                                    <button data-modal-hide="modal-detail-{{$applicant->uuid}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>

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



                @endsection


                <script>
                    function setInputId(id)
                    {
                        const inputId = document.querySelector('input[name=applicant_id]');
                        inputId.value = id;
                    }
                </script>
