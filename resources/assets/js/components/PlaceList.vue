<style></style>

<template>
    <div class="place-list-component bg-dit-red py-8">
        <place-card v-for="place in places" :place="place" :key="place.id"></place-card>
    </div>
</template>

<script type="text/babel">
    import PlaceCard from './PlaceCard.vue';

    export default {

        components: {PlaceCard},

        computed: {
            places() {
                return this.$store.getters.filteredPlaces.sort((a,b) => a.distance - b.distance);
            },
        },

        mounted() {
            this.$parent.menuOpen = false;
        }
    }
</script>