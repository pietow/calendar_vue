<x-blog.app>
    <x-slot name="link">
        {{ asset("storage/images/blog-2.jpg") }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white text-5xl leading-tight after:empty-content inline-block">
            {{ __('Blog') }}
        </h2>
        <span class="text-white block text-2xl pt-0.5">
            Yoga & Privat
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex flex-col sm:flex-row p-6 -gray-100"> 
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="bg-white" style="height:30rem;">
                            <img class="cursor-pointer h-1/2 object-cover object-top w-full" src='{{ asset("storage/images/blog.jpg") }}'>
                            <div class="p-3 ">
                                <div class="text-gray-400 tracking-wide uppercase text-xs">{{date("d. M Y")}}</div>
                                <div class="text-xl font-title font-medium font-title capitalize hover:text-blue-400 cursor-pointer"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</div>
                                <div class="text-gray-600 text-justify pt-2 text-sm"> {{ substr("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

                                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   

                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   

                                    Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer",0,250) }} 
                                    <span class="text-blue-400 cursor-pointer hover:underline">
                                        mehr(...)
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white" style="height:30rem;">
                            <img class="cursor-pointer h-1/2 object-cover object-top w-full" src='{{ asset("storage/images/blog-2.jpg") }}'>
                            <div class="p-3 ">
                                <div class="text-gray-400 tracking-wide uppercase text-xs">{{date("d. M Y")}}</div>
                                <div class="text-xl font-title font-medium font-title capitalize hover:text-blue-400 cursor-pointer"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</div>
                                <div class="text-gray-600 text-justify pt-2 text-sm"> {{ substr("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

                                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   

                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   

                                    Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer",0,250) }} 
                                    <span class="text-blue-400 cursor-pointer hover:underline">
                                        mehr(...)
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white" style="height:30rem;">
                            <img class="cursor-pointer h-1/2 object-cover object-top w-full" src='{{ asset("storage/images/blog.jpg") }}'>
                            <div class="p-3 ">
                                <div class="text-gray-400 tracking-wide uppercase text-xs">{{date("d. M Y")}}</div>
                                <div class="text-xl font-title font-medium font-title capitalize hover:text-blue-400 cursor-pointer"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</div>
                                <div class="text-gray-600 text-justify pt-2 text-sm"> {{ substr("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

                                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   

                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   

                                    Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer",0,250) }} 
                                    <span class="text-blue-400 cursor-pointer hover:underline">
                                        mehr(...)
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white" style="height:30rem;">
                            <img class="cursor-pointer h-1/2 object-cover object-top w-full" src='{{ asset("storage/images/blog.jpg") }}'>
                            <div class="p-3 ">
                                <div class="text-gray-400 tracking-wide uppercase text-xs">{{date("d. M Y")}}</div>
                                <div class="text-xl font-title font-medium font-title capitalize hover:text-blue-400 cursor-pointer"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</div>
                                <div class="text-gray-600 text-justify pt-2 text-sm"> {{ substr("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

                                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   

                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   

                                    Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer",0,250) }} 
                                    <span class="text-blue-400 cursor-pointer hover:underline">
                                        mehr(...)
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div> 

                    <aside class="sm:flex-shrink-0 w-60 sm:pl-5 mx-auto sm:pt-0 pt-10">
                        <div>
                            <ul class="text-gray-400 uppercase text-sm ">
                                <li class=""><span class="cursor-pointer">Theater </span><hr class="my-2"></li>
                                <li class=""><span class="cursor-pointer">Photography </span><hr class="my-2"></li>
                                <li class=""><span class="cursor-pointer">Yoga </span><hr class="my-2"></li>
                            </ul>
                        </div>
                        <div class="pt-5">
                            <ul>
                                <li class="pb-10">
                                    <div class="flex">
                                        <img class="mr-3 flex-shrink-0 cursor-pointer h-20 object-cover object-top w-20" src='{{ asset("storage/images/blog.jpg") }}'>
                                        <span class="-mt-1 text-sm font-title font-title text-blue-400 cursor-pointer"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</span>
                                    </div>
                                
                                </li>
                                <li class="pb-10">
                                    <div class="flex">
                                        <img class="mr-3 flex-shrink-0 cursor-pointer h-20 object-cover object-top w-20" src='{{ asset("storage/images/blog.jpg") }}'>
                                        <span class="-mt-1 text-sm font-title font-title text-blue-400 cursor-pointer"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</span>
                                    </div>
                                
                                </li>
                                <li class="pb-10">
                                    <div class="flex">
                                        <img class="mr-3 flex-shrink-0 cursor-pointer h-20 object-cover object-top w-20" src='{{ asset("storage/images/blog.jpg") }}'>
                                        <span class="-mt-1 text-sm font-title font-title text-blue-400 cursor-pointer"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</span>
                                    </div>
                                
                                </li>
                                <li class="pb-10">
                                    <div class="flex">
                                        <img class="mr-3 flex-shrink-0 cursor-pointer h-20 object-cover object-top w-20" src='{{ asset("storage/images/blog.jpg") }}'>
                                        <span class="-mt-1 text-sm font-title font-title text-blue-400 cursor-pointer"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</span>
                                    </div>
                                
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</x-blog.app>
