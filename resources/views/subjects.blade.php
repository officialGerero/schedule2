<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                {{ __('List of all users') }}
            </x-nav-link>
            <x-nav-link href="{{ route('subjects') }}" :active="request()->routeIs('subjects')">
                {{ __('List of all subjects') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-max-content bg-white overflow-hidden shadow-md sm:rounded-lg mb-1">
                <a href="{{route('admin')}}" class="bg-green-400 flex justify-center items-center w-full text-white px-4 py-1 rounded-md focus:outline-none">Add</a>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="border border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                            {{session('success')}}
                        </div><br>
                    @endif
                    @if ($errors->any())
                        <div role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Error
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><br>
                    @endif
                    <table class="rounded-t-lg w-full mx-auto bg-gray-200">
                        <tr class="text-left rounded-t-lg border-b-2 border-gray-300">
                            <th class="px-4 py-3">Id</th>
                            <th class="px-4 py-3">Назва</th>
                            <th class="px-4 py-3">Викладач</th>
                            <th class="px-4 py-3">Група</th>
                            <th class="px-4 py-3">Семестр</th>
                            <th class="px-4 py-3 border-l-2">Дії</th>
                        </tr>
                        @foreach($items as $item)
                            <tr class="bg-cool-gray-100 border-b border-gray-200">
                                <td class="px-4 py-3">{{$item["id"]}}</td>
                                <td class="px-4 py-3">{{$item["name_sub"]}}</td>
                                <td class="px-4 py-3">{{$item["name_teacher"]}}</td>
                                <td class="px-4 py-3">{{$item["groupID"]}}</td>
                                <td class="px-4 py-3">{{$item["semester"]}}</td>
                                <td class="px-4 py-3 border-l-2"><a class="text-blue-700 hover:text-blue-500" href="{{route('edit.prepare', ['id'=>$item["id"]])}}">Змінити</a> | <a class="text-blue-700 hover:text-blue-500" href="{{route('edit.delete', ['id'=>$item["id"]])}}">Видалити</a></td>
                            </tr>
                        @endforeach
                    </table>
                        <br>
                        {{$items->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
