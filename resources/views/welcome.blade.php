<x-guest-layout>
    <div class="relative min-h-screen flex ">
        <div
            class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <div class="h-full flex flex-auto bg-purple-900 text-white bg-no-repeat bg-cover relative bg-image">
                <div
                    class="w-4/5 flex flex-auto flex-col md:flex-row items-center justify-center p-10 xl:p-32 overflow-hidden">
                    <div class="absolute bg-gradient-to-b from-indigo-900 to-black opacity-75 inset-0 z-0"></div>
                    <div class="w-4/5 z-10">
                        <h2 class="text-xl xl:text-3xl italic mb-6">チャレンジ・クエスト</h2>
                        <div class="text-5xl sm:text-6xl xl:text-8xl font-bold leading-tight mb-6">
                            挑戦を、楽しむ
                        </div>
                        <div class="sm:text-sm xl:text-md text-gray-200 font-normal">
                            チャレンジ・クエストは、挑戦し、成長し、楽しむことを、全力で応援します。</div>
                    </div>
                    <div
                        class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-2/5 p-8 md:p-10 lg:p-14 sm:rounded-lg md:rounded-none relative z-11">
                        <div class="max-w-md w-full space-y-8">
                            <div class="text-center text-white">
                                <h3 class="mt-6 text-2xl font-bold mb-6">
                                    ログインはこちら
                                </h3>
                                <div>
                                    <a href="{{ route('login') }}"
                                        class="w-full flex justify-center bg-gradient-to-r from-indigo-500 to-blue-600 hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">Sign
                                        in</a>
                                </div>
                                <p class="flex flex-col items-center justify-center mt-10 text-center text-md">
                                    <span>Don't have an account?</span>
                                    <a href="{{ route('register') }}"
                                        class="hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Sign
                                        up</a>
                                </p>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="h-px w-full bg-gray-200"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
