<x-blog.app>
    <x-slot name="fancybox_css">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"
        />
    </x-slot>
    <x-slot name="fancybox_style">
        <style>
            @media all and (min-width: 600px) {
                .fancybox-infobar {
                    display: none;
                }
            }
        </style>
    </x-slot>
    <x-slot name="fancybox_scripts">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    </x-slot>
        <div class="max-w-7xl pt-5 mx-auto sm:px-6 lg:px-8">
            <div class="flex p-5">
                <p class="pr-5 text-gray-400 text-sm leading-6">{{ $gal->title }}</p>
                <a class="" href="{{ route('carousel.gallery', $gal->id) }}">
                    <div class="pr-5 w-5 h-5 mr-2 my-0.5 bg-gray-300 hover:bg-yellow-550 rounded"></div>
                </a>
                    <img
                     class="w-5 my-0.5 bg-yellow-550 rounded"
                     src="{{ asset('storage/images/assets/grid.png') }}"
                     alt=""
                     />
                <a class="ml-auto" href="{{ route('galleries') }}">
                    <p class="ml-auto text-gray-400 text-sm leading-6">zurück zu galerien</p>
                </a>
            </div>

            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6"> 
                    <div class="p-6">
                        <div class="flex flex-col ">
                            <div class="mx-auto">
                                <span
                                    class="uppercase tracking-wider pb-5 inline-block"
                                    >Theater 
                                    <hr class="bg-black"
                                /></span>
                            </div>

                            <div class="w-full text-center">
                                @foreach ($gal->galleryitems as $galItem)
                                <a
                                    href='{{ asset("storage/images/".$galItem->image) }}'
                                    data-fancybox="gallery"
                                >
                                    <img
                                    src='{{ asset("storage/images/".$galItem->image) }}'
                                        class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                    />
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <x-slot name="script">
        <script>
            $('[data-fancybox="gallery"]').fancybox({
                buttons: ["close"],
            });
        </script>
    </x-slot>
</x-blog.app>
