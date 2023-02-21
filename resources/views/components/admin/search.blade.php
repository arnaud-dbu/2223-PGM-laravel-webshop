<form class="relative max-w-4xl">
    <input class="px-4 pl-12 bg-white shadow w-96 h-14" placeholder="SEARCH..." type="text" name="search" value={{$search}}>
    <svg class="absolute w-5 -translate-y-1/2 top-7 left-4 opacity-40" xmlns="http://www.w3.org/2000/svg" width="31.401" height="33" viewBox="0 0 31.401 33"> <g transform="translate(-54.18 -49.301)" opacity="0.68"> <path d="M76.573,71.787a13.146,13.146,0,1,0-1.636,1.377L84.074,82.3l1.507-1.507ZM56.312,62.448A11.015,11.015,0,1,1,67.328,73.464,11.027,11.027,0,0,1,56.312,62.448Z" transform="translate(0 0)" /> </g> </svg>
    @if ($search)
        <a href="{{route('admin.dashboard', $path)}}">
            <svg class="absolute w-5 -translate-y-1/2 opacity-40 right-4 top-1/2" xmlns="http://www.w3.org/2000/svg" width="25.24" height="25.24" viewBox="0 0 25.24 25.24"><path d="M462.5,57.4l-1.142-1.142L449.878,67.736,438.4,56.258,437.258,57.4l11.478,11.478L437.258,80.356,438.4,81.5,449.878,70.02,461.356,81.5l1.142-1.142L451.02,68.878Z" transform="translate(-437.258 -56.258)" opacity="0.67"/></svg>
        </a>
    @endif
</form>