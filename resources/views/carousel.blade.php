<x-blog.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 ">
                   @foreach ($gals as $gal)
                       {{$gal->title}}
                       
                       <img src="{{ asset('storage/images/'.$gal->image) }}"> 
                   @endforeach 
                </div>
            </div>
        </div>
    </div>
</x-blog.app>
