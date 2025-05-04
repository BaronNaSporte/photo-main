<section class="w-full h-full pt-[60px]" id="portfolio">
    <x-container>
        <h1 class="h1 text-center text-[38px] font-extrabold mb-[30px]">Портфолио</h1>

        <!-- Категории -->
        <div class="categories flex justify-center mb-[20px]" id="categories">
            <ul class="categories-list flex gap-[10px]">
                @foreach ($brands as $brand)
                <li class="inline-flex hover:bg-slate-200 rounded">
                    <button data-id="{{ $brand->id }}"
                        class='category-link group relative z-10 h-12 w-32 cursor-pointer overflow-hidden rounded-md border-none bg-black p-2 text-xl font-bold text-white'>
                        Категория
                        <span
                            class='absolute -left-2 -top-8 h-32 w-36 origin-right rotate-12 scale-x-0 transform bg-sky-200 transition-transform duration-1000 group-hover:scale-x-100 group-hover:duration-500'></span>
                        <span
                            class='absolute -left-2 -top-8 h-32 w-36 origin-right rotate-12 scale-x-0 transform bg-sky-400 transition-transform duration-700 group-hover:scale-x-100 group-hover:duration-700'></span>
                        <span
                            class='absolute -left-2 -top-8 h-32 w-36 origin-right rotate-12 scale-x-0 transform bg-sky-600 transition-transform duration-500 group-hover:scale-x-100 group-hover:duration-1000'></span>
                        <span
                            class='absolute left-1 top-2.5 z-10 opacity-0 duration-100 group-hover:opacity-100 group-hover:duration-1000'>
                            {{ $brand->name }}
                        </span>
                    </button>
                </li>
                @endforeach
                <li>
                    <button data-id="all"
                        class='group relative z-10 h-12 w-32 cursor-pointer overflow-hidden rounded-md border-none bg-black p-2 text-xl font-bold text-white'>
                    Все работы
                        <span
                            class='absolute -left-2 -top-8 h-32 w-36 origin-right rotate-12 scale-x-0 transform bg-sky-200 transition-transform duration-1000 group-hover:scale-x-100 group-hover:duration-500'></span>
                        <span
                            class='absolute -left-2 -top-8 h-32 w-36 origin-right rotate-12 scale-x-0 transform bg-sky-400 transition-transform duration-700 group-hover:scale-x-100 group-hover:duration-700'></span>
                        <span
                            class='absolute -left-2 -top-8 h-32 w-36 origin-right rotate-12 scale-x-0 transform bg-sky-600 transition-transform duration-500 group-hover:scale-x-100 group-hover:duration-1000'></span>
                        <span
                            class='absolute left-1 top-2.5 z-10 opacity-0 duration-100 group-hover:opacity-100 group-hover:duration-1000'>
                            Все работы
                        </span>
                    </button>
                </li>
            </ul>
        </div>


        <!-- Статьи -->
        <div class="py-6">
            <div class="md:grid xl:grid-cols-3 md:grid-cols-2 flex flex-col justify-center gap-5 items-center"
                id="articles">
                @foreach ($courses as $course)

                @endforeach
            </div>
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
