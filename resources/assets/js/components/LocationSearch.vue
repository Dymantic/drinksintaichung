<template>
    <div class="relative">
        <form action=""
              @submit.prevent="searchPlaces"
              class="bg-grey-lightest p-4 absolute pin-t pin-l z-50 mt-2 flex w-1/3">
            <label>
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20"
                     height="20px">+
                    <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                </svg>
            </label>
            <input type="text"
                   v-model="search_term"
                   class="flex-auto ml-2">
        </form>
        <div class="w-full flex justify-between">
            <div class="map w-1/2"
                 ref="map"></div>
            <div class="w-1/2 px-4 results">
                {{ search_results.length }} Results
                <div class="p-3 my-1 bg-white"
                     v-for="place in search_results"
                     :key="place.id"
                >
                    <p class="text-red-dark font-bold mb-3"
                       @click="highlightPlace(place)">{{ place.name }}</p>
                    <p class="text-grey text-sm">{{ place.formatted_address }}</p>
                    <div class="text-right">
                        <button class="text-red-dark uppercase border border-red-dark font-bold p-1 m-3 text-xs"
                                @click="selectPlace(place)">Add it
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script type="text/babel">

    import geolib from "geolib";

    export default {

        props: ['default-center', 'range-radius'],

        data() {
            return {
                default_zoom: 12,
                map: null,
                search_term: '',
                search_results: [],
                markers: [],
            };
        },

        mounted() {
            eventHub.$on('maps-loaded', this.init);
            eventHub.$on('KEY_ESC', this.resetMap);
        },

        methods: {
            init() {
                this.map = new google.maps.Map(this.$refs.map, {
                    center: this.defaultCenter,
                    zoom: this.default_zoom
                });
            },

            resetMap() {
                this.map.panTo(this.defaultCenter);
                this.map.setZoom(this.default_zoom);
            },

            searchPlaces() {
                const service = new google.maps.places.PlacesService(this.map);
                const request = {
                    query: this.search_term,
                    location: this.defaultCenter,
                    radius: this.rangeRadius
                };
                service.textSearch(request, this.receivePlaces);
            },

            receivePlaces(places, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    this.search_results = places.filter(p => this.placeIsInRange({
                        latitude: p.geometry.location.lat(),
                        longitude: p.geometry.location.lng()
                    }));

                    this.clearAllMarkers();

                    this.search_results.forEach(place => {
                        const marker = new google.maps.Marker({
                            map: this.map,
                            position: place.geometry.location
                        });
                        this.markers.push(marker);
                    });
                }
            },

            clearAllMarkers() {
                this.markers.forEach(m => m.setMap(null));
                this.markers = [];
            },

            placeIsInRange(place_location) {
                return geolib.getDistance(place_location, {
                    latitude: this.defaultCenter.lat,
                    longitude: this.defaultCenter.lng
                }) < this.rangeRadius;
            },

            highlightPlace(place) {
                this.map.panTo(place.geometry.location);
                this.map.setZoom(15);
            },

            selectPlace(place) {
                const request = {placeId: place.place_id};
                const service = new google.maps.places.PlacesService(this.map);
                service.getDetails(request, this.receivePlaceDetails);
            },

            receivePlaceDetails(place, status) {
                const place_data = {
                    id: place.id,
                    name: place.name,
                    address: place.formatted_address,
                    website: place.website || '',
                    telephone: place.international_phone_number || '',
                    photos: place.photos ? place.photos.map(p => p.getUrl({maxWidth: 300, maxHeight: 300})) : [],
                    latitude: place.geometry.location.lat(),
                    longitude: place.geometry.location.lng(),
                    city: place.address_components[3].short_name || '',
                    email: place.email || ''
                };

                this.$emit('place-selected', place_data);
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">
    .map {
        height: calc(100vh - 2rem);
    }

    .results {
        height: calc(100vh - 2rem);
        overflow-y: auto;
    }
</style>