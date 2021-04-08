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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                    @isset($what)
                        <form action="{{route('schedule.edit',['id' => $what->id])}}" method="post" id="form_odmen">
                            @csrf
                            <div class="form_item"><p style="margin: 12px; margin-left: 40px;">Edit Schedule</p>
                                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" style="float: right; margin-right: 50px; margin-top: -30px;" >
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input name="_method" type="hidden" value="PUT">
                            <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('day') border-red-500 @enderror" name="day" placeholder="Day" value="{{$what->day}}"> <br><br>
                            <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('time') border-red-500 @enderror" name="time" placeholder="Time" value="{{$what->time}}"> <br><br>
                            <input type="number" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('subject_id') border-red-500 @enderror" name="subject_id" placeholder="Subject id" value="{{$what->subject_id}}"> <br><br>
                            <input type="number" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('group_id') border-red-500 @enderror" name="group_id" placeholder="Group id" value="{{$what->group_id}}"> <br><br>
                            <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('classroom') border-red-500 @enderror" name="classroom" placeholder="Classroom №" value="{{$what->classroom}}"> <br><br>
                            <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Update</button>
                        </form>
                    @else
                        <form action="{{route('schedule.add')}}" method="post" id="form_odmen">
                            @csrf
                            <div class="form_item"><p style="margin: 12px; margin-left: 40px;">Add Schedule</p>
                            </div>
                            <select name="day" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('day') border-red-500 @enderror">
                                <option value="1">Понеділок</option>
                                <option value="2">Вівторок</option>
                                <option value="3">Середа</option>
                                <option value="4">Четвер</option>
                                <option value="5">П'ятниця</option>
                            </select><br><br>
                            <select name="time" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('time') border-red-500 @enderror">
                                    <option value="1">8:00-9:20 - 1</option>
                                    <option value="2">9:30-10:50 - 2</option>
                                    <option value="3">11:00-12:20 - 3</option>
                                    <option value="4">12:30-13:50 - 4</option>
                                    <option value="5">14:00-15:20 - 5</option>
                                    <option value="6">15:30-16:50 - 6</option>
                                    <option value="7">17:00-18:20 - 7</option>
                                    <option value="8">18:30-19:50 - 8</option>
                            </select><br><br>
                            <input type="hidden" value="{{request()->id}}" name="id">
                            <select name="subject_id" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('subject_id') border-red-500 @enderror">
                                <option selected value="">Select the subject</option>
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name_sub}}</option>
                                @endforeach
                            </select><br><br>
                            <select name="group_id" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('group_id') border-red-500 @enderror">
                                <option selected value="{{$user->id}}">{{$user->name}}</option>
                            </select><br><br>
                            <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('classroom') border-red-500 @enderror" name="classroom" placeholder="Classroom №"><br><br>
                            <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Submit</button>
                        </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
