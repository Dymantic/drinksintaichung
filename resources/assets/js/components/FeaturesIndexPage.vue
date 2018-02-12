<template>
    <div>
        <div class="flex justify-between items-center my-3">
            <p class="text-4xl">Features</p>
            <div class="flex flex-end">
                <div class="text-sm text-red-dark border-2 border-red-dark px-2 py-1 uppercase" @click="showForm = true">Add feature</div>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div v-for="feature in features"
                 :key="feature.id"
                 class="flex flex-col items-center justify-between w-48 h-48 bg-grey-lighter p-4 m-3">
                <p class="text-lg font-bold uppercase">{{ feature.label }}</p>
                <a :href="`/admin/features/${feature.id}`">
                    <div class="icon-box"
                         v-html="feature.icon"></div>
                </a>

            </div>
        </div>
        <feature-form :show-form="showForm"
                      url="/admin/features"
                      redirects-to=""
                      :form-object="formObject"
                      @request-cancel="showForm = false"
                      @feature-stored="addStoredFeature"
        ></feature-form>
    </div>
</template>

<script type="text/babel">
    import { Form } from "@dymantic/vue-forms";

    export default {
        props: ['feature-list'],

        data() {
            return {
                features: this.featureList || [],
                showForm: false,
                formObject: new Form({name: '', icon: ''})
            };
        },

        methods: {
            addStoredFeature(feature_data) {
                this.features.push({
                    id: feature_data.id,
                    label: feature_data.label,
                    icon: feature_data.icon
                });
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

<style lang="scss"
       type="text/css">
    .icon-box svg {
        height: 60px;
    }
</style>