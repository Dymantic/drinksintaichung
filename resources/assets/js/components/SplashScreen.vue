<template>
    <div class="splash-screen-component pt-4 min-h-screen">
        <img src="/images/white_logo.svg"
             class="block w-1/2 mx-auto pt-4"
             alt="Drinks in Taichung logo">
        <p class="text-dit-cream text-center text-2xl my-4 font-bold">Need a drink?</p>
        <p class="text-dit-cream mt-4 text-xs text-center">Select the way you'd like to find a drinking spot</p>
        <div class="py-4">
            <router-link to="/filters"
                         class="block py-3 no-underline text-dit-red w-3/5 mx-auto my-4 bg-dit-cream flex flex-col items-center shadow rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 64 64"
                     height="30px">
                    <path d="M60,28H41a4,4,0,0,0-4-4H27a4,4,0,0,0-4,4H4a4,4,0,0,0,0,8H23a4,4,0,0,0,4,4H37a4,4,0,0,0,4-4H60a4,4,0,0,0,0-8Z"/>
                    <path d="M4,12H36a4,4,0,0,0,4,4H50a4,4,0,0,0,4-4h6a4,4,0,0,0,0-8H54a4,4,0,0,0-4-4H40a4,4,0,0,0-4,4H4a4,4,0,0,0,0,8Z"/>
                    <path d="M60,52H28a4,4,0,0,0-4-4H14a4,4,0,0,0-4,4H4a4,4,0,0,0,0,8h6a4,4,0,0,0,4,4H24a4,4,0,0,0,4-4H60a4,4,0,0,0,0-8Z"/>
                </svg>
                <p class="text-xs font-bold mg-0 pt-2">Use filters</p>
            </router-link>
            <router-link to="/map"
                         class="block py-3 no-underline text-dit-red w-3/5 mx-auto my-4 bg-dit-cream flex flex-col items-center shadow rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 51.66 63.66"
                     height="30px">
                    <path d="M25.83,15.83a9,9,0,1,0,9,9A9,9,0,0,0,25.83,15.83Zm0,12a3,3,0,1,1,3-3A3,3,0,0,1,25.83,27.83Z"/>
                    <path d="M25.83,0C11.59,0,0,12.48,0,27.83,0,47.7,22.8,62.44,23.77,63.06a3.84,3.84,0,0,0,4.12,0c1-.62,23.77-15.36,23.77-35.23C51.66,12.48,40.07,0,25.83,0Zm0,55.16a65.37,65.37,0,0,1-8.23-7.23c-4.54-4.74-9.94-12.07-9.94-20.1,0-11.12,8.15-20.17,18.17-20.17S44,16.71,44,27.83C44,40.46,31,51.35,25.83,55.16Z"/>
                </svg>
                <p class="text-xs font-bold mg-0 pt-2">See map</p>
            </router-link>
            <router-link to="/list"
                         class="block py-3 no-underline text-dit-red w-3/5 mx-auto my-4 bg-dit-cream flex flex-col items-center shadow rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 64 64" height="30px">
                            <path d="M60,24H58V16a4,4,0,0,0-4-4H52V4a4,4,0,0,0-4-4H4A4,4,0,0,0,0,4V36a4,4,0,0,0,4,4H6v8a4,4,0,0,0,4,4h2v8a4,4,0,0,0,4,4H60a4,4,0,0,0,4-4V28A4,4,0,0,0,60,24ZM14,40H48a4,4,0,0,0,2-.55V44H14ZM44,12V32H8V8H44ZM56,56H20V52H54a4,4,0,0,0,2-.55Z"/>
                            <path d="M14,18H36a4,4,0,0,0,0-8H14a4,4,0,0,0,0,8Z"/>
                            <path d="M12.05,27.47A3.93,3.93,0,0,0,14,28H28a4,4,0,0,0,0-8H14a4,4,0,0,0-1.95,7.47Z"/>
                </svg>
                <p class="text-xs font-bold mg-0 pt-2">Browse All</p>
            </router-link>
        </div>
        <router-link class="text-dit-cream text-xs pb-8 text-center no-underline block" to="/about">About Drinks in Taichung</router-link>
    </div>
</template>

<script type="text/babel">
    export default {

        mounted() {
            this.$parent.menuOpen = false;
        }
    }
</script>

<style scoped lang="scss" type="text/css">
    .splash-screen-component {
        background-image: url(/images/taichung_bg.jpg);
        background-size: cover;
        background-position: center;
    }
</style>