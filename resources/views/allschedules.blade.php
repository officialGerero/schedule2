<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                {{ __('List of all users') }}
            </x-nav-link>
            <x-nav-link href="{{ route('subjects') }}" :active="request()->routeIs('subjects')">
                {{ __('List of all subjects') }}
            </x-nav-link>
            <x-nav-link href="{{ route('schedules.all') }}" :active="request()->routeIs('schedules.all')">
                {{ __('List of all schedules') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-max-content ml-6/12 lg:pr-8 lg:pl-10 pb-2">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg py-2">
                <form action="{{route('schedules.search')}}" method="get">
                    <div class="float-left">
                        <input type="radio" name="field" value="1" class="ml-1" id="radio1" checked>
                        <label for="radio1">Номер групи</label> <br>
                        <input type="radio" name="field" value="2" class="ml-1" id="radio2">
                        <label for="radio2">Номер предмету</label>
                    </div>
                    <div class="float-right mt-1">
                        <input name="search" type="text" class="pr-6 pl-2 py-2 ml-3 border focus:ring-gray-500 focus:border-gray-900 sm:text-sm border-gray-300 rounded-md focus:outline-none">
                        <button type="submit" class="bg-green-400 justify-center items-center text-white px-4 py-2 mr-1 rounded-md focus:outline-none">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-5xl mx-auto lg:px-8">
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
                            <th class="px-4 py-3">№</th>
                            <th class="px-4 py-3">День</th>
                            <th class="px-4 py-3">Час</th>
                            <th class="px-4 py-3">№ предмету</th>
                            <th class="px-4 py-3">№ групи</th>
                            <th class="px-4 py-3">№ ауд.</th>
                            <th class="px-4 py-3 border-l-2">Дії</th>
                        </tr>
                        @isset($items)
                            @foreach($items as $item)
                                <tr class="bg-cool-gray-100 border-b border-gray-200">
                                    <td class="px-4 py-3">{{$item["id"]}}</td>
                                    <td class="px-4 py-3">{{__('day.'.$item["day"])}}</td>
                                    <td class="px-4 py-3">{{__('time.'.$item["time"])}}</td>
                                    <td class="px-4 py-3">{{$item["subject_id"]}}</td>
                                    <td class="px-4 py-3">{{$item["group_id"]}}</td>
                                    <td class="px-4 py-3">{{$item["classroom"]}}</td>
                                    <td class="px-4 py-3 border-l-2"><a class="text-blue-700 hover:text-blue-500" href="{{route('schedule.prepare', ['id'=>$item["id"]])}}">Змінити</a> | <a class="text-blue-700 hover:text-blue-500" href="{{route('schedule.deleteAtAll', ['id'=>$item["id"]])}}">Видалити</a></td>
                                </tr>
                            @endforeach
                        @endisset
                    </table>
                    <br>
                    @isset($items)
                        {{$items->links()}}
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
