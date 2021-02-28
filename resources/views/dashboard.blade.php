<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! <br>
                    @foreach($schedule as $line)
                         {{-- @if(str_contains($line, 'Вівторок')) --}}
                        {{ $line }} <br>
                        {{-- @endif --}}
                    @endforeach
                    <div class="container border rounded pb-6 tab-component bg-white w-full">
                        <ul class="flex border-b tab-buttons">
                            <li class="mr-1">
                                <button data-tab-index="0" class="tab-item bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold">Понеділок</button>
                            </li>
                            <li class="mr-1">
                                <button data-tab-index="1" class="tab-item bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold">Вівторок</button>
                            </li>
                            <li class="mr-1">
                                <button data-tab-index="2" class="tab-item bg-white inline-block py-2 px-4 text-blue-500 font-semibold active">Середа</button>
                            </li>
                            <li class="mr-1">
                                <button data-tab-index="3" class="tab-item bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold">Четвер</button>
                            </li>
                            <li class="mr-1">
                                <button data-tab-index="4" class="tab-item bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold">П'ятниця</button>
                            </li>
                        </ul>
                        <ul class="flex tab-contents pb-6 pl-6 pr-6 py-6">
                            <li class="hidden" data-tab-content-index="0">
                                TEXT1
                            </li>
                            <li class="hidden" data-tab-content-index="1">
                                TEXT2
                            </li>
                            <li class="hidden" data-tab-content-index="2">
                                TEXT3
                            </li>
                            <li class="hidden" data-tab-content-index="3">
                                tab content 4
                            </li>
                            <li class="hidden" data-tab-content-index="4">
                                tab content 5
                            </li>
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
            'text-blue-500','hover:text-blue-800','font-semibold'
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
