{{-- <section>
    <x-container>
        <div class="py-12">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($courses as $course)
                    <div class="swiper-slide text-white">
                        <div class="">
                            <a href="#"
                                class="max-w-sm p-9 flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">
                                <div class="flex items-center justify-between">
                                    <div class="">
                                        <h4>/</h4>
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$course->name}}</h5>
                                    </div>
                                    <img src="{{ url ('storage', $course->image) }}" class="size-10" alt="">
                                </div>
                                <p class="font-normal text-gray-700 py-4">{{$course->description}}</p>
                                <div class="flex justify-between items-center">
                                    <span class="px-3 py-1.5 border rounded-full">{{$course->price}} ₽</span>
                                    <span class="px-3 py-0.5 border rounded-full">{{$course->time}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </x-container>
</section> --}}

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<section class="w-full h-full pt-[70px]">
    <x-container>
        <section class="w-full h-full pt-[120px]">
            <x-container>
                <h1 class="h1 text-center text-[38px] font-extrabold mb-[30px]">Наши курсы</h1>

                <!-- Категории -->
                <div class="categories flex justify-center mb-[20px]" id="categories">
                    <ul class="categories-list flex gap-[10px]">
                        @foreach ($brands as $brand)
                        <li class="inline-flex py-2 px-3 hover:bg-slate-200 rounded">
                            <button class="category-link" data-id="{{ $brand->id }}">
                                {{ $brand->name }}
                            </button>
                        </li>
                        @endforeach
                        <li>
                            <button class="category-all inline-flex py-2 px-3 hover:bg-slate-200 rounded" data-id="all">
                                Все курсы
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Статьи -->
                <div class="flex items-center  flex-wrap gap-[20px]  " id="articles">
                    @foreach ($courses as $course)

                    @endforeach
                </div>
            </x-container>
        </section>

        <script>
            $(document).ready(function() {
            // Загружаем статьи по умолчанию (при загрузке страницы)
            loadArticles();

            // Обработчик кликов по категориям
            $(document).on('click', '.category-link', function(e) {
                e.preventDefault();
                const brandId = $(this).data('id'); // Получаем ID категории
                loadArticles(brandId); // Загружаем статьи для выбранной категории
            });
            $(document).on('click', '.category-all', function(e) {
                e.preventDefault();

                loadArticles(); // Загружаем статьи для выбранной категории
            });

            // Функция для загрузки статей
            function loadArticles(brandId = null) {
                const url = brandId ? '{{ url("/") }}' + `/courses/brand/${brandId}` : '{{ url("/") }}';

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        $('#articles').html(response.courses); // Вставляем статьи в блок
                    }
                });
            }
        });
        </script>
@endif --}}
