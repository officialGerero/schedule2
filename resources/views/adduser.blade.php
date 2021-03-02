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
                        <form action="{{route('user.edit',['id' => $what->id])}}" method="post" id="form_odmen">
                            @csrf
                            <div class="form_item"><p style="margin: 12px; margin-left: 40px;">Edit User</p>
                                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" style="float: right; margin-right: 50px; margin-top: -30px;" >
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                                <input name="_method" type="hidden" value="PUT">
                                <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('name') border-red-500 @enderror" name="name" placeholder="Name" value="{{$what->name}}"> <br><br>
                                <input type="email" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('email') border-red-500 @enderror" name="email" placeholder="Email" value="{{$what->email}}"> <br><br>
                                <input type="password" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('password') border-red-500 @enderror" name="password" placeholder="Password" value=""> <br><br>
                                <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Update</button>
                        </form>
                    @else
                        <form  action="{{route('user.add')}}" method="post" id="form_odmen">
                            @csrf
                            <div class="form_item"><p style="margin: 12px; margin-left: 40px;">Add User</p>
                                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" style="float: right; margin-right: 50px; margin-top: -30px;" >
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                                <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('name') border-red-500 @enderror" name="name" placeholder="Name"> <br><br>
                                <input type="email" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('email') border-red-500 @enderror" name="email" placeholder="Email"> <br><br>
                                <input type="password" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none @error('password') border-red-500 @enderror" name="password" placeholder="Password"> <br><br>
                                <input type="hidden" name="admin" value="0" >
                                <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Submit</button>
                        </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</x-app-layout>
