<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Danger
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
                    <form action="submitTeacher" method="post" id="form_odmen">
                        @csrf
                        <div class="form_item"><p style="margin: 12px; margin-left: 40px;">AddTeacher</p>
                            <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" style="float: right; margin-right: 50px; margin-top: -30px;" >
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="@if($errors->any()) block @else form_hidden @endif" >
                                 <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600 @error('name_sub') border-red-500 @enderror" name="name_sub" placeholder="Subjects name"> <br><br>
                                 <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600 @error('name_teacher') border-red-500 @enderror" name="name_teacher" placeholder="Teachers name"> <br><br>
                                 <input type="number" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600 @error('groupID') border-red-500 @enderror" name="groupID" placeholder="Group id"> <br><br>
                                 <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</x-app-layout>
