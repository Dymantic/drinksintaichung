<template>
    <div class="relative">
        <div class="map w-full"
             ref="mapbox"
        ></div>
        <div class="absolute place-card p-4 pin-b pin-l pin-r bg-white"
             :class="{'show': shown_place.id}">
            <div class="flex justify-between items-center mb-4">
                <router-link class="no-underline" :to="`/places/${shown_place.id}`">
                        <p class="text-red-dark text-lg font-bold">{{ shown_place.name }}</p>
                </router-link>
                <p @click="resetMap" class="text-right text-4xl font-bold text-red">&times;</p>
            </div>
            <p class="text-sm text-grey">{{ shown_place.address }}</p>
            <div class="border-grey-light border-t mt-4 pt-4">
            <span class="px-2"
                  v-for="(feature, index) in feature_list"
                  :key="`f_key_${index}`"
                  v-if="shown_place.features[feature.icon_name]">
                <span v-html="feature.icon"
                      class="h-1"></span>
            </span>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {

        data() {
            return {
                map: null,
                markers: [],
                shown_place: {id: null, name: '', address: '', features: []},
                default_center: {lat: 24.1333, lng: 120.6555},
                default_zoom: 13,
            };
        },

        computed: {
            selected_places() {
                return this.$store.getters.filteredPlaces;
            },

            maps_loaded() {
                return this.$store.getters.is_loaded;
            },

            feature_list() {
                return this.$store.getters.filterList;
            }

        },

        watch: {
            selected_places(places) {
                if (places.length) {
                    this.setMarkers();
                }
            },

            maps_loaded(is_loaded) {
                if (is_loaded && this.map === null) {
                    this.init();
                }
            }
        },

        mounted() {
            this.$parent.menuOpen = false;
            if (this.maps_loaded) {
                this.init();
            }
        },

        methods: {
            init() {
                this.map = new google.maps.Map(this.$refs.mapbox, {
                    zoom: this.default_zoom,
                    center: this.default_center,
                    mapTypeControl: false,
                    panControl: false,
                    zoomControl: false,
                    streetViewControl: false
                });

                this.setMarkers();

            },

            setMarkers() {
                const markers = this.selected_places.forEach(place => {
                    let marker = new google.maps.Marker({
                        map: this.map,
                        position: place.latLng()
                    });
                    marker.addListener('click', () => this.showPlace(place));
                });
            },

            showPlace(place) {
                this.map.panTo(place.latLng());
                this.map.setZoom(15);

                this.shown_place = place;
            },

            resetMap() {
                this.shown_place = {id: null, name: '', address: '', features: []};
                this.map.setZoom(this.default_zoom);
                this.map.panTo(this.default_center);
            }
        }


    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

    .map {
        height: calc(100vh - 4rem);
    }

    .place-card {
        transition: .4s;
        transform: scale(0);
        transform-origin: right bottom;

        &.show {
            transform: scale(1);
        }
    }
</style>