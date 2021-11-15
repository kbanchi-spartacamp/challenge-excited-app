<x-app-layout>
    <div class="py-12">

        <x-flash-message :message="session('notice')" />
        <x-validation-errors :errors="$errors" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="w-full">
                    @foreach ($challenges as $challenge)
                        <div class="bg-white w-full px-10 py-8 hover:shadow-2xl transition duration-500">
                            <div class="mt-4">
                                <div class="flex justify-between text-sm items-center mb-4">
                                    <div></div>
                                    <div class="text-gray-700 text-right">
                                        <div>{{ $challenge->goods->count() }} いいね</div>
                                    </div>
                                </div>
                                <h2 class="text-lg text-gray-700 font-semibold">
                                    <a class="hover:text-blue-500 text-green-500 font-bold"
                                        href="{{ route('challenges.show', $challenge) }}">{{ $challenge->title }}</a>
                                </h2>
                                <p>{{ $challenge->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
