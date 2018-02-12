<template>
    <div>
        <location-search :default-center='{"lat": 24.150930, "lng": 120.658524}'
                         :range-radius="15000"
                         @place-selected="openForm"
        ></location-search>
        <establishment-form :show-form="showForm"
                            :form-object="formObject"
                            @request-cancel="showForm = false"
                            url="/admin/establishments"
                            redirects-to="/admin/establishments"
        ></establishment-form>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {
        data() {
            return {
                showForm: false,
                formObject: new Form({
                    name: '',
                    type: '',
                    description: '',
                    address: '',
                    zh_address: '',
                    latitude: '',
                    longitude: ''
                })
            };

        },

        methods: {
            openForm(place_data) {
                console.log(place_data);
                this.formObject.resetFields({
                    name: place_data.name,
                    address: place_data.address,
                    zh_address: place_data.address,
                    latitude: place_data.latitude,
                    longitude: place_data.longitude
                });
                this.showForm = true;
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>