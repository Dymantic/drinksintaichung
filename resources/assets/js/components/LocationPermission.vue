<template>
    <span>
        <modal :show="getLocationPermission">
            <div slot="body"
                 class="flex flex-col justify-center items-center px-4 py-8">
                <p class="text-2xl font-bold text-dit-red mb-8">Share your location?</p>
                <p class="text-grey-dark text-xs mb-8 leading-normal">
                    Hey there, and welcome! We just need to ask you this once: Can you share your location with us? It allows us to show you distances and sort place by their proximity to yo. It's safe, and we don't share with anyone. Promise.
                </p>
                <div class="flex justify-between w-9/10">
                    <button @click="handleLocationDenied"
                            class="bg-grey text-dit-cream font-bold text-xs px-4 py-2 rounded shadow">No, sorry!</button>
                    <button @click="handleLocationGranted"
                            class="bg-dit-red text-dit-cream font-bold text-xs px-4 py-2 rounded shadow">Sure!</button>
                </div>
        </div>
        </modal>
    </span>
</template>

<script type="text/babel">
    export default {

        props: ['get-location-permission'],

        methods: {
            handleLocationGranted() {
                this.$store.dispatch('watchUserPosition');
                this.$emit('permission-done');
            },

            handleLocationDenied() {
                this.$store.commit('set_location_permission_denied');
                this.$emit('permission-done');
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>