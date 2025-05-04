@foreach ($courses as $course)

<div class="text-white">
    <div class="">
        <a href="#"
            class=" relative max-w-sm px-9 pb-2 text-black flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">
            <div class="flex flex-col pt-3">

                <div class="items-center justify-between pt-1">
                    <div class="">
                        <h5 class="mb-2 text-center text-sm font-bold tracking-tight text-gray-900">
                            {{$course->name}}</h5>
                    </div>
                    <img src="{{ url ('storage', $course->image) }}" class="size-100 rounded" alt="">
                </div>
            </div>
            <p class="font-normal text-center text-gray-700 py-4">{{Str::limit($course->description, 23, ('...'))}}</p>


        </a>
    </div>
</div>
@endforeach
