<div class="py-5 uppercase text-gray-400 -mx-1.5 font-light">Post hinzufügen</div>

<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <div class="form-row field-first_name border-gray-200 w-96">
        @foreach ($attr as $a)
        <div class="py-2.5 border-b flex">
            <label class="font-bold text-sm pr-16 leading-7" for="{{ $a }}">{{$a}}:</label>

            <input
                type="text"
                name="{{$a}}"
                class="rounded h-7 border-gray-400 ml-auto"
                maxlength="100"
                required=""
                id="{{$a}}"
            />
        </div>
        @endforeach
    </div>
</form>
