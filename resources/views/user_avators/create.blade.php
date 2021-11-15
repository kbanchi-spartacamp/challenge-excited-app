<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-indigo-900 shadow-md rounded-md">
        <h2 class="text-center text-lg text-white font-bold pt-6 tracking-widest">
            @if (empty($userAvator))
                アバター登録
            @else
                アバター情報
            @endif
        </h2>

        <form action="{{ route('user_avators.store') }}" method="POST" class="rounded pt-3 pb-8 mb-4">
            @csrf
            @if (empty($userAvator))
                <div class="mb-4">
                    <label class="block text-white mb-2" for="occupation_id">
                        アバター選択
                    </label>
                    <select name="avatorCategory_id"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3">
                        <option disabled selected value="">選択してください</option>
                        @foreach ($avatorCategories as $avatorCategory)
                            <option value="{{ $avatorCategory->id }}" @if ($avatorCategory->id == old('avatorCategory_id')) selected @endif>
                                {{ $avatorCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="mb-4">
                <img src="/images/yuusya_game.png" width="200px" height="200px" alt="">
                <img src="/images/mahoutsukai_man.png" width="200px" height="200px" alt="">
                <img src="/images/kung-fu_man.png" width="200px" height="200px" alt="">
            </div>
            @if (empty($userAvator))
                <input type="submit" value="登録"
                    class="w-full flex justify-center bg-gradient-to-r from-pink-500 to-purple-600 hover:bg-gradient-to-l hover:from-purple-500 hover:to-pink-600 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
            @endif
        </form>
    </div>
</x-app-layout>
