<template>
    <div>
        <p class="text-red text-xl text-center">Add an Establishment</p>
        <p class="text-red text-center">[all fields are compulsory]</p>

        <vue-form :form-attributes="formObject"
                  url="/suggested-establishments"
                  class="max-w-sm mx-auto px-4 mb-8"
                  button-row-classes="flex justify-center"
                  button-classes="border-2 border-red text-xl py-4 px-8 text-red mb-8"
                  @submission-okay="requestSubmitted"
        >
            <div slot="form-body"
                 slot-scope="{formData, formErrors}">
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.name}">
                    <label class="text-sm text-red"
                           for="name">Name</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.name">{{ formErrors.name }}</span>
                    <input type="text"
                           name="name"
                           v-model="formData.name"
                           class="w-full h-12 pl-2 mt-1 border-2 border-teal rounded"
                           id="name">
                </div>
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.address}">
                    <label class="text-sm text-red"
                           for="address">Address</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.address">{{ formErrors.address }}</span>
                    <input type="text"
                           name="address"
                           v-model="formData.address"
                           class="w-full h-12 pl-2 mt-1 border-2 border-teal rounded"
                           placeholder="English or Chinese, or Google Maps link"
                           id="address">
                </div>
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.opening_hours}">
                    <label class="text-sm text-red"
                           for="opening_hours">Opening Hours</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.opening_hours">{{ formErrors.opening_hours }}</span>
                    <input type="text"
                           name="opening_hours"
                           v-model="formData.opening_hours"
                           class="w-full h-12 pl-2 mt-1 border-2 border-teal rounded"
                           id="opening_hours">
                </div>
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.happy_hour}">
                    <label class="text-sm text-red"
                           for="happy_hour">Happy Hour</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.happy_hour">{{ formErrors.happy_hour }}</span>
                    <input type="text"
                           name="happy_hour"
                           v-model="formData.happy_hour"
                           class="w-full h-12 pl-2 mt-1 border-2 border-teal rounded"
                           placeholder="Ex: Wednesday 5 - 7pm"
                           id="happy_hour">
                </div>
                <div class="form-group mv3"
                     :class="{'has-error': formErrors.description}">
                    <label class="text-sm text-red"
                           for="description">Short Description</label>
                    <span class="f6 col-r"
                          v-show="formErrors.description">{{ formErrors.description }}</span>
                    <textarea name="description"
                              v-model="formData.description"
                              class="w-full h-32 pl-2 mt-1 border-2 border-teal rounded"
                              placeholder="Up to 180 characters. Style, mood, unique selling point, etc..."
                    ></textarea>
                </div>
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.email}">
                    <label class="text-sm text-red"
                           for="email">Your Email</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.email">{{ formErrors.email }}</span>
                    <input type="email"
                           name="email"
                           v-model="formData.email"
                           class="w-full h-12 pl-2 mt-1 border-2 border-teal rounded"
                           id="email">
                </div>
                <p class="text-red text-center">Tick what applies</p>
                <div v-for="filter in filters"
                     class="mb-8"
                     :key="filter.id">
                    <label :for="`filter_${filter.id}`" class="flex items-center">
                        <input type="checkbox"
                               class="hidden"
                               :checked="formData.features.indexOf(filter.id) !== -1"
                               v-model="formData.features"
                               :value="filter.id"
                               :id="`filter_${filter.id}`">
                        <span class="inline-block rounded w-4 h-4 border-2 border-teal mr-2 fake-checkbox"></span>
                        <p class="mr-4 w-16 text-center" v-html="filter.icon"></p>
                        <span class="capitalize text-grey">{{ filter.name }}</span>
                    </label>
                </div>
                <p class="text-lg uppercase text-red text-center">Please Read</p>
                <p class="text-red text-center">
                    Your request will be reviewed and added to 'Drinks in Taichung' shortly. We will contact you if any part of your submission is unclear.
                </p>
                <p class="text-red text-center my-8">
                    This website is made by <strong>Dymantic Design</strong>. We are a Taichung based design firm specialising in web and graphic design.
                </p>
                <p class="text-red text-center my-8">
                    Thank you and please share.
                </p>
            </div>
        </vue-form>
        <div>

        </div>
    </div>

</template>

<script type="text/babel">
    import {VueForm, Form} from "@dymantic/vue-forms";

    export default {

        components: {VueForm},

        data() {
            return {
                formObject: new Form({
                    name: "",
                    address: "",
                    opening_hours: "",
                    happy_hour: "",
                    description: "",
                    email: "",
                    features: []
                })
            };
        },

        computed: {
            filters() {
                return this.$store.getters.filterList;
            }
        },

        mounted() {
            this.$parent.menuOpen = false;
        },

        methods: {

            requestSubmitted() {
                this.$router.push('thanks');
            }
        }


    }
</script>

<style scoped
       lang="scss"
       type="text/scss">
    .fake-checkbox {
        transition: .3s;
    }
input[type=checkbox]:checked + .fake-checkbox {
    background-color: teal;
}
</style>