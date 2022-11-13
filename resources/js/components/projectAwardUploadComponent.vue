<template>
    <vue-dropzone :options="this.option" :id="this.id" :useCustomSlot=true :ref="this.img_ref">
        <div class="form-group">
            <div class="wt-labelgroup">
                <label for="file">{{ trans('lang.drop_files') }}</label>
                    <button type="button" class="btn btn-sm btn-success">{{ trans('lang.select_files') }}</button>
            </div>
        </div>
    </vue-dropzone> 
</template>
<style scoped>
@import '~vue2-dropzone/dist/vue2Dropzone.min.css';
</style>
<script>
import vue2Dropzone from 'vue2-dropzone'
export default {
    props: ['option', 'id', 'img_ref'],    
    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
        dropzoneOptions: this.option
        }
    }
}
</script>