<template>
    <div>
        <!-- Collapse Head -->
        <div class="card-header d-flex justify-content-between">
            <!-- Project with Image -->
            <div v-if="this.stored_project_img" :id="this.main_accordion_id" class="collapsed" data-toggle="collapse" :data-target="'#'+this.inner_accordion_id">
                <!-- Title -->
                <h5>{{this.stored_project_title}}</h5>
                    <!-- Url -->
                    <button type="button" class="btn btn-link shadow-none p-0">{{this.stored_project_url}}</button>
                <!-- Image and Close Button -->
                <div v-if="uploaded_project_image == false">
                    <img class="img-fluid" :src="stored_project_img" width="65" height="65">
                    <a class="dz-remove text-danger" href="javascript:;" @click="removeImage()" >
                        <i class="material-symbols-outlined">close</i>
                    </a>
                </div>
                <div :class="img_hidden_id" v-else></div>
            </div>
            <!-- Project without Image -->
            <div v-else :id="this.main_accordion_id" class="collapsed" data-toggle="collapse" :data-target="'#'+this.inner_accordion_id">
                <!-- Title -->
                <h5>{{this.stored_project_title}}</h5>
                    <!-- Url -->
                    <button type="button" class="btn btn-link shadow-none p-0">{{this.stored_project_url}}</button>
                <div :class="img_hidden_id"></div>
            </div>
            <!-- Edit/Delete Buttons -->
            <div>
                <a href="javascript:void(0);" class="wt-addinfo badge badge-primary shadow-none" ref="storedProjectelement" :id="this.main_accordion_id" data-toggle="collapse"  :data-target="'#'+this.inner_accordion_id" aria-expanded="true">
                    <i class="material-symbols-outlined"></i>
                </a>
                <a href="javascript:void(0);" class="badge badge-danger shadow-none" @click="removeElement()">
                    <i class="material-symbols-outlined">delete</i>
                </a>
            </div>
        </div>
        <!-- Collapse Body -->
        <div class="collapse hide" :id="this.inner_accordion_id" :aria-labelledby="this.main_accordion_id" data-parent="#accordion">
            <div class="card-body">
                <!-- Project Title Input -->
                <div class="form-group">
                    <input type="text" :value="this.stored_project_title" v-bind:name="this.project_title_name" class="form-control" :placeholder="this.project_title">
                </div>
                <!-- Project Url Input -->
                <div class="form-group">
                    <input type="text" :value="this.stored_project_url" v-bind:name="this.project_url_name" class="form-control" :placeholder="this.project_url">
                </div>
                <!-- Project Upload Image Dropzone -->
                <div class="form-group" v-if="this.stored_project_img">
                    <div v-if="uploaded_project_image">
                        <vue-dropzone :options="dropzoneOptions" :id="this.dropzone_id" :useCustomSlot=true :ref="this.img_ref" @vdropzone-file-added="vfileAdded" v-on:vdropzone-error="failed">
                                <!-- Doted Border -->
                                <div class="wt-labelgroup">
                                    <label for="file">{{trans('lang.drop_files')}}</label>
                                        <button type="button" class="btn btn-sm btn-success">{{trans('lang.select_files')}}</button>
                                </div>
                        </vue-dropzone>
                        <input type="hidden" v-bind:name="this.img_hidden_name" :id="this.img_hidden_id" value="">
                    </div>
                    <!-- Project Display Image Name / Remove Uploaded Image -->
                    <div class="form-inline" v-else>
                        <small class="form-text text-muted">{{this.stored_image_name}}</small>
                            <a class="dz-remove text-danger" href="javascript:;" @click="removeImage(img_hidden_id)" :id="this.uploaded_image_remove_id" >
                                <i class="material-symbols-outlined">close</i>
                            </a>
                        <input type="hidden" v-bind:name="this.img_hidden_name" :id="this.img_hidden_id" :value="this.stored_image_name">
                    </div>
                </div>
                <div class="form-group" v-else>
                    <vue-dropzone :options="dropzoneOptions" :id="this.dropzone_id" :useCustomSlot=true :ref="this.img_ref" @vdropzone-file-added="vfileAdded" v-on:vdropzone-error="failed">
                        <!-- Doted Border -->
                        <div class="wt-labelgroup">
                            <label for="file">{{trans('lang.drop_files')}}</label>
                                <button type="button" class="btn btn-sm btn-success">{{trans('lang.select_files')}}</button>
                        </div>
                    </vue-dropzone>
                    <input type="hidden" v-bind:name="this.img_hidden_name" :id="this.img_hidden_id" value="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const getImageUploadTemplate = () => `
    <div class="dz-preview dz-file-preview">
        <img data-dz-thumbnail class="img-fluid" width="65" height="65"/>
        <a class="text-danger" href="javascript:;" data-dz-remove="">
            <i class="material-symbols-outlined">close</i>
        </a>
    </div>
`;
import vue2Dropzone from 'vue2-dropzone'
//import 'vue2-dropzone/dist/vue2Dropzone.css'
export default {
    props: ['stored_image_name', 'dropzone_id', 'img_hidden_id', 'img_hidden_name', 'img_ref', 'main_accordion_id', 'inner_accordion_id', 'stored_project_title', 'stored_project_url', 'stored_project_img', 'project_title_name', 'project_url_name', 'previewer_class', 'remove_uploded_image_id', 'uploaded_image_remove_id', 'project_title', 'project_url'],
    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
            options: {
            error: {
                position: 'center',
                    timeout: 3000,
                },
            },
            image_url:'',
            uploaded_project_image:false,
            stored_projects:[],
            img_preview: this.getImagePreview(),
            img_previews_container:'.'+this.img_hidden_id,
            img_uploder: this.getImageuploader(),
            dropzoneOptions: {
                url: APP_URL+'/freelancer/upload-temp-image',
                maxFilesize: 1, // MB
                maxFiles: 1,
                previewTemplate: getImageUploadTemplate(),
                previewsContainer: '.'+this.previewerClass(),
                paramName:'project_img',
                //addRemoveLinks: true,
                headers: {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
                },
                init: function() {
                    var myDropzone = this;
                    this.on("addedfile", function(file) {
                        var input_hidden_id = jQuery('#'+myDropzone.element.id).parents('.project-list-item').find('div.card-body input[type=hidden]').attr('id');
                        document.getElementById(input_hidden_id).value = file.name;
                    });
                    this.on("removedfile", function(file) {
                        var input_hidden_id = jQuery('#'+myDropzone.element.id).next('input[type=hidden]').attr('id');
                        document.getElementById(input_hidden_id).value = '';
                    });
                }
            }
        }
    },
    methods: {
        showError(message){
            return this.$toast.error(' ', message, this.options.error);
        },
        previewerClass() {
            return this.img_hidden_id;
        },
        removeElement() {
            this.$emit('removeElement');
        },
        removeImage: function() {
            this.uploaded_project_image = true;
        },
        getImagePreview() {
            if (this.stored_project_img) {
                return this.img_preview = true;
            } else {
                return this.img_preview = false;
            }
        },
        getImageuploader() {
            if (this.stored_project_img) {
                return this.img_uploder = true;
            } else {
                return this.img_uploder = false;
            }
        },
        vfileAdded(file) {
            console.log(this.$refs[this.img_ref].id);
        },
        failed:function(file,message,xhr){
            if (file.type != this.$refs[this.img_ref].options.acceptedFiles) {
                if (message == 'You can not upload any more files.') {
                    message = 'you need to remove file before uploading new one.'
                }
                this.showError(message);
                this.$refs[this.img_ref].removeFile(file);
                var input_hidden_id = jQuery('#'+this.$refs[this.img_ref].id).parents('.wt-settingscontent').find('.wt-userform input[type=hidden]').attr('id');
                document.getElementById(input_hidden_id).value = '';
            }
        }
    },
    mounted: function () {
        // if(this.stored_project_img){
        //     this.image_url = APP_URL+"/uploads/users/"+USERID+"/projects/"+this.stored_project_img;
        // }
    },
    created: function() {}
}
</script>
