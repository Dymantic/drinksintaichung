<template>
    <div class="p-4">
        <div class="p-4 my-4">
            <p class="text-dit-red text-2xl mb-1 font-bold">{{ place.name }}</p>
            <p class="text-black leading-normal text-xs">{{ place.description }}</p>
        </div>
        <div class="p-4 bg-white my-4">
            <p class="text-dit-red text-xs font-bold">Address:</p>
            <p class="text-black text-xs my-3">{{ place.address }}</p>
            <p class="text-black text-xs my-3">{{ place.zh_address }}</p>
            <div class="text-right mt-6">
                <span class="text-red-dark uppercase border border-red-dark p-2 text-sm">Show taxi driver</span>
            </div>
        </div>
        <div class="p-4 bg-white my-4">
            <p class="text-red-dark uppercase text-sm font-bold">What they got:</p>
            <div class="my-2 flex items-center"
                  v-for="(feature, index) in feature_list"
                  :key="`f_key_${index}`"
                  v-if="place.features[feature.icon_name]">
                <span v-html="feature.icon"
                      class="w-8"></span>
                <span class="ml-3 capitalize">{{ feature.name }}</span>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {

        props: ['id'],

        computed: {
            place() {
                return this.$store.getters.placeById(this.id) || {features: {}};
            },

            feature_list() {
                return this.$store.getters.filterList;
            }
        },

        mounted() {
            this.$parent.menuOpen = false;
        }
    }
</script>

<style scoped lang="scss" type="text/scss">

</style>