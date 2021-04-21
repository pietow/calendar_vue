<x-blog.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row p-6">
                        <div class="bg-white p-10">
                            <img
                             src='{{ asset("storage/images/".$post->image) }}'
                                class="w-full"
                            />
                            <div class="pt-10 ">
                                <div
                                    class="text-gray-400 tracking-wide uppercase text-sm"
                                >
                                    {{\Carbon\Carbon::parse($post->updated_at)->locale('de')->format('j. M, Y')}} by Charly
                                </div>
                                <div
                                    class="text-3xl py-5 font-title font-semibold font-title capitalize" 
                                >
                                    {{ $post->title }}
                                </div>
                                <p class="text-gray-600">
                                    {{ $post->PostItems()->first()->description }}
                                </p>
                            </div>
                        </div>
                        <x-blog.aside :posts="$posts"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blog.app>
