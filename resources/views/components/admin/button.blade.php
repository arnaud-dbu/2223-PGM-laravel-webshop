<button class="shadow flex items-center gap-2 uppercase text-center font-lig font-secondary text-lg bg-gray-900 text-gray-50 px-7 h-14"
    @click="isModalOpen=true">
    <svg xmlns="http://www.w3.org/2000/svg" width="13.994" height="13.994" viewBox="0 0 13.994 13.994"> <path class="fill-white" d="M50.455,49.539V43h-.915v6.539H43v.915h6.539v6.539h.915V50.455h6.539v-.915Z" transform="translate(-43 -43)" fill="#707070" /> </svg>
    {{$slot}}
</button>
