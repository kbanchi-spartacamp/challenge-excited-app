<x-app-layout>
    <div class="py-12">

        <x-flash-message :message="session('notice')" />
        <x-validation-errors :errors="$errors" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('challenges.index') }}" method="get">
                <div class="shadow flex">
                    <input name="keyword" class="w-full rounded p-2" type="text" placeholder="Search..."
                        value="{{ old('keyword', $keyword) }}">
                    <button type="submit"
                        class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
            <hr>
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
        {{ $challenges->links() }}
    </div>
</x-app-layout>
