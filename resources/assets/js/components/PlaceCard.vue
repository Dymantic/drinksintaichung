<template>
    <div class="w-9/10 bg-white mx-auto  my-4 p-4">
        <div class="flex justify-between">
            <router-link :to="`/places/${place.id}`" class="no-underline">
                <p class="font-bold mb-3 text-red text-lg">{{ place.name }}</p>
            </router-link>
            <p class="text-sm text-grey">{{ formattedDistance(place.distance) }}</p>
        </div>
        <p class="text-grey">{{ place.description }}</p>
        <p class="font-bold mb-1 mt-2 text-sm text-red-dark">Address:</p>
        <p class="text-grey text-sm">
            {{ place.address }}<br>{{ place.zh_address }}
        </p>
        <div class="border-grey-light border-t mt-4 pt-4">
            <span class="px-2"
                  v-for="(feature, index) in feature_list"
                  :key="`f_key_${index}`"
                  v-if="place.features[feature.icon_name]">
                <span v-html="feature.icon" class="h-1"></span>
            </span>
        </div>

    </div>
</template>

<script type="text/babel">

    export default {
        props: ['place'],

        computed: {
            feature_list() {
                return this.$store.getters.filterList;
            },
        },

        methods: {
            formattedDistance(distance) {
                if(isNaN(distance) || distance === null) {
                    return '';
                }
                if(distance > 1000 && distance < 5000 ) {
                    return `${(distance/1000).toFixed(1)}km`;
                }
                if(distance / 1000 > 1) {
                    return `${Math.round(distance/1000)}km`;
                }
                return `${distance}m`;
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>