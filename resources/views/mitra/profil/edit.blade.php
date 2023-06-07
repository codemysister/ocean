@extends('layout.main')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-full max-w-full px-3 mt-6">
            <div class="relative p-4 flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border py-4">
                <div class="flex  justify-between align-middle">
                    <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
                        <h6 class="mb-4">Lengkapi Profile</h6>
                    </div>
                </div>

                <div>
                    <form role="form text-left" action="{{route('mitra.profile.update', $profile->uuid)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="flex gap-4 mb-2">
                            <div class="flex flex-col w-full">
                                <span class="text-sm font-medium text-slate-700 mb-2">Logo perusahaan</span>
                                <input type="file" name="logo" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="logo..." aria-label="logo" aria-describedby="logo-addon" value="{{old('logo')}}" required />
                                @error('logo')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col mb-2">
                            <span class="text-sm font-medium text-slate-700 mb-2">Deskripsi</span>
                            <div class="w-full">
                                <input id="x" type="hidden" name="description" value="{{$profile->description}}">
                                <trix-editor id="trix" type="text" name="description" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="description" aria-label="description" aria-describedby="description-addon" input="x" /></trix-editor>
                                @error('description')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex gap-4 mb-3">
                            <div class="flex flex-col w-full">
                                <span class="text-sm font-medium text-slate-700 mb-2">Alamat</span>
                                <input type="text" name="address" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Alamat..." aria-label="address" aria-describedby="address-addon" value="{{$profile->address}}" required/>
                                @error('address')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="flex gap-4 mb-3">
                            <div class="flex flex-col w-full">
                                <span class="text-sm font-medium text-slate-700 mb-2">Website</span>
                                <input type="text" name="website" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Website..." aria-label="website" aria-describedby="website-addon" value="{{$profile->website}}" required/>
                                @error('website')
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
