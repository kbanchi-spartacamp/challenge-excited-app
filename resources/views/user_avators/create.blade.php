<x-app-layout>

    <x-flash-message :message="$no_avator" />
    <x-validation-errors :errors="$errors" />

    <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
        <div class="rounded-lg w-5/6 shadow-xl bg-gray-900 text-gray-700">
            <div class="px-8 py-6 font-mono break-all">
                <h2 class="text-center text-lg text-white font-bold pt-6 tracking-widest mb-10">
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
                                アバターを選択してください
                            </label>
                            <select id="avator_category_id" name="avatorCategory_id" onchange="avator_select()"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3">
                                <option disabled selected value="">選択してください</option>
                                @foreach ($avatorCategories as $avatorCategory)
                                    <option value="{{ $avatorCategory->id }}" @if ($avatorCategory->id == old('avatorCategory_id')) selected @endif>
                                        {{ $avatorCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if (empty($userAvator))
                        <div class="mb-4 flex justify-center">
                            @foreach ($avatorImages as $avatorImage)
                                <img id="avator_category_id_{{ $avatorImage->avator_category_id }}"
                                    src="/images/{{ $avatorImage->image_path }}" width="200px" height="200px" alt=""
                                    style="display:none">
                            @endforeach
                        </div>
                    @else
                        <div class="mb-4 flex justify-center">
                            <label class="block text-white mb-2" for="title">
                                レベル : {{ $userAvator->level }}
                            </label>
                            <img src="/images/{{ $avatorImage->image_path }}" width="200px" height="200px" alt="">
                        </div>
                    @endif
                    @if (empty($userAvator))
                        <input type="submit" value="登録"
                            class="w-full flex justify-center bg-gradient-to-r from-red-400 to-red-800 hover:bg-gradient-to-l hover:from-red-800 hover:to-red-400 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
                    @endif
                </form>
            </div>
        </div>
    </div>
    <script>
        function avator_select() {
            const selected_avator = document.getElementById("avator_category_id").value;
            for (i = 1; i < document.getElementById("avator_category_id").length; i++) {
                if (selected_avator == i) {
                    document.getElementById("avator_category_id_" + i).style.display = "";
                } else {
                    document.getElementById("avator_category_id_" + i).style.display = "none";
                }
            }
        }
    </script>
</x-app-layout>
