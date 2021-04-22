<aside class="sm:flex-shrink-0 w-60 sm:pl-5 mx-auto md:pt-0 pt-10">
    <div>
        <ul class="text-gray-400 uppercase text-sm ">
            <li class="">
                <span class="cursor-pointer">Theater </span>
                <hr class="my-2" />
            </li>
            <li class="">
                <span class="cursor-pointer">Photography </span>
                <hr class="my-2" />
            </li>
            <li class="">
                <span class="cursor-pointer">Yoga </span>
                <hr class="my-2" />
            </li>
        </ul>
    </div>
    <div class="pt-5">
        <ul>
            @foreach ($posts->slice(-4) as $post)
            <li class="pb-5">
                <div class="flex">
                    <a
                        class="mr-3 flex-shrink-0 cursor-pointer" 
                        href="{{ route('article', $post->id) }}">
                        <img
                     class="h-20 object-cover object-top w-20"
                     src='{{ asset("storage/images/".$post->image) }}'
                     />
                    </a>
                    <a 
                        href="{{ route('article', $post->id) }}">
                        <span
                     class="-mt-1 text-sm font-title font-title text-blue-400 cursor-pointer"
                     >
                     {{ $post->title }}
                        </span>
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
