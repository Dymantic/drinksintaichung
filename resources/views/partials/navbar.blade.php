<div class="flex justify-between items-center border-b-4 border-dit-dark-red h-14 pl-4">
        <span @click="menuOpen = true" class="text-grey">
            @include('svg.hamburger')
        </span>
    <div class="flex justify-end items-center">
        <router-link to="/list"
                     class="mx-3 text-dit-red"
        >
            @include('svg.browse')
        </router-link>
        <router-link to="/map"
                     class="mx-3 text-dit-red"
        >
            @include('svg.map_marker')
        </router-link>
        <router-link to="/filters"
                     class="mx-3 text-dit-red"
        >
            @include('svg.filter')
        </router-link>
    </div>
</div>