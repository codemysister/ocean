@extends('layout.main')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
          <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">

            <h6 class="p-6 text-center font-semibold text-lg">Tabel Kategori Program</h6>
            <div class="p-6 pb-0 mb-4 flex justify-between bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <a href="{{route('admin.category.create')}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">Buat Kategori</a>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
              <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                  <thead class="align-bottom">
                    <tr>
                      <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                      <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Kategori</th>
                      <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)

                    <tr>

                      <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <span class="font-semibold leading-tight text-md text-slate-400">{{$loop->iteration}}</span>
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <span class="font-semibold leading-tight text-md text-slate-400">{{$category->category_name}}</span>
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <a href="{{route('admin.category.edit', $category->id)}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-blue-700 border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25  text-white hover:opacity-75">Edit</a>
                        <form action="{{route('admin.category.destroy', $category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-red-700 border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-white hover:opacity-75">Hapus</button>
                        </form>

                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
