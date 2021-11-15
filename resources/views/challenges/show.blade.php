<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-4 py-4 bg-white shadow-md">

        <x-flash-message :message="session('notice')" />
        <x-validation-errors :errors="$errors" />

        <article class="mb-2">
            <div class="flex justify-center mt-1 mb-3">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div>
                        <img src="{{ $challenge->user->profile_photo_url }}" alt=""
                            class="h-10 w-10 rounded-full object-cover mr-3">
                    </div>
                @endif
            </div>
            @if (auth()->user()->id != $challenge->user->id)
                <div class="flex justify-center mt-1 mb-3">
                    {{ $challenge->user->name }} さん
                </div>
            @endif
            <div class="flex justify-end mt-1 mb-3">
                <span>{{ $challenge->goods->count() }} いいね</span>
            </div>
            <div class="flex justify-end text-sm">
                @if (empty($good))
                    <form action="{{ route('challenges.goods.store', $challenge) }}" method="POST">
                        @csrf
                        <input type="submit" value="いいね"
                            class="bg-gradient-to-r bg-gradient-to-r from-indigo-500 to-blue-600 hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 w-full sm:w-32 sm:mr-2 mb-2 sm:mb-0">
                    </form>
                @else
                    <form action="{{ route('challenges.goods.destroy', [$challenge, $good]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="いいね取り消し"
                            class="bg-gradient-to-r from-pink-500 to-purple-600 hover:bg-gradient-to-l hover:from-purple-500 hover:to-pink-600 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 w-full sm:w-32 sm:mr-2 mb-2 sm:mb-0">
                    </form>
                @endif

            </div>
            <h2 class="text-center font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl mb-10">
                {{ $challenge->title }}
            </h2>
            <p class="text-gray-700 text-base">{!! nl2br(e($challenge->description)) !!}</p>
        </article>
        <form action="{{ route('challenges.comments.store', $challenge) }}" method="POST"
            class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="flex justify-end mb-4">
                @if (auth()->user()->id == $challenge->user->id)
                    @if ($challenge->close_flg == 0)
                        <input type="submit" value="結果報告"
                            class="bg-gradient-to-r bg-gradient-to-r from-indigo-500 to-blue-600 hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 w-full sm:w-32 sm:mr-2 mb-2 sm:mb-0">
                    @endif
                @else
                    <input type="submit" value="激励"
                        class="bg-gradient-to-r from-pink-500 to-purple-600 hover:bg-gradient-to-l hover:from-purple-500 hover:to-pink-600 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 w-full sm:w-32 sm:mr-2 mb-2 sm:mb-0">
                @endif
            </div>
            @if ((auth()->user()->id == $challenge->user->id && $challenge->close_flg == 0) || auth()->user()->id != $challenge->user->id)
                <textarea name="comment" rows="3"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3"
                    required placeholder="">{{ old('comment') }}</textarea>
            @endif
        </form>
        @foreach ($challenge->comments as $comment)
            <div class="my-2">
                @if ($comment->user->id == auth()->user()->id)
                    <span class="font-bold mr-3 text-red-500">{{ $comment->user->name }}</span>
                @else
                    <span class="font-bold mr-3">{{ $comment->user->name }}</span>
                @endif
                <span class="text-sm">{{ $comment->created_at }}</span>
                <p>{!! nl2br(e($comment->comment)) !!}</p>
            </div>
            <hr>
        @endforeach
    </div>
</x-app-layout>
