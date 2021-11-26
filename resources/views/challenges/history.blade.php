<x-app-layout>

    <x-flash-message :message="session('notice')" />
    <x-flash-message :message="$no_challenge" />
    <x-validation-errors :errors="$errors" />
    <div class="min-w-screen min-h-screen bg-gray-200 flex  justify-center px-5 py-5">
        @if ($challenges->count() != 0)
            <div class="rounded-lg w-5/6 shadow-xl bg-gray-900 text-gray-400">
                <div class="px-8 py-6 font-mono break-all">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="w-full">
                                @foreach ($challenges as $challenge)
                                    <div class="bg-white w-full px-10 py-8 hover:shadow-2xl transition duration-500">
                                        <div class="mt-4">
                                            <div class="flex justify-between text-sm items-center mb-4">
                                                <div class="text-gray-700">
                                                </div>
                                                <div class="text-gray-700 text-right">
                                                    <div>{{ $challenge->goods->count() }} いいね</div>
                                                </div>
                                            </div>
                                            <h2 class="text-lg text-gray-700 font-semibold">
                                                <a class="hover:text-red-500 text-yellow-500 font-bold"
                                                    href="{{ route('challenges.show', $challenge) }}">{{ $challenge->title }}</a>
                                            </h2>
                                            <p>{{ Str::limit($challenge->description, 300) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
