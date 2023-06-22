<div class="flex flex-wrap -mb-px text-md font-medium text-left border-b px-5 ">
    <div class="mr-4">
        <a href="{{route('mitra.program.show', $program->slug)}}" class=" inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" style="{{isActiveRouteProgram('deskripsi')}}">Deskripsi</a>
    </div>
    <div class="mr-4">
        <a href="{{route('mitra.program.applicant', $program->slug)}}" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" style="{{isActiveRouteProgram('pendaftar')}}">Pendaftar</a>
    </div>
    <div class="mr-4">
        <a href="{{route('mitra.program.applicant.selection', $program->slug)}}" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" style="{{isActiveRouteProgram('seleksi')}}">Terseleksi</a>
    </div>
    <div class="mr-4">
        <a href="{{route('mitra.program.applicant.interview', $program->slug)}}" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" style="{{isActiveRouteProgram('interview')}}">Interview</a>
    </div>
    <div class="mr-4">
        <a href="{{route('mitra.program.applicant.pass', $program->slug)}}" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" style="{{isActiveRouteProgram('lolos')}}">Lolos</a>
    </div>
</div>
