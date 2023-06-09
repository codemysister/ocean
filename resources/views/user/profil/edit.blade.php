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
                    <form role="form text-left" action="{{route('user.profile.update', $profile->uuid)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="flex gap-4 mb-2">
                            <div class="flex flex-col w-full">
                                <span class="text-sm font-medium text-slate-700 mb-2">Foto profil</span>
                                <input type="file" name="profile_image" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="profile_image..." aria-label="profile_image" aria-describedby="profile_image-addon" value="{{old('profile_image')}}" required />
                                @error('profile_image')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="flex gap-4 mb-3">
                            <div class="flex flex-col w-1/2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Jenis kelamin</span>
                                <select name="gender" id="gender" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                    <option value="">Pilih jenis kelamin</option>

                                    <option value="Pria" @selected($profile->gender == "Pria")>Pria</option>
                                    <option value="Wanita" @selected($profile->gender == "Wanita")>Wanita</option>

                                </select>
                                @error('gender')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-1/2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Nomor telepon</span>
                                <input type="number" name="phone" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Nomor..." aria-label="phone" aria-describedby="phone-addon" value="{{$profile->phone}}" required/>
                                @error('phone')
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
                            <div class="flex flex-col w-1/2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Status</span>
                                <select name="status" id="status" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                    <option value="">Pilih status saat ini</option>
                                    <option value="Pelajar">Pelajar/Mahasiswa/SMK</option>
                                    <option value="Fresh Graduate">Fresh graduate</option>
                                    <option value="Pekerja">Pekerja</option>
                                </select>
                                @error('status')
                                <p class="font-semibold text-xs text-red-700">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-1/2">
                                <span class="text-sm font-medium text-slate-700 mb-2">Social media</span>
                                <input type="text" name="social_media" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Link social media (facebook/instagram/linkedin)..." aria-label="social_media" aria-describedby="social_media-addon" value="{{$profile->social_media}}" required/>
                                @error('social_media')
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
