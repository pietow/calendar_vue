<x-blog.app>
    <x-slot name="link">
        {{ asset("storage/images/about.jpg") }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white text-5xl leading-tight after:empty-content inline-block">
            {{ __('About') }}
        </h2>
        <span class="text-white block text-2xl pt-0.5">
            Yoga & Privat
        </span>
    </x-slot>

    {{-- <div class="absolute top-0 w-full h-11 opacity-40" --}}
    {{--      style="background-image:url('{{ asset("storage/images/water_wave.jpeg") }}');"> --}}
    {{-- </div --}}

    <div class="bg-gray-50 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200:">
                    <div class="w-2/3 block m-auto pt-5">
                        <img src='{{ asset("storage/images/blog.jpg") }}'>
                        <div class="pt-10">
                            <p>
                                Geboren im Saarland, 1988<br>
                                Lebt und arbeitet in Bielefeld
                            </p>
                        </div>                
                        <div class="pt-10 pb-10">
                            <table class="w-full">
                                <tbody>
                                <tr>
                                <td class="whitespace-nowrap align-baseline pb-2 pr-5">2010 – 2018</td>
                                <td>FH Bielefeld</td>
                                </tr>
                                <tr>
                                <td class="whitespace-nowrap align-baseline pb-2 pr-5">1980 – 1987</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </td>
                                </tr>
                                <tr>
                                <td class="whitespace-nowrap align-baseline pb-2 pr-5">1977 – 1980</td> 
                                <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-blog.app>


