<div class="container text-center">
    <div class="grid grid-cols-3 gap-3">
        @foreach ($courses as $course)
        <div class="col border rounded-xl p-1">
            <x-card.cource :course="$course" />
        </div>
        @endforeach
    </div>
    <p class="text-black text-9xl">aaaaaa</p>
</div>
