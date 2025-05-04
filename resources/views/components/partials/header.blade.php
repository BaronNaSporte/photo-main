<header class="bg-white shadow-lg py-4 sticky top-0 z-50">
    <div class="container mx-auto flex items-center justify-between px-4">
        <!-- Logo -->
        <a href="#" class="flex items-center text-primary gap-2 hover:text-secondary">
            <img src="{{url ('storage', $setting->logo)}}" alt="Лого сайта" class="size-8 rounded">
            <span class="text-2xl font-bold">{{$setting->name}}</span>
        </a>

        <!-- Mobile Menu Button (Hidden on larger screens) -->
        <div class="md:hidden">
            <button id="menu-toggle"
                class="text-gray-800 hover:text-primary focus:outline-none transition-colors duration-300">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation (Hidden on smaller screens) -->
    <div class="container mx-auto px-4 py-6 flex justify-between items-center pl-120">
        <nav class="hidden md:block">
            <ul class="flex space-x-8">
                <li><a href="/" class="duration-200 hover:font-bold hover:text-xl">Главная</a></li>
                <li><a href="#portfolio" class="duration-200 hover:font-bold hover:text-xl">Портфолио</a></li>
                <li><a href="#reviews" class="duration-200 hover:font-bold hover:text-xl">Отзывы</a></li>
                <li><a href="#footer" class="duration-200 hover:font-bold hover:text-xl ">Контакты</a></li>
            </ul>
        </nav>
    </div>
</header>
<html class="scroll-smooth"></html>


    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <nav id="mobile-menu"
        class="hidden md:hidden bg-gray-50 border-t border-gray-200 transition-height duration-300 ease-in-out">
        <ul class="px-4 py-2">
            <li><a href="{{route('reviews.index')}}" class="block py-2 hover:text-primary">Главная</a></li>
            <li><a href="#" class="block py-2 hover:text-primary">Чему вы научитесь</a></li>
        </ul>
    </nav>
</header>
<script>
    // Toggle mobile menu
      const menuToggle = document.getElementById('menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');

      menuToggle.addEventListener('click', () => {
          mobileMenu.classList.toggle('hidden');
          if (!mobileMenu.classList.contains('hidden')) {
              mobileMenu.style.height = mobileMenu.scrollHeight + "px"; // Set height for transition
          } else {
              mobileMenu.style.height = "0";
          }
      });

      // Toggle mobile services dropdown
      const servicesDropdownToggle = document.getElementById('services-dropdown-toggle');
      const servicesDropdown = document.getElementById('services-dropdown');

      servicesDropdownToggle.addEventListener('click', () => {
          servicesDropdown.classList.toggle('hidden');
      });
</script>
