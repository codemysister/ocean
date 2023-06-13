<div class="flex flex-wrap -mb-px text-md font-medium text-left border-b px-5 ">
    <div class="mr-4">
        <a href="{{route('user.applicant.show', $program->slug)}}" class="inline-block p-4 {{isActiveRouteProgram('deskripsi')}}  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Deskripsi</a>
    </div>
    <div class="mr-4">
        <a href="{{route('user.applicant.status', $program->slug)}}" class="inline-block p-4 {{isActiveRouteProgram('status')}} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Status Pendaftaran</a>
    </div>
</div>
