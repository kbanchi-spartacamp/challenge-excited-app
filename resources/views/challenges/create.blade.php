<x-app-layout>

    <x-flash-message :message="session('notice')" />
    <x-validation-errors :errors="$errors" />

    <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
        <div class="rounded-lg w-5/6 shadow-xl bg-gray-900 text-gray-700">
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
                        <textarea name="description" rows="5"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3"
                            required placeholder="なにを、いつ、なぜ、どのように">{{ old('description') }}</textarea>
                    </div>
                    @if (!empty($userAvator))
                        <div class="mb-4 flex justify-center">
                            <label class="block text-white mb-2" for="title">
                                レベル : {{ $userAvator->level }}
                            </label>
                            <img src="/images/{{ $avatorImage->image_path }}" width="200px" height="200px" alt="">
                        </div>
                        <input type="submit" value="挑戦する"
                            class="w-full flex justify-center bg-gradient-to-r from-red-400 to-red-800 hover:bg-gradient-to-l hover:from-red-800 hover:to-red-400 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
