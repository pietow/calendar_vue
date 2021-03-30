<x-blog.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row p-6">
                        <div class="bg-white p-10">
                            <img
                                src='{{ asset("storage/images/blog.jpg") }}'
                                class="w-full"
                            />
                            <div class="pt-10 ">
                                <div
                                    class="text-gray-400 tracking-wide uppercase text-sm"
                                >
                                    {{date("d. M Y")}} by Charly
                                </div>
                                <div
                                    class="text-3xl py-5 font-title font-semibold font-title capitalize" 
                                >
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do
                                </div>
                                <p class="text-gray-600">
                                    Lorem ipsum dolor sit amet, consetetur
                                    sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore magna
                                    aliquyam erat, sed diam voluptua. At vero
                                    eos et accusam et justo duo dolores et ea
                                    rebum. Stet clita kasd gubergren, no sea
                                    takimata sanctus est Lorem ipsum dolor sit
                                    amet. Lorem ipsum dolor sit amet, consetetur
                                    sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore magna
                                    aliquyam erat, sed diam voluptua. At vero
                                    eos et accusam et justo duo dolores et ea
                                    rebum. Stet clita kasd gubergren, no sea
                                    takimata sanctus est Lorem ipsum dolor sit
                                    amet. Lorem ipsum dolor sit amet, consetetur
                                    sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore magna
                                    aliquyam erat, sed diam voluptua. At vero
                                    eos et accusam et justo duo dolores et ea
                                    rebum. Stet clita kasd gubergren, no sea
                                    takimata sanctus est Lorem ipsum dolor sit
                                    amet. Duis autem vel eum iriure dolor in
                                    hendrerit in vulputate velit esse molestie
                                    consequat, vel illum dolore eu feugiat nulla
                                    facilisis at vero eros et accumsan et iusto
                                    odio dignissim qui blandit praesent luptatum
                                    zzril delenit augue duis dolore te feugait
                                    nulla facilisi. Lorem ipsum dolor sit amet,
                                    consectetuer adipiscing elit, sed diam
                                    nonummy nibh euismod tincidunt ut laoreet
                                    dolore magna aliquam erat volutpat. Ut wisi
                                    enim ad minim veniam, quis nostrud exerci
                                    tation ullamcorper suscipit lobortis nisl ut
                                    aliquip ex ea commodo consequat. Duis autem
                                    vel eum iriure dolor in hendrerit in
                                    vulputate velit esse molestie consequat, vel
                                    illum dolore eu feugiat nulla facilisis at
                                    vero eros et accumsan et iusto odio
                                    dignissim qui blandit praesent luptatum
                                    zzril delenit augue duis dolore te feugait
                                    nulla facilisi. Nam liber tempor cum soluta
                                    nobis eleifend option congue nihil imperdiet
                                    doming id quod mazim placerat facer
                                </p>
                            </div>
                        </div>
                        <x-blog.aside />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blog.app>
