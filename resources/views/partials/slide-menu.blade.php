<div class="h-screen w-full bg-dit-red z-50 slide-menu-tray fixed"
     :class="{'open': menuOpen}">
        <span @click="menuOpen = false"
              class="h-14 bg-white flex justify-end items-center text-3xl font-bold pr-4 text-grey border-b-4 border-dit-dark-red">&times</span>
    <ul class="list-reset">
        <li class="border-b border-dit-cream flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-xl text-dit-cream" to="/">Home</router-link></li>
        <li class="border-b border-dit-cream flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-xl text-dit-cream" to="/map">Find a drink...</router-link></li>
        <li class="border-b border-dit-cream bg-dit-dark-red flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-xl text-dit-cream" to="/filters">Use Filters</router-link></li>
        <li class="border-b border-dit-cream bg-dit-dark-red flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-xl text-dit-cream" to="/map">See map</router-link></li>
        <li class="border-b border-dit-cream bg-dit-dark-red flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-xl text-dit-cream" to="/list">Browse all</router-link></li>
        <li class="border-b border-dit-cream flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-xl text-dit-cream" to="/request-establishment">Add your Establishment</router-link></li>
        <li class="border-b border-dit-cream flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-xl text-dit-cream" to="/about">About Drinks in Taichung</router-link></li>
        <li class="border-b border-dit-cream flex justify-center items-center border-b-2 border-w w-full h-12"><a class="no-underline text-xl text-dit-cream" href="#">Contact the Creators</a></li>
    </ul>
    <p class="text-dit-cream text-xs text-center my-8">Tell your friends about this awesome website:</p>
    <div class="flex justify-center">
        <span class="text-white mx-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.15 46.2" height="24px">
                <path d="M24.1,0H16.51S6-.92,6,10.16v5.92H0l0,6H6L6,46.2h8V22.09h7.88l2.29-6H14V11S14,8.11,17.36,8.11H24Z"/>
            </svg>
        </span>
        <span class="text-white mx-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.25 44.09" height="24px">
                <path d="M54.25,5.22A22.28,22.28,0,0,1,47.85,7,11.18,11.18,0,0,0,52.75.81a22.38,22.38,0,0,1-7.07,2.7,11.14,11.14,0,0,0-19,10.15A31.62,31.62,0,0,1,3.77,2,11.14,11.14,0,0,0,7.22,16.9a11.09,11.09,0,0,1-5-1.4s0,0.09,0,.14a11.14,11.14,0,0,0,8.93,10.91,11.14,11.14,0,0,1-2.93.39,10.93,10.93,0,0,1-2.09-.2,11.13,11.13,0,0,0,10.4,7.73A22.32,22.32,0,0,1,2.65,39.24,21.89,21.89,0,0,1,0,39.08a31.49,31.49,0,0,0,17.06,5c20.47,0,31.67-17,31.67-31.67,0-.48,0-1,0-1.44A22.65,22.65,0,0,0,54.25,5.22Z"/>
            </svg>
        </span>
        <span class="text-white mx-4">
            <svg xmlns="http://www.w3.org/2000/svg"
                 height="24px"
                 viewBox="0 0 37.69 26.89">
                <path d="M35.49,0H1.7A1.7,1.7,0,0,0,0,1.7V25.19a1.7,1.7,0,0,0,1.7,1.7H36a1.7,1.7,0,0,0,1.7-1.7V1.7A1.7,1.7,0,0,0,36,0ZM29.74,4.25,19.18,13.12a.53.53,0,0,1-.67,0L8,4.25a.25.25,0,0,1,.15-.44H29.58A.25.25,0,0,1,29.74,4.25Zm-25.93,18v-16a.25.25,0,0,1,.41-.19l13.4,11.26a1.89,1.89,0,0,0,2.45,0L33.47,6.09a.25.25,0,0,1,.41.19v16a.79.79,0,0,1-.79.79H4.61A.79.79,0,0,1,3.81,22.29Z"></path>
            </svg>
        </span>
    </div>
</div>