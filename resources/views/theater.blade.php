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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
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
                                <a
                                    class
                                    href='{{ asset("storage/images/blog/about.jpg") }}'
                                    data-fancybox="gallery"
                                >
                                    <img
                                        src='{{ asset("storage/images/blog/about.jpg") }}'
                                        class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                    />
                                </a>
                                <a
                                    class
                                    href='{{ asset("storage/images/blog/screem.jpg") }}'
                                    data-fancybox="gallery"
                                >
                                    <img
                                        src='{{ asset("storage/images/blog/screem.jpg") }}'
                                        class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                    />
                                </a>
                                <img
                                    src='{{ asset("storage/images/blog/bio.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/buddha.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/horned.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/palais.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/pray.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/screem.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/small_kid.JPG") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/small_towers.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/avatar.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/about.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                                <img
                                    src='{{ asset("storage/images/blog/about.jpg") }}'
                                    class="inline-block h-40 mx-1 p-1.5 duration-1000 ease-in-out hover:bg-blue-200 cursor-pointer"
                                />
                            </div>
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
