@extends('layout.main')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

        <div class="flex-none mx-auto w-1/2 max-w-lg px-3 mt-6">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border py-4">
                <div class="flex justify-between align-middle">
                    <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
                        <h6 class="mb-4">Edit Kategori</h6>
                    </div>
                </div>

                <div>
                    <form role="form text-left" action="{{route('admin.category.update', $category)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="gap-4 px-4 mb-3">
                            <label class="text-sm font-medium text-slate-700 mb-2">Nama Kategori</label>
                            <input type="text" name="category_name" value="{{$category->category_name}}" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="kategori..." aria-label="category" aria-describedby="category-addon" value="{{old('category_name')}}" />

                            @error('category_name')
                            <div class="font-semibold text-xs p-2 text-red-700">
                                {{ $message }}
                            </div>
                            @enderror
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
