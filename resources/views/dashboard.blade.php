<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! <br>
                    <div class="container border rounded tab-component bg-white w-full h-auto">
                        <ul class="overflow-auto flex border-b tab-buttons sm:overflow-hidden">
                            @foreach($days as $day)
                                <li class="mr-0">
                                    <button data-tab-index="{{$loop->index}}" class="tab-item border-r bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold">{{__('day.'.($loop->index+1))}}</button>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="flex tab-contents">
                            @foreach($days as $day)
                            <li class="hidden w-full" data-tab-content-index="{{$loop->index}}">
                                <table class="rounded-t-lg w-full mx-auto bg-gray-200 text-gray-800">
                                    <tr class="text-left border-b-2 border-gray-300">
                                        <th class="px-4 py-3">Час</th>
                                        <th class="px-4 py-3">Предмет</th>
                                        <th class="px-4 py-3">Викладач</th>
                                        <th class="px-4 py-3">Аудиторія</th>
                                    </tr>
                                        @foreach($day as $subj)

                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <td class="px-4 py-3">{{__('time.'.$subj["time"])}}</td>
                                            <td class="px-4 py-3">{{$subj['get_subject']["name_sub"]}}</td>
                                            <td class="px-4 py-3">{{$subj['get_subject']["name_teacher"]}}</td>
                                            <td class="px-4 py-3">{{$subj["classroom"]}}</td>
                                        </tr>
                                        @endforeach
                                </table>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        const activeTabClasses = [
            'border-l','border-t','border-r','rounded-t','text-blue-700','font-semibold', 'active'
        ];
        const inactiveTabClasses = [
            'text-blue-500','hover:text-blue-800','font-semibold','border-r'
        ];

        function toggleTabs(activeIndex) {
            $('.tab-buttons > li > button').each(function (k,v) {
                let current = $(v);
                if (current.hasClass('active')) {
                    current.removeClass(activeTabClasses);
                    current.addClass(inactiveTabClasses);
                    current.parent().removeClass('-mb-px');
                } else {
                    current.parent().addClass('-mb-px');
                }
            });
            $('.tab-buttons > li > button[data-tab-index=' + activeIndex + ']').each(function (k,v) {
                $(v).removeClass(inactiveTabClasses);
                $(v).addClass(activeTabClasses);
            });
        }

        $('.tab-item').on('click', function (e) {
            let sender = e.currentTarget;
            if (sender && !sender.classList.contains('disabled')) {
                let index = sender.attributes['data-tab-index'].value;
                if (index !== undefined) {
                    toggleTabs(index);
                    $('.tab-contents > li').each(function (k,v) {
                        let currIndex = v.attributes['data-tab-content-index'].value;
                        if (currIndex === index) {
                            $(v).removeClass('hidden');
                        } else {
                            $(v).addClass('hidden');
                        }
                    });
                }
                return false;
            }
        });
    </script>
</x-app-layout>
