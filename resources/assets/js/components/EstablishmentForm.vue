<template>
    <span>
        <modal :show="showForm">
            <div slot="body"
                 class="max-w-sm mx-auto p-8">
                <p class="text-xl text-red">Add a new drinking establishment</p>
                <vue-form :form-attributes='formObject'
                          :url="url"
                          :redirects-to="redirectsTo"
                          @submission-okay="data => $emit('establishment-updated', data)"
                >
                    <div slot="form-body"
                         slot-scope="{formData, formErrors}">
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.name}">
                            <label class="text-sm text-red-dark"
                                   for="name">Name</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.name">{{ formErrors.name }}</span>
                            <input type="text"
                                   name="name"
                                   v-model="formData.name"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="name">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.type}">
                            <label class="text-sm text-red-dark"
                                   for="type">Type</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.type">{{ formErrors.type }}</span>
                            <input type="text"
                                   name="type"
                                   v-model="formData.type"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="type">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.description}">
                            <label class="text-sm text-red-dark"
                                   for="description">Description</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.description">{{ formErrors.description }}</span>
                            <input type="text"
                                   name="description"
                                   v-model="formData.description"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="description">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.address}">
                            <label class="text-sm text-red-dark"
                                   for="address">Address</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.address">{{ formErrors.address }}</span>
                            <input type="text"
                                   name="address"
                                   v-model="formData.address"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="address">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.zh_address}">
                            <label class="text-sm text-red-dark"
                                   for="zh_address">Zh_address</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.zh_address">{{ formErrors.zh_address }}</span>
                            <input type="text"
                                   name="zh_address"
                                   v-model="formData.zh_address"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="zh_address">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.opening_hours}">
                            <label class="text-sm text-red-dark"
                                   for="opening_hours">Opening hours</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.opening_hours">{{ formErrors.opening_hours }}</span>
                            <input type="text"
                                   name="opening_hours"
                                   v-model="formData.opening_hours"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="opening_hours">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.happy_hour}">
                            <label class="text-sm text-red-dark"
                                   for="happy_hour">Happy hours</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.happy_hour">{{ formErrors.happy_hour }}</span>
                            <input type="text"
                                   name="happy_hour"
                                   v-model="formData.happy_hour"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="happy_hour">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.latitude}">
                            <label class="text-sm text-red-dark"
                                   for="latitude">Latitude</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.latitude">{{ formErrors.latitude }}</span>
                            <input type="text"
                                   name="latitude"
                                   v-model="formData.latitude"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="latitude">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.longitude}">
                            <label class="text-sm text-red-dark"
                                   for="longitude">Longitude</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.longitude">{{ formErrors.longitude }}</span>
                            <input type="text"
                                   name="longitude"
                                   v-model="formData.longitude"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="longitude">
                        </div>
                    </div>
                    <button slot="form-button-row"
                            type="button"
                            @click.prevent="$emit('request-cancel')">Cancel</button>
                </vue-form>
            </div>
        </modal>
    </span>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {
        props: ['show-form', 'form-object', 'url', 'redirects-to'],
        data() {
            return {
            };
        },

        methods: {
            resetForm() {
                this.formObject.resetFields();
                this.showForm = false;
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>