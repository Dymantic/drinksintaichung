<template>
    <div class="filter-component pt-8">
        <p class="my-4 text-dit-red text-center text-2xl font-bold">Select your preferences</p>
        <p class="my-4 px-8 text-black text-center leading-normal text-xs">The more you choose, the more refined your choices will be. Locations will update as you select or deselect preferences.</p>

        <div class="flex flex-wrap">
            <div v-for="filter in filters" class="radio-component w-1/3 flex flex-col items-center my-4">
                <input :id="filter.id" type="checkbox" :checked="isOn(filter.id)" @change="toggleFilter(filter.id)">
                <label :for="filter.id" class="w-9/10 p-3 flex flex-col min-h-full justify-between items-center text-red-dark">
                    <span class="svg-span text-dit-red" v-html="filter.icon"></span>
                    <span class="text-center text-xs text-black mb-1">{{ filter.name }}</span>
                    <span class="fake-checkbox w-6 h-6 border-4 border-black text-black rounded"></span>
                </label>

            </div>
        </div>
        <div class="flex justify-around">
            <router-link to="/list" class="bg-dit-red text-dit-cream w-2/5 p-4 font-bold text-xs capitalize shadow rounded-xl no-underline block mx-auto text-center my-4">
                See List
            </router-link>
            <router-link to="/map" class="bg-dit-red text-dit-cream w-2/5 p-4 font-bold text-xs capitalize shadow rounded-xl no-underline block mx-auto text-center my-4">
                See Map
            </router-link>
        </div>

    </div>
</template>

<script type="text/babel">

    export default {

        computed: {
            filters() {
                return this.$store.getters.filterList;
            }
        },

        methods: {
            toggleFilter(filter_id) {
                this.$store.commit(`toggle_filter`, filter_id);
            },

            isOn(filter_id) {
                return this.$store.getters.filterById(filter_id).selected;
            }
        },

        mounted() {
            this.$parent.menuOpen = false;
        }
    }
</script>

<style lang="scss" type="text/css">
    .svg-span svg {
        height: 40px;
    }
</style>