<x-container>
    <div class="text-gray-600 pt-8 pb-10" id="reviews">
        <div class="mx-auto px-6 md:px-12 xl:px-6">
            <div class="mb-10 space-y-4 px-6 md:px-0">
                <h2 class="text-center text-2xl font-bold text-gray-800 md:text-4xl">
                    Отзывы
                </h2>
            </div>

            <!-- Используем CSS Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                @foreach ($reviews->where('is_verified', true) as $review)
                <div class="aspect-auto p-8 border border-gray-100 rounded-3xl bg-white shadow-2xl shadow-gray-600/10 h-full">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            @if ($review->photo)
                            <img src="{{ asset('storage/' . $review->photo) }}" alt="Review Photo"
                                class="w-12 h-12 rounded-full" width="400" height="400" loading="lazy">
                            @else
                            <i class="w-12 h-12 text-[36px] ri-map-pin-user-fill"></i>
                            @endif
                            <div class="">
                                <h6 class="text-lg font-medium text-gray-700">{{ $review->user }}</h6>
                                <p class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="mt-8">{{ $review->content }}</p>


                    </div>
                </div>
                @endforeach
            </div>

            @auth
            <div class="mt-4">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="max-w-sm mx-auto" action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea name="user" rows="4"
                            class="form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Напишите вашe имя"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="content" rows="4"
                            class="form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Напишите ваш отзыв"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="photo">Загрузите фото</label>
                        <input type="file" name="photo" id="photo"
                            class="form-control block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                    <button type="submit" class="mt-2 py-2 px-4 mx-auto bg-blue-500 text-white rounded-lg hover:bg-blue-600">Отправить</button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</x-container>
