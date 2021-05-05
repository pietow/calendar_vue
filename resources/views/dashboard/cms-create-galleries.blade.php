<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallerien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-cms.create-parent :attr="$attr" :childAttr="$childAttr" :routeName="'galleries.store'" :entity="'Galerie'"></x-cms>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
