<template>
    <div>
        <div class="flex justify-between items-center my-8">
            <p class="text-4xl uppercase">{{ feature.label }}</p>

            <div class="flex justify-end items-center">
                <div class="text-sm text-red-dark border-2 border-red-dark px-2 py-1 uppercase"
                     @click="showForm = true">Edit
                </div>
                <delete-modal :delete-url="`/admin/features/${featureAttributes.id}`"
                              :resource-name="feature.label"
                              @item-deleted="featureDeleted"
                ></delete-modal>
            </div>
        </div>
        <div class="flex mt-8 pt-8 justify-between">
            <div class="super-big-icon-box flex justify-center items-center w-64 h-64" v-html="feature.icon">
            </div>
            <div class="flex justify-center items-center">
                <div class="max-w-sm bg-grey-darker text-red p-4 overflow-auto leading-normal font-mono">{{ feature.icon }}</div>
            </div>
        </div>
        <feature-form :show-form="showForm"
                      :url="`/admin/features/${featureAttributes.id}`"
                      redirects-to=""
                      :form-object="formObject"
                      @request-cancel="showForm = false"
                      @feature-stored="updateFeature"
        ></feature-form>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {
        props: ['feature-attributes'],

        data() {
            return {
                feature: {
                    label: this.featureAttributes.label || '',
                    icon: this.featureAttributes.icon || ''
                },
                showForm: false,
                formObject: new Form({
                    label: this.featureAttributes.label,
                    icon: this.featureAttributes.icon
                })
            };
        },

        methods: {
            updateFeature({label, icon}) {
                this.feature = {
                    label,
                    icon
                };
                this.formObject.resetFields({label, icon});
                this.showForm = false;
            },

            featureDeleted() {
                window.location = '/admin/features';
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>

<style lang="scss"
       type="text/scss">
.super-big-icon-box {

    svg {
        height: 200px;
    }
}
</style>