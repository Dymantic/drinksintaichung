<style></style>

<template>
    <div class="filter-component">
        <p class="my-4 text-red-dark text-center text-lg">Select your preferences...</p>
        <p class="my-4 text-grey text-center">The more you select, the fewer places you see.</p>
        <div class="flex flex-wrap">
            <div v-for="filter in filters" class="radio-component w-1/3 flex flex-col items-center my-4">
                <input :id="filter.id" type="checkbox" :checked="isOn(filter.id)" @change="toggleFilter(filter.id)">
                <label :for="filter.id" class="w-9/10 bg-white p-3 flex flex-col min-h-full items-center text-red-dark">
                    <span v-html="filter.icon"></span>
                    <span class="uppercase text-center text-sm text-grey my-2">{{ filter.name }}</span>
                </label>
            </div>
        </div>
        <router-link to="/list" class="bg-red-dark text-white p-4 font-bold text-lg uppercase no-underline block mx-auto w-9/10 text-center my-4">
            See List
        </router-link>
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