<template>
    <div>
        <div class="flex justify-between items-center py-4">
            <p class="text-4xl text-red-dark">{{ establishment.name }}</p>
            <div class="flex flex-end items-center">
                <delete-modal :delete-url="`/admin/establishments/${establishmentAttributes.id}`"
                              :resource-name="establishment.name"
                              :redirects="true"
                              :csrf-token="csrfToken"
                ></delete-modal>
                <div class="border-2 border-red uppercase mx-4 py-2 px-4 text-xs text-red"
                     @click="showForm = true">Edit
                </div>
            </div>

        </div>
        <div class="mx-w-xl">
            <p class="my-2 text-grey-dark">
                <strong class="text-red-dark">Type:</strong>
                {{ establishment.type }}
            </p>
            <p class="my-2 text-grey-dark">
                <strong class="text-red-dark">Description:</strong>
                {{ establishment.description }}
            </p>
            <p class="my-2 text-grey-dark">
                <strong class="text-red-dark">Address:</strong>
                {{ establishment.address }}
            </p>
            <p class="my-2 text-grey-dark">
                <strong class="text-red-dark">Chinese Address:</strong>
                {{ establishment.zh_address }}
            </p>
        </div>
        <div class="max-w-xl my-12 flex flex-wrap">
            <div v-for="feature in feature_list"
                 :key="feature.id"
                 class="m-8">
                <label :for="`checkbox_${feature.id}`"
                       class="flex flex-col justify-center items-center">
                    <span v-html="feature.icon"></span>
                    <input type="checkbox"
                           :id="`checkbox_${feature.id}`"
                           class="hidden"
                           v-model="selected_features"
                           :value="feature.id"
                           @change="syncFeatures"
                    >
                    <div class="fake-checkbox text-red-light w-4 h-4 border-2 border-red bg-white"></div>
                    <p class="text-red-dark uppercase mt-2">{{ feature.label }}</p>
                </label>
            </div>
        </div>
        <establishment-form :form-object="form_object"
                            :show-form="showForm"
                            :url="`/admin/establishments/${establishment.id}`"
                            @establishment-updated="updateEstablishment"
                            redirect-to=""
                            @request-cancel="showForm = false"
        ></establishment-form>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {

        props: {
            'establishment-attributes': {
                type: Object,
                required: true
            },
            features: {
                type: Array,
                default() {
                    return [];
                }
            },
            'csrf-token': {
                type: String,
                default: ''
            }
        },

        data() {
            return {
                establishment: this.establishmentAttributes,
                form_object: new Form({
                    name: this.establishmentAttributes.name,
                    type: this.establishmentAttributes.type,
                    description: this.establishmentAttributes.description,
                    address: this.establishmentAttributes.address,
                    zh_address: this.establishmentAttributes.zh_address,
                    latitude: this.establishmentAttributes.latitude,
                    longitude: this.establishmentAttributes.longitude
                }),
                showForm: false,
                feature_list: [],
                selected_features: this.features.map(feature => feature.id)
            };
        },

        mounted() {
            this.fetchFeatureList();
        },

        methods: {
            updateEstablishment(updated_data) {
                this.showForm = false;
                Object.keys(updated_data).forEach(field => {
                    if (this.establishment.hasOwnProperty(field)) {
                        this.establishment[field] = updated_data[field];
                    }
                });
            },

            fetchFeatureList() {
                axios.get('/api/features')
                     .then(({data}) => this.feature_list = data)
                     .catch(err => console.log(err));
            },

            syncFeatures() {
                axios.post(`/admin/establishments/${this.establishmentAttributes.id}/features`, {
                    feature_ids: this.selected_features
                })
                    .then(({data}) => console.log(data))
                    .catch(err => console.log(err));
            }
        }

    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

    input[type=checkbox]:checked + .fake-checkbox {
        background-color: currentColor;
    }

</style>