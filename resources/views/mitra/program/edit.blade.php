@extends('layout.main')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-full max-w-full px-3 mt-6">
            <div class="relative p-4 flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border py-4">
                <div class="flex  justify-between align-middle">
                    <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
                        <h6 class="mb-4">Edit Program</h6>
                    </div>
                </div>

                <div>
                    <form role="form text-left" action="{{route('mitra.program.update', $program->slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="flex gap-4 mb-3">
                            <div class="flex flex-col w-1/2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Judul</span>
                                <input type="text" name="title" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{$program->title}}" placeholder="judul..." aria-label="Title" aria-describedby="title-addon" />
                                @error('title')
                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-1/2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Kategori</span>
                                <select name="category_id" id="category_id" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                    <option value="">Pilih kategori</option>
                                    @foreach ($categories as $category => $id)
                                    <option value="{{$id}}" @selected($program->category_id == $id)>{{$category}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="flex gap-4 mb-3">

                            <div class="flex flex-col w-1/2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Tipe Magang</span>
                                <select name="intern_type" id="intern_type" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                    <option value="">Pilih tipe magang</option>
                                    <option value="Paid" @selected($program->intern_type == 'Paid')>Paid</option>
                                    <option value="Unpaid" @selected($program->intern_type == 'Unpaid')>Unpaid</option>
                                </select>
                                @error('intern_type')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-1/2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Skema Kegiatan</span>
                                <select name="work_mode" id="work_mode" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                    <option value="">Pilih skema kegiatan</option>
                                    <option value="Work From Office (WFO)" @selected($program->work_mode == 'Work From Office (WFO)')>Work From Office (WFO)</option>
                                    <option value="Work From Home (WFH)" @selected($program->work_mode == 'Work From Home (WFH)')>Work From Home (WFH)</option>
                                </select>
                                @error('work_mode')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                        </div>

                         <div class="flex gap-4 mb-2">
                            <div class="flex flex-col w-1/3">
                                <span class="text-sm font-medium text-slate-700 mb-2">Durasi (bulan)</span>
                                <input type="number" name="duration" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="durasi..." aria-label="duration" aria-describedby="duration-addon" value="{{$program->duration}}" />
                                @error('duration')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-1/3">
                                <span class="text-sm font-medium text-slate-700 mb-2">Mulai</span>
                                <input type="date" name="start" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="tanggal mulai..." aria-label="start" aria-describedby="start-addon" value="{{$program->start}}" />
                                @error('start')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-1/3">
                                <span class="text-sm font-medium text-slate-700 mb-2">Berakhir</span>
                                <input type="date" name="end" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="tanggal berakhir..." aria-label="end" aria-describedby="end-addon" value="{{$program->end}}" />
                                @error('end')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="flex flex-col mb-2">
                            <span class="text-sm font-medium text-slate-700 mb-2">Deskripsi</span>
                            <div class="w-full">
                                <input id="x" type="hidden" name="description" value="{{$program->description}}">
                                <trix-editor id="trix" type="text" name="description" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="description" aria-label="description" aria-describedby="description-addon" input="x" /></trix-editor>
                                @error('description')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>
                        </div>



                        <div class="flex gap-4 mb-2">
                            <div class="flex flex-col w-full">
                                <span class="text-sm font-medium text-slate-700 mb-2">Guidebook (optional)</span>
                                <input type="file" name="guidebook" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="guidebook..." aria-label="guidebook" aria-describedby="guidebook-addon" value="{{$program->guidebook}}" />
                                @error('guidebook')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script>


</script>
@endpush
