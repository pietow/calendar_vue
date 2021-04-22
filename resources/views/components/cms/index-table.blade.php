<div class="py-5">
    <table class="">
        <thead>
            <tr>
                @foreach ($attr as $a)
                    <th class="border-b border-gray-200 pl-2 py-2 text-gray-500 text-left text-sm">
                        {{$a}}
                    </th>
                @endforeach
                    <th class="border-b border-gray-200 pl-2 py-2 text-gray-500 text-left text-sm">
                    </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr class="border-b border-gray-200">
                    @foreach ($attr as $a)
                        @if($a == 'image')
                            <td class="pl-2 py-2 text-blue-250 text-left text-sm whitespace-nowrap">
                                <img class="w-10 h-10 object-cover object-top" src="{{ asset('storage/images/'.$item->$a) }}">
                            </td>
                        @else
                            <td class="pl-2 py-2 text-blue-250 text-left text-sm whitespace-nowrap">
                                {{$item->$a}}
                            </td>
                        @endif 
                    @endforeach
                    <td
                        class="pl-2 text-blue-250 text-sm "
                    >
                        <div class="flex h-7 pr-5">
                            <img
                                class="ml-auto pr-2"
                                src="{{asset('storage/images/assets/delete.png')}}"
                            />
                            <form action="{{ route('cms.blog.delete', $item->id) }}" method="POST">
                            @method('DELETE')
                            <input class="bg-white cursor-pointer" type="submit" value="Löschen">
                            </form>
                        </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
