<div class="py-5 uppercase text-gray-400 -mx-1.5 font-light">
    {{ $entity }} editieren
</div>


@if ($errors->any())
<div class="pt-5">
    <ul class="text-red-600">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- <div x-data="imageViewer()" x-init="imageUrl = '{{asset("../storage/images/".$model->image)}}'"> --}}
{{--   <div class="mb-2"> --}}
{{--     <!-- Show the image --> --}}
{{--       <img :src="imageUrl" --}} 
{{--            class="object-cover rounded border border-gray-200" --}} 
{{--            style="width: 100px; height: 100px;" --}}
{{--       > --}}
{{--     <!-- Image file selector --> --}}
{{--     <input class="mt-2" type="file" @change="fileChosen"> --}}
    
{{--   </div> --}}
{{-- </div> --}}


<form action="{{ route($routeName, $model->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @if ($message = Session::get('success'))
    <div class="text-green-500 -mx-1.5">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="form-row field-first_name border-gray-200 w-96">
        @foreach ($attr as $a)
        <div class="pb-5 pt-4 border-b flex">
            <label class="font-bold capitalize text-sm pr-16 leading-7" for="{{ $a }}"
                >{{$a}}:</label
            >
        @if($a == 'image'  )
            {{-- <div class="pr-5"> --}}
            {{--     <img class="h-7 w-9 object-cover rounded-full" src="{{asset('../storage/images/'.$model->image)}}" alt=""> --}}
            {{-- </div> --}}
            {{-- <input type="file" name="{{$a}}" id="{{$a}}"> --}}
            <x-cms.image-viewer :path="$model->image" :name="$a">
            </x-cms.image-viewer>
        @else
            <input
                type="text"
                name="{{$a}}"
                value="{{$model->$a}}"
                class="rounded h-7 border-gray-400 ml-auto"
                id="{{$a}}"
            />
        @endif
        </div>
        @endforeach
    </div>
        
    <div class="">
        <div class="px-1.5 w-full bg-blue-250 text-white leading-10 rounded h-10">{{$entity}}elemente</div>
            <div x-data="{text: [0]}" >
        @foreach ($childmodel as $child)
                @foreach ($childAttr as $a)
                    <div  class=""
                        >
                        @if($a == 'image'  )
                            <div class="pb-5 pl-1.5 pt-4 border-b grid grid-cols-2 gap-4">
                                <label class="font-bold capitalize text-sm leading-7" for="{{ $a }}"
                                    >{{$a}}:</label
                                >
                                {{-- <input type="file" name="childimage-{{$loop->parent->index}}" id="child.{{$loop->parent->index}}"> --}}
                                <x-cms.image-viewer :path="$child->image" :name="$a.'-'.$child->id">
                                </x-cms.image-viewer>
                            </div>
                        @elseif($a == 'description')
                            <div class="pb-5 pl-1.5 pt-4 border-b grid grid-cols-2 gap-4">
                                <label class="font-bold capitalize text-sm leading-7" for="{{ $a }}"
                                    >{{$a}}:</label
                                >
                                <textarea 
                                                                                      class="rounded" id="{{$a.'-'.$child->id}}" name="{{$a.'-'.$child->id}}" rows="10" cols="30">{{$child->description}}</textarea>
                            </div>
                        @endif
                    </div>
                @endforeach
        @endforeach

                <div class="px-1.5 w-full bg-blue-250 text-white leading-10 rounded h-10">Upload mehrer Bilder</div>
                <input type="file" name="upload[]" multiple class="pt-5">

            </div>
    </div>

        <div class="flex pt-5">
            <button
                class="ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                type="submit"
                value="submit"
            >
                Submit
            </button>
        </div>

</form>


{{-- <script> --}}
{{-- function imageViewer(){ --}}
{{--   return{ --}}
{{--     imageUrl:"", --}}
{{--       fileChosen(event) { --}}
{{--           if(!event.target.files[0]) return --}}

{{--           let file = event.target.files[0]; --}}
{{--           let reader = new FileReader(); --}}
{{--           reader.readAsDataURL(file) --}}
{{--           reader.onload = () => this.imageUrl = reader.result --}}
{{--         } --}}
{{--   } --}}
{{-- } --}}
{{-- </script> --}}
