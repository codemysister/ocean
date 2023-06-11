<div class="flex flex-wrap -mb-px text-md font-medium text-left border-b px-5 ">
    <div class="mr-4">
        <a href="{{route('mitra.program.show', $program->slug)}}" class="inline-block p-4 {{isActiveRouteProgram('description')}} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Deskripsi</a>
    </div>
    <div class="mr-4">
        <a href="{{route('mitra.program.applicant', $program->slug)}}" class="inline-block p-4 {{isActiveRouteProgram('applicant')}} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Pendaftar</a>
    </div>
    <div class="mr-4">
        <a href="" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Terseleksi</a>
    </div>
    <div class="mr-4">
        <a href="" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Lolos</a>
    </div>
</div>
