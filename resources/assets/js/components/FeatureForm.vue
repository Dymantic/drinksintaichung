<template>
    <span>
        <modal :show="showForm">
        <div slot="body" class="max-w-sm mx-auto p-4">
            <p class="text-lg font-bold">Add a new feature</p>
            <vue-form :form-attributes="formObject"
                      :url="url"
                      :redirects-to="redirectsTo"
                      @submission-okay="data => $emit('feature-stored', data)"
            >
                <div slot="form-body" slot-scope="{formData, formErrors}">
                    <div class="form-group my-3" :class="{'has-error': formErrors.label}">
                        <label class="text-sm text-red font-bold" for="label">Label</label>
                        <span class="text-xs text-red" v-show="formErrors.label">{{ formErrors.label }}</span>
                        <input type="text" name="label" v-model="formData.label" class="w-full h-8 pl-2 mt-1 border" id="label">
                    </div>
                    <div class="form-group mv3" :class="{'has-error': formErrors.icon}">
                        <label class="text-sm text-red font-bold" for="icon">Icon</label>
                        <span class="f6 col-r" v-show="formErrors.icon">{{ formErrors.icon }}</span>
                        <textarea name="icon"
                                  v-model="formData.icon"
                                  class="p-2 w-full h-48 border mt-1"></textarea>
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
    export default {

        props: ['form-object', 'url', 'redirects-to', 'show-form']
    
    }
</script>

<style scoped lang="scss" type="text/scss">
    textarea {
        resize: none;
    }
</style>