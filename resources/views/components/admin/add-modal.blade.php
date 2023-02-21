<div class="absolute left-0 top-0 bg-gray-900/[0.70] z-10 w-screen h-screen" x-show="isModalOpen" x-cloak x-transition>
    <div class="absolute z-10 w-full max-w-lg p-10 translate-x-1/2 translate-y-1/2 bg-gray-200 shadow-lg right-1/2 bottom-1/2">
        <div class="relative">
            {{-- modal header --}}
            <div class="mb-5">
                <x-typography.h2 class="mb-3 text-start">{{ $title }}</x-typography.h2>
                <button @click="isModalOpen=false" class="absolute top-0 right-0 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.24" height="25.24" viewBox="0 0 25.24 25.24"> <path d="M462.5,57.4l-1.142-1.142L449.878,67.736,438.4,56.258,437.258,57.4l11.478,11.478L437.258,80.356,438.4,81.5,449.878,70.02,461.356,81.5l1.142-1.142L451.02,68.878Z" transform="translate(-437.258 -56.258)" opacity="0.67" /> </svg>
                </button>
                <x-shape.line />
            </div>

            {{-- modal body --}}
            <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col w-full gap-4">
                    {{ $slot }}
                </div>
            </form>
        </div>
    </div>
</div>
