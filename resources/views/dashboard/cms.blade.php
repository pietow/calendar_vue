<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CMS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-gray-600 text-lg">
                        Blog Content Manangment System
                    </h1>
                    <div class="py-5">
                        <table class="w-96">
                            <caption
                                class="bg-blue-250 text-sm text-left pl-2 py-2 uppercase tracking-wide rounded text-white"
                            >
                                Blog
                            </caption>

                            <tbody>
                                <tr class="border-b border-gray-200">
                                    <th
                                        class="pl-2 py-2 text-blue-250 text-left text-sm"
                                    >
                                        <a href="{{ route('posts.index') }}">Posts</a>
                                    </th>

                                    <td
                                        class="pl-2 text-blue-250 text-sm text-right"
                                    >
                                        <div class="flex">
                                            <img
                                                class="ml-auto pr-2"
                                                src="{{asset('storage/images/assets/add.svg')}}"
                                            />
                                            <a href="{{ route('posts.create') }}"
                                                >Add</a
                                            >
                                        </div>
                                    </td>

                                    <td
                                        class="pl-2 text-blue-250 text-sm text-right pr-3"
                                    >
                                        <div class="flex">
                                            <img
                                                class="ml-auto pr-2"
                                                src="{{asset('storage/images/assets/change.svg')}}"
                                            />
                                        <a
                                            href="{{ route('posts.index') }}"
                                            >Change</a
                                        >
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <th
                                        class="pl-2 py-2 text-blue-250 text-left text-sm"
                                    >
                                        <a href="{{ route('postItems.index') }}">Postelemente</a>
                                    </th>

                                    <td
                                        class="pl-2 text-blue-250 text-sm text-right"
                                    >
                                        {{-- <div class="flex"> --}}
                                        {{--     <img --}}
                                        {{--         class="ml-auto pr-2" --}}
                                        {{--         src="{{asset('storage/images/assets/add.svg')}}" --}}
                                        {{--     /> --}}
                                        {{--     <a href="/catalog/author/add/" --}}
                                        {{--         >Add</a --}}
                                        {{--     > --}}
                                        {{-- </div> --}}
                                    </td>

                                    <td
                                        class="pl-2 text-blue-250 text-sm text-right pr-3"
                                    >
                                        <div class="flex">
                                            <img
                                                class="ml-auto pr-2"
                                                src="{{asset('storage/images/assets/change.svg')}}"
                                            />
                                        <a
                                            href="{{ route('postItems.index') }}"
                                            >Change</a
                                        >
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        <table class="w-96">
                            <caption
                                class="bg-blue-250 text-sm text-left pl-2 py-2 uppercase tracking-wide rounded text-white"
                            >
                                Galerien
                            </caption>

                            <tbody>
                                <tr class="border-b border-gray-200">
                                    <th
                                        class="pl-2 py-2 text-blue-250 text-left text-sm"
                                    >
                                        
                                        <a href="{{ route('galleries.index') }}">Hauptgalerie</a>
                                    </th>

                                    <td
                                        class="pl-2 text-blue-250 text-sm text-right"
                                    >
                                        <div class="flex">
                                            <img
                                                class="ml-auto pr-2"
                                                src="{{asset('storage/images/assets/add.svg')}}"
                                            />
                                            <a href="{{ route('galleries.create') }}"
                                                >Add</a
                                            >
                                        </div>
                                    </td>

                                    <td
                                        class="pl-2 text-blue-250 text-sm text-right pr-3"
                                    >
                                        <div class="flex">
                                            <img
                                                class="ml-auto pr-2"
                                                src="{{asset('storage/images/assets/change.svg')}}"
                                            />
                                        <a
                                            href="{{ route('galleries.index') }}"
                                            class="changelink"
                                            >Change</a
                                        >
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <th
                                        class="pl-2 py-2 text-blue-250 text-left text-sm"
                                    >
                                        
                                        <a href="{{ route('galleryItems.index') }}">Gallerie</a>
                                    </th>

                                    <td
                                        class="pl-2 text-blue-250 text-sm text-right"
                                    >
                                        {{-- <div class="flex"> --}}
                                        {{--     <img --}}
                                        {{--         class="ml-auto pr-2" --}}
                                        {{--         src="{{asset('storage/images/assets/add.svg')}}" --}}
                                        {{--     /> --}}
                                        {{--     <a href="/catalog/author/add/" --}}
                                        {{--         >Add</a --}}
                                        {{--     > --}}
                                        {{-- </div> --}}
                                    </td>

                                    <td
                                        class="pl-2 text-blue-250 text-sm text-right pr-3"
                                    >
                                        <div class="flex">
                                            <img
                                                class="ml-auto pr-2"
                                                src="{{asset('storage/images/assets/change.svg')}}"
                                            />
                                        <a
                                            href="{{ route('galleryItems.index') }}"
                                            class="changelink"
                                            >Change</a
                                        >
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
