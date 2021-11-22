<x-app-layout>
    {{-- <div class="py-12"> --}}
        <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
        <div class="rounded-lg w-5/6 shadow-xl bg-gray-900 text-gray-400">
            {{-- <div class="border-b border-green-800 px-8 py-3">
                <div class="inline-block w-3 h-3 mr-2 rounded-full bg-red-500"></div>
                <div class="inline-block w-3 h-3 mr-2 rounded-full bg-yellow-300"></div>
                <div class="inline-block w-3 h-3 mr-2 rounded-full bg-green-400"></div>
            </div> --}}
            <div class="px-8 py-6 font-mono break-all">

        <x-flash-message :message="session('notice')" />
        <x-validation-errors :errors="$errors" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('challenges.index') }}" method="get">


            {{-- <input
                type="text"
                placeholder="Try 'Bagel Seasoning'"
                class="w-full rounded-tl-full rounded-bl-full py-2 px-4" />
            <button class="bg-yellow-300 rounded-tr-full rounded-br-full hover:bg-red-300 py-2 px-4">
                <p class="font-semibold text-base uppercase">Search</p>
            </button>
        --}}



                <div class="shadow flex">
                    <input name="keyword" class="w-full rounded-tl-full rounded-bl-full py-2 px-4" type="text" placeholder="Search..."
                        value="{{ old('keyword', $keyword) }}">
                    <button type="submit"
                        class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">

{{-- class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400" --}}

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
                                    <a class="hover:text-red-500 text-yellow-500 font-bold"
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
