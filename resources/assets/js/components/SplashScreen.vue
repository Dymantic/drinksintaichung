<style></style>

<template>
    <div class="splash-screen-component bg-red pb-7 min-h-screen">
        <img src="/images/drinks_in_taichung_logo_2.png" class="block w-3/5 mx-auto py-4" alt="Drinks in Taichung logo">
        <p class="text-white text-center text-lg my-4">I need a drink...</p>
        <p class="text-white my-4 text-sm text-center">Find a suitable drinking hole with the options below.</p>
        <router-link to="/filters" class="block wcon-70-400 mg-x-a flex-col flex-center-y bd-col-light bd-3 pd-3 mg-y-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52.41 55.06" height="30px">
                <path fill="#ffffff"
                      d="M7.28,10.61V2.5a2.5,2.5,0,0,0-5,0v8.11A2.42,2.42,0,0,0,0,13v4.69a2.42,2.42,0,0,0,2.28,2.42V52.56a2.5,2.5,0,0,0,5,0V20.13a2.42,2.42,0,0,0,2.28-2.42V13A2.42,2.42,0,0,0,7.28,10.61Z"/>
                <path fill="#ffffff"
                      d="M28.71,22.76V2.5a2.5,2.5,0,0,0-5,0V22.76a2.42,2.42,0,0,0-2.28,2.42v4.69a2.42,2.42,0,0,0,2.28,2.42V52.56a2.5,2.5,0,0,0,5,0V32.29A2.42,2.42,0,0,0,31,29.87V25.18A2.42,2.42,0,0,0,28.71,22.76Z"/>
                <path fill="#ffffff"
                      d="M50.14,34.22V2.5a2.5,2.5,0,0,0-5,0V34.22a2.42,2.42,0,0,0-2.28,2.42v4.69a2.42,2.42,0,0,0,2.28,2.42v8.81a2.5,2.5,0,0,0,5,0V43.74a2.42,2.42,0,0,0,2.28-2.42V36.63A2.42,2.42,0,0,0,50.14,34.22Z"/>
            </svg>
            <p class="text-colour-light mg-0 pt-2">Choose Preferences</p>
        </router-link>
        <router-link to="/list" class="block wcon-70-400 mg-x-a flex-col flex-center-y bd-col-light bd-3 pd-3 mg-y-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76.57 76.57" height="30px">
                <path fill="#ffffff"
                      d="M38.29,0A38.29,38.29,0,1,0,76.57,38.29,38.33,38.33,0,0,0,38.29,0Zm0,71.57A33.29,33.29,0,1,1,71.57,38.29,33.32,33.32,0,0,1,38.29,71.57Z"/>
                <path fill="#ffffff"
                      d="M48.17,24.15,34.09,33.59a2.49,2.49,0,0,0-.77.83L24.85,49.1a2.5,2.5,0,0,0,3.56,3.33L42.48,43a2.49,2.49,0,0,0,.77-.83l8.47-14.68a2.5,2.5,0,0,0-3.56-3.33Zm-9,15-4.65,3.12,2.8-4.85L42,34.3Z"/>
                <path fill="#ffffff"
                      d="M68.33,38.24a29.94,29.94,0,0,0-8.72-21.09L59.5,17l-.15-.12A29.94,29.94,0,0,0,38.29,8.24h0A30,30,0,0,0,17.15,17l-.13.11s-.08.1-.12.15A29.94,29.94,0,0,0,8.24,38.29v0h0A30,30,0,0,0,17,59.43l.1.13.15.12a29.94,29.94,0,0,0,21.07,8.65h0a30,30,0,0,0,21.09-8.72l.13-.11s.08-.1.12-.15a29.94,29.94,0,0,0,8.65-21.07v0h0Zm-7.28,2.51h2.16A24.92,24.92,0,0,1,57.69,54.1l-1.51-1.51a2.5,2.5,0,0,0-3.54,3.54l1.52,1.52A24.93,24.93,0,0,1,40.82,63.2V61.05a2.5,2.5,0,0,0-5,0v2.16a24.92,24.92,0,0,1-13.35-5.52L24,56.18a2.5,2.5,0,0,0-3.54-3.54l-1.52,1.52a24.93,24.93,0,0,1-5.56-13.34h2.15a2.5,2.5,0,0,0,0-5H13.37a24.93,24.93,0,0,1,5.52-13.35L20.4,24a2.5,2.5,0,0,0,3.54-3.54l-1.52-1.52a24.93,24.93,0,0,1,13.33-5.56v2.15a2.5,2.5,0,0,0,5,0V13.37A24.93,24.93,0,0,1,54.1,18.89L52.59,20.4a2.5,2.5,0,1,0,3.54,3.54l1.52-1.52A24.93,24.93,0,0,1,63.2,35.75H61.05a2.5,2.5,0,0,0,0,5Z"/>
            </svg>
            <p class="text-colour-light mg-0 pt-2">Places near you</p>
        </router-link>
        <router-link to="/list" class="block wcon-70-400 mg-x-a flex-col flex-center-y bd-col-light bd-3 pd-3 mg-y-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.09 47.8" height="30px">
                <path fill="#ffffff"
                      d="M59.59,14.23H55V9.64a2.5,2.5,0,0,0-2.5-2.5H47.86V2.5A2.5,2.5,0,0,0,45.36,0H2.5A2.5,2.5,0,0,0,0,2.5V31.07a2.5,2.5,0,0,0,2.5,2.5H7.14v4.64a2.5,2.5,0,0,0,2.5,2.5h4.59V45.3a2.5,2.5,0,0,0,2.5,2.5H59.59a2.5,2.5,0,0,0,2.5-2.5V16.73A2.5,2.5,0,0,0,59.59,14.23ZM57.09,42.8H19.23V40.71H52.5a2.5,2.5,0,0,0,2.5-2.5v-19h2.09ZM5,5H42.86V28.57H5Zm7.14,28.57H45.36a2.5,2.5,0,0,0,2.5-2.5V12.14H50V35.71H12.14Z"/>
                <path fill="#ffffff"
                      d="M9.19,12.14H35.63a2.5,2.5,0,0,0,2.5-2.5h0a2.5,2.5,0,0,0-2.5-2.5H9.19a2.5,2.5,0,0,0,0,5Z"/>
                <path fill="#ffffff"
                      d="M9.19,19.29h16.2a2.51,2.51,0,0,0,2.5-2.5s0,0,0-.06a2.5,2.5,0,0,0-2.49-2.44H9.19a2.5,2.5,0,0,0,0,5Z"/>
                <path fill="#ffffff" d="M9.19,26.43h16.2a2.5,2.5,0,0,0,0-5H9.19a2.5,2.5,0,0,0,0,5Z"/>
            </svg>
            <p class="text-colour-light mg-0 pt-2">Browse All</p>
        </router-link>
    </div>
</template>

<script type="text/babel">
    export default {
        mounted() {
            this.$parent.menuOpen = false;
        }
    }
</script>