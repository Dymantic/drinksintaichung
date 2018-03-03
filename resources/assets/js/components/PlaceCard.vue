<template>
    <div class="w-9/10 bg-dit-cream mx-auto  my-4 p-4 leading-normal rounded-xl">
        <div class="flex justify-between">
            <router-link :to="`/places/${place.id}`" class="no-underline">
                <p class="font-bold mb-3 text-dit-red leading-tight text-2xl">{{ place.name }}</p>
            </router-link>
            <p class="text-sm text-grey">{{ formattedDistance(place.distance) }}</p>
        </div>
        <p class="text-black text-xs">{{ place.description }}</p>
        <p class="text-xs mb-1 mt-2 text-dit-red">Address:</p>
        <p class="text-black text-xs">
            {{ place.address }}<br>{{ place.zh_address }}
        </p>
        <p class="text-xs mb-1 mt-4 text-dit-red">Features:</p>
        <div class="">
            <span class="px-2 text-dit-red"
                  v-for="(feature, index) in feature_list"
                  :key="`f_key_${index}`"
                  v-if="place.features[feature.icon_name]">
                <span v-html="feature.icon" class=""></span>
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