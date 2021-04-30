<div class="py-5 uppercase text-gray-400 -mx-1.5 font-light">
    {{ $entity }} editieren
</div>

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
              <input type="file" name="{{$a}}" id="{{$a}}">
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
    <img class="h-10" src="{{asset('../storage/images/'.$model->image)}}" alt="">
        
    <div class="">
        <div class="px-1.5 w-full bg-blue-250 text-white leading-10 rounded h-10">{{$entity}}elemente</div>
            <div x-data="{text: [0]}" >
                @foreach ($childAttr as $a)
                    <div  class=""
                        >
                        @if($a == 'image'  )
                            <div class="pb-5 pl-1.5 pt-4 border-b grid grid-cols-2 gap-4">
                                <label class="font-bold capitalize text-sm leading-7" for="{{ $a }}"
                                    >{{$a}}:</label
                                >
                                <input type="file" name="child-{{$a}}" id="child.{{$a}}">
                            </div>
                        @elseif($a == 'description')
                            <div class="pb-5 pl-1.5 pt-4 border-b grid grid-cols-2 gap-4">
                                <label class="font-bold capitalize text-sm leading-7" for="{{ $a }}"
                                    >{{$a}}:</label
                                >
                                <textarea 
                                                                                      class="rounded" id="{{$a}}" name="{{$a}}" rows="10" cols="30">{{$childmodel->first()->description}}</textarea>
                            </div>
                        @endif
                    </div>
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



