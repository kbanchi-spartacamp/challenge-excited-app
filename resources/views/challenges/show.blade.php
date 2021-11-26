<x-app-layout>

    <x-flash-message :message="session('notice')" />
    <x-validation-errors :errors="$errors" />

    <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
        <div class="rounded-lg w-5/6 shadow-xl bg-gray-900 text-gray-400">
            <div class="px-8 py-6 font-mono break-all">
                <article class="mb-2">
                    @if (auth()->user()->id != $challenge->user->id)
                        <div class="flex justify-center mt-1 mb-3">
                            {{ $challenge->user->name }} さん
                        </div>
                    @else
                        <div class="flex justify-center mt-1 mb-3">
                            Ny アバター
                        </div>
                    @endif
                    <div class="flex justify-center mt-1">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div>
                                <img width="200px" height="200px" src="/images/{{ $avatorImage->image_path }}" alt=""
                                    class="rounded-full object-cover mr-3">
                                <div class="flex justify-center">
                                    Level : {{ $challenge->user->user_avator->level }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-end mt-1 mb-3">
                        <span>{{ $challenge->goods->count() }} いいね</span>
                    </div>
                    <div class="flex justify-end text-sm">
                        @if (auth()->user()->id != $challenge->user->id)
                            @if (empty($good))
                                <form action="{{ route('challenges.goods.store', $challenge) }}" method="POST">
                                    @csrf
                                    <input type="submit" value="いいね"
                                        class="bg-gradient-to-r from-red-400 to-red-800 hover:bg-gradient-to-l hover:from-red-800 hover:to-red-400 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 w-full sm:w-32 sm:mr-2 mb-2 sm:mb-0">
                                </form>
                            @else
                                <form action="{{ route('challenges.goods.destroy', [$challenge, $good]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="いいね取り消し"
                                        class="bg-gradient-to-r from-yellow-200 to-yellow-800 hover:bg-gradient-to-l hover:from-yellowe-800 hover:to-yellow-200 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 w-full sm:w-32 sm:mr-2 mb-2 sm:mb-0">
                                </form>
                            @endif
                        @endif

                    </div>
                    <h2
                        class="text-center font-bold font-sans break-normal text-white pt-6 pb-1 text-3xl md:text-4xl mb-10">
                        {{ $challenge->title }}
                    </h2>
                    <p class="text-white text-base">{!! nl2br(e($challenge->description)) !!}</p>
                </article>
                <form action="{{ route('challenges.comments.store', $challenge) }}" method="POST"
                    class="rounded pt-3 pb-8 mb-4">
                    @csrf
                    <div class="flex justify-end mb-4">
                        @if (auth()->user()->id == $challenge->user->id)
                            @if ($challenge->close_flg == 0)
                                <input type="submit" value="結果報告"
                                    class="bg-gradient-to-r from-indigo-500 to-blue-600 hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 w-full sm:w-32 sm:mr-2 mb-2 sm:mb-0">
                            @endif
                        @else
                            <input type="submit" value="激励"
                                class="bg-gradient-to-r from-yellow-300 to-yellow-600 hover:bg-gradient-to-l hover:from-yellow-600 hover:to-yellow-300 text-gray-100 p-2 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 w-full sm:w-32 sm:mr-2 mb-2 sm:mb-0">
                        @endif
                    </div>
                    @if ((auth()->user()->id == $challenge->user->id && $challenge->close_flg == 0) || auth()->user()->id != $challenge->user->id)
                        <textarea name="comment" rows="3"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-pink-600 w-full py-2 px-3"
                            required placeholder="コメントを記入">{{ old('comment') }}</textarea>
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
