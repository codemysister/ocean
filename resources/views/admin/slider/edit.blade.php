@extends('layout.main')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none mx-auto w-full sm:w-1/2 max-w-xl px-3 mt-6">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border py-4">
                <div class="flex justify-between align-middle">
                    <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
                        <h6 class="mb-4">Edit Slider</h6>
                    </div>
                </div>

                <div class="p-4">
                    <form action="{{route('admin.slider.update', $slider)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mx-auto">

                            <div class="flex mb-3">
                                <div class="flex flex-col w-full">
                                    <span class="text-sm font-medium text-slate-700 mb-2">Gambar Slider</span>
                                    <input type="file" name="img" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="img..." aria-label="img" aria-describedby="img-addon" value="{{old('img')}}" />
                                    @error('img')
                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col mb-3">
                                <span class="text-sm font-medium text-slate-700 mb-2">Caption</span>
                                <input type="text" name="caption" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{$slider->caption}}" />
                                @error('caption')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex mb-3">
                                <div class="flex flex-col w-full">
                                    <span class="text-sm font-medium text-slate-700 mb-2">Status</span>
                                    <select name="status" id="status" class="text-sm w-full focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                        <option value="">Pilih status</option>
                                        <option value="1" @selected($slider->status == 1)>Aktif</option>
                                        <option value="0" @selected($slider->status == 0)>Nonaktif</option>
                                    </select>
                                    @error('status')
                                    <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-center mt-2">
                                <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
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
