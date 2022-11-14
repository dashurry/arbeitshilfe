<template>
    <div class="container">
        <!-- Header -->
        <div class="media flex-wrap">
            <div class="media-body">
                <h2>{{trans('lang.add_your_project')}}</h2>
            </div>
            <a href="javascript:void(0);" @click="addProject" class="btn btn-sm btn-outline-primary add-project-btn">{{trans('lang.add_project')}}</a>
        </div>
        <!-- Accordion -->
        <ul class="mt-3" id="project-list">
            <div v-if="stored_projects" class="card">
                 <li v-for="(stored_project, index) in stored_projects" :key="index" class="project-element project-list-item" :id="'project-element-'+index">
                    <updateProject
                        :stored_image_name="stored_project.project_image"
                        :dropzone_id ="project.img_id+'-'+index"
                        :img_hidden_id ="'stored_hidden_banner_'+index"
                        :img_hidden_name="'project['+[index]+'][project_hidden_image]'"
                        :img_ref="project.img_ref+'_'+index"
                        :main_accordion_id="'projectaccordion['+index+']'"
                        :inner_accordion_id="'projectaccordioninner['+index+']'"
                        :stored_project_title="stored_project.project_title"
                        :stored_project_url="stored_project.project_url"
                        :stored_project_img="stored_project.project_hidden_image"
                        :project_title_name="'project['+[index]+'][project_title]'"
                        :project_url_name="'project['+[index]+'][project_url]'"
                        :remove_uploded_image_id="'upload_id-'+index"
                        :uploaded_image_remove_id="'remove_upload_id-'+index"
                        :project_title="project.project_title"
                        :project_url="project.project_url"
                        @removeElement="removeStoredProject(index)"
                    >
                    </updateProject>
                </li>
            </div>
            <!-- Accordion -->
            <div class="card">
                <li v-for="(project, index) in projects" :key="index" ref="projectlistelement" class="project-list-item">
                    <!-- Collapse Head -->
                    <div class="card-header d-flex justify-content-between">
                        <div :id="'projectaccordion['+project.count+']'" class="collapsed" data-toggle="collapse" :data-target="'#projectaccordioninner['+project.count+']'">
                            <h5>{{project.project_title}}</h5>
                            <button type="button" class="btn btn-link shadow-none p-0">{{project.project_url}}</button>
                        </div>
                        <!-- Edit/Delete Buttons -->
                        <div>
                            <a href="javascript:void(0);" class="wt-addinfo badge badge-primary shadow-none" :id="'projectaccordion['+project.count+']'" data-toggle="collapse" :data-target="'#projectaccordioninner['+project.count+']'" aria-expanded="true">
                                <i class="material-symbols-outlined"></i>
                            </a>
                            <a href="javascript:void(0);" class="badge badge-danger shadow-none delete-project">
                                <i class="material-symbols-outlined">delete</i>
                            </a>
                        </div>
                    </div>
                    <!-- Display Preview Image Upload -->
                    <figure :class="project.preview_class"></figure>
                    <!-- Collapse Body -->
                    <div class="collapse show" :id="'projectaccordioninner['+project.count+']'" :aria-labelledby="'projectaccordion['+project.count+']'" data-parent="#accordion">
                        <div class="card-body">
                            <!-- Project Title Input -->
                            <div class="form-group">
                                <input type="text" v-bind:name="'project['+[project.count]+'][project_title]'" class="form-control" :placeholder="ph_project_title" v-model="project.project_title">
                            </div>
                            <!-- Project Url Input -->
                            <div class="form-group">
                                <input type="text" v-bind:name="'project['+[project.count]+'][project_url]'" class="form-control" :placeholder="ph_project_url" v-model="project.project_url">
                            </div>
                            <!-- Project Display Image Name / Remove Uploaded Image -->
                            <div class="form-group form-inline d-none">
                                <small class="form-text text-muted"></small>
                                    <a class="dz-remove text-danger" href="javascript:;" :id="'remove-uploded-image-'+project.count" @click="removeUploadedImage($event)" >
                                        <i class="material-symbols-outlined">close</i>
                                    </a>
                            </div>
                            <!-- Project Upload Image Input -->
                            <div class="form-group">
                                <uploadimage :option="project.option" :id="project.img_id+'-'+project.count" :img_ref="project.img_ref+'_'+project.count"></uploadimage>
                                <input type="hidden" v-bind:name="'project['+project.count+'][project_hidden_image]'" :id="'hidden_banner-'+project.count">
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </ul>
    </div>
</template>
<script>
const getImageUploadTemplate = () => `
                                    <div class="dz-preview dz-file-preview">
                                        <img data-dz-thumbnail class="img-fluid" width="65" height="65"/>
                                    </div>
                                    `;
import dateTime from './DateTimeComponent'
import uploadimage from './ProjectAwardUploadComponent'
import updateProject from './EditProjectComponent'
export default{
    components: {dateTime, uploadimage, updateProject},
    props: ['widget_title', 'ph_project_title', 'ph_project_url', ],
        data(){
            return {
                start_date: '',
                end_date: '',
                stored_projects:[],
                project: {
                    image_uploaded: false,
                    project_title: this.ph_project_title,
                    project_hidden_image:'',
                    project_url: this.ph_project_url,
                    count: 0,
                    img_id: 'profile_banner',
                    img_ref: 'profile_banner_ref',
                    preview_class:'dropzone-previews',
                    option:{
                        url: APP_URL+'/freelancer/upload-temp-image',
                        maxFilesize: 2, // MB
                        maxFiles: 1,
                        previewTemplate: getImageUploadTemplate(),
                        previewsContainer: '.dropzone-previews',
                        paramName:'project_img',
                        headers: {
                            'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
                        },
                        init: function() {
                            var myDropzone = this;
                            this.on("addedfile", function(file) {
                                var fileName = file.name;
                                // console.log(fileName.replace(/\s/g,''))
                                // get dropzone hidden input and return its 'id'
                                var input_hidden_id = jQuery('#'+myDropzone.element.id).next('input[type=hidden]').attr('id');
                                document.getElementById(input_hidden_id).value = file.name;
                                jQuery('#'+myDropzone.element.id).css("display","none");
                                jQuery('#'+myDropzone.element.id).parents('.project-list-item').find('.form-inline').removeClass("d-none");
                                jQuery('#'+myDropzone.element.id).parents('.project-list-item').find('.form-inline small').text(file.name);
                            });
                            this.on("removedfile", function(file) {
                                document.getElementById('hidden_banner').value = '';
                            });
                        }
                    },
                },
                projects: [],
            }
        },
        methods: {
            getProjects(){
                let self = this;
                axios.get(APP_URL + '/freelancer/get-freelancer-projects')
                .then(function (response) {
                    if(response.data.type == 'success') {
                        self.stored_projects = response.data.projects;
                    }
                });
            },
            addProject: function () {
                var expereience_list_count = jQuery('.add-project-btn').parents('.projectsComponent').find('ul#project-list div.card li').length;
                var image_placeholder_count = jQuery('.add-project-btn').parents('.projectsComponent').find('ul#project-list div.card li').find('figure.dropzone-previews').length;
                if(this.$refs.projectlistelement) {
                    this.project.count = expereience_list_count + this.$refs.projectlistelement.length;
                } else {
                    this.project.count = expereience_list_count -1;
                }
                if(image_placeholder_count) {
                    image_placeholder_count++
                }
                this.projects.push(Vue.util.extend({}, this.project, this.project.count++, this.project.preview_class = this.project.preview_class+'-'+image_placeholder_count ))
                this.project.option.previewsContainer = this.project.option.previewsContainer+'-'+image_placeholder_count;
            },
            removeStoredProject: function (index) {
                this.stored_projects.splice(index, 1);
            },
            removeUploadedImage: function (event) {
                var element = event.currentTarget;
                var elementID = element.getAttribute('id');
                jQuery('#'+elementID).parents('.form-inline').addClass("d-none");
                jQuery('#'+elementID).parents('.project-list-item').find('.dz-preview').remove();
                jQuery('#'+elementID).parents('.project-list-item').find('.vue-dropzone').css("display","block");
            }
        },
        mounted: function () {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            this.start_date = yyyy + '-' + mm + '-' + dd;
            this.end_date = yyyy + '-' + mm + '-' + dd;
            this.project.start_date = yyyy + '-' + mm + '-' + dd;
            this.project.end_date = yyyy + '-' + mm + '-' + dd;
            jQuery(document).on('click', '.delete-project', function (e) {
                e.preventDefault();
                var _this = jQuery(this);
                _this.parents('.project-list-item').remove();
            });
        },
        created: function() {
            this.getProjects();
        }
    }
</script>
