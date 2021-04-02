<x-blog.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 " id="app">
                    <container-gallery :prop-gallery="{{ $gal->galleryItems }}"></container-gallery>
                    {{-- @foreach ($gal->galleryItems as $item) --}}
                    {{--     <img src="{{ asset('storage/images/'.$item->image) }}"> --}} 
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</x-blog.app>
