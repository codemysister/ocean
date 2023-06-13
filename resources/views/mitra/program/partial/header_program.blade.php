<div>
    <h6 class="mb-1 text-white font-bold text-xl w-full">{{$program->title}}</h6>
    <p class="mb-1">
        @if ($program->intern_type == 'Paid')
            <span class="bg-green-700 text-white text-center text-xs font-medium mr-2 px-2.5 py-0.5 p-1.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{$program->intern_type}}</span>
            @else
            <span class="bg-gray-700 text-white text-center text-xs font-medium mr-2 px-2.5 py-0.5 pt-1.5 rounded dark:bg-gray-700 dark:text-green-400 border border-white">{{$program->intern_type}}</span>
            @endif
    </p>
    <p class="text-xs text-white mb-1"><b>Skema : </b>{{$program->work_mode}}</p>
    <p class="text-xs text-white mb-1"><b>Durasi : </b>{{$program->duration}} bulan</p>
    <p class="text-xs text-white mb-1"><b>Periode : </b>{{Carbon\Carbon::parse($program->start)->locale('id')->isoFormat('D MMMM YYYY')}} - {{Carbon\Carbon::parse($program->end)->locale('id')->isoFormat('D MMMM YYYY')}}</p>
    <p class="text-xs text-white"><b>Domisili : </b>{{$program->mitra->address}}</p>
</div>
