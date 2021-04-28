<div class="py-5 uppercase text-gray-400 -mx-1.5 font-light">
    Post hinzufügen
</div>

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
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
            {{-- <input type=”file” name=”{{$a}}” id=”{{$a}}” class="rounded h-7 border-gray-400 ml-auto"> --}}
              <input type="file" name="{{$a}}" id="{{$a}}">
            {{-- <input type="file" id="{{$a}}" name="{{$a}}"> --}}
        @else
            <input
                type="text"
                name="{{$a}}"
                class="rounded h-7 border-gray-400 ml-auto"
                id="{{$a}}"
            />
        @endif
        </div>
        @endforeach
        


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


        @if ($errors->any())
        <div class="pt-5">
            <ul class="text-red-600">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</form>

<div class="max-w-7xl pt-5 mx-auto text-center"
         x-data="
            {
                text: [0],
            }"
         >

        <h1 class="" x-text="text"></h1>

        <button x-on:click="text.push(text[0]++)">click</button>
        <template x-for="item in text" :key="item">
            <div x-text="item"></div>
        </template>
</div>
<script>
    function myFunction() {
        console.log('bla');
    }
</script>
