<x-app-layout>

    <x-flash-message :message="session('notice')" />
    <x-validation-errors :errors="$errors" />

    <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
        <div class="rounded-lg w-5/6 shadow-xl bg-gray-900 text-gray-700">
            {{-- <div class="border-b border-red-800 px-8 py-3">
                <div class="inline-block w-3 h-3 mr-2 rounded-full bg-red-500"></div>
                <div class="inline-block w-3 h-3 mr-2 rounded-full bg-yellow-300"></div>
                <div class="inline-block w-3 h-3 mr-2 rounded-full bg-green-400"></div>
            </div> --}}
            <div class="px-8 py-6 font-mono break-all">
                <h2 class="text-center text-lg text-white font-bold pt-6 tracking-widest">挑戦</h2>
                <form action="{{ route('challenges.store') }}" method="POST" class="rounded pt-3 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-white mb-2" for="title">
                            タイトル
                        </label>
                        <input type="text" name="title"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3"
                            required placeholder="タイトル" value="{{ old('title') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-white mb-2" for="description">
                            内容
                        </label>
                        <textarea name="description" rows="10"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3"
                            required placeholder="なにを、いつ、なぜ、どのように">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-4 flex justify-center">
                        <label class="block text-white mb-2" for="title">
                            レベル : 10
                        </label>
                        <img src="/images/yuusya_game.png" width="200px" height="200px" alt="">
                    </div>
                    <input type="submit" value="挑戦する"
                        class="w-full flex justify-center bg-gradient-to-r from-red-400 to-red-800 hover:bg-gradient-to-l hover:from-red-800 hover:to-red-400 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-indigo-900 shadow-md rounded-md">
        <h2 class="text-center text-lg text-white font-bold pt-6 tracking-widest">挑戦</h2>
        <form action="{{ route('challenges.store') }}" method="POST" class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-white mb-2" for="title">
                    タイトル
                </label>
                <input type="text" name="title"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3"
                    required placeholder="タイトル" value="{{ old('title') }}">
            </div>
            <div class="mb-4">
                <label class="block text-white mb-2" for="description">
                    内容
                </label>
                <textarea name="description" rows="10"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3"
                    required placeholder="なにを、いつ、なぜ、どのように">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4 flex justify-center">
                <label class="block text-white mb-2" for="title">
                    レベル : 10
                </label>
                <img src="/images/yuusya_game.png" width="200px" height="200px" alt="">
            </div>
            <input type="submit" value="挑戦する"
                class="w-full flex justify-center bg-gradient-to-r from-pink-500 to-purple-600 hover:bg-gradient-to-l hover:from-purple-500 hover:to-pink-600 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
        </form>
    </div> --}}


</x-app-layout>
