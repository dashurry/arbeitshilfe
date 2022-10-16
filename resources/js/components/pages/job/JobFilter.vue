<template>
    <div class="auto-container">
        <div class="row">

            <!-- Filters Column -->
            <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="filters-outer">
                        <button type="button" class="theme-btn close-filters">X</button>
                        
                        <form class="wt-formtheme wt-formsearch">
                            
                            <!-- Filter Block -->
                            <!-- v-debounce:700ms="filterJob" -->
                            <div class="filter-block">
                                <h4>Start Search</h4>
                                <div class="form-group">
                                    <input type="text" class="border-0" name="s" placeholder="Jobs suchen..." v-model="filterForm.keyword">
                                    <i class="icon material-symbols-outlined">search</i>
                                </div>
                            </div>

                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Categories</h4>
                                <div class="form-group">
                                    <multiselect v-model="filterForm.ctgs" :options="categories" :multiple="true" 
                                    :close-on-select="true"
                                    :clear-on-select="false"
                                    :preserve-search="true" 
                                    placeholder="Nach Kategorie filtern" 
                                    label="title" 
                                    track-by="id"
                                    :hideSelected="true"
                                    @input="filterJob"
                                    >
                                    </multiselect>
                                    <i v-if="filterForm.ctgs.length < 1" class="icon material-symbols-outlined">layers</i>
                                </div>
                            </div>

                            <!-- Checkboxes Ouer -->
                            <div class="filter-block">
                                <h4>Locations</h4>
                                <div class="form-group">
                                    <multiselect v-model="filterForm.locations" :options="locations" :multiple="true" 
                                    :close-on-select="true"
                                    :clear-on-select="false"
                                    :preserve-search="true" 
                                    placeholder="Nach Standorten filtern" 
                                    label="title" 
                                    track-by="id"
                                    :hideSelected="true"
                                    @input="filterJob"
                                    >
                                    </multiselect>
                                    <i v-if="filterForm.locations.length < 1" class="icon material-symbols-outlined">home_pin</i>
                                </div>
                            </div>

                            <!-- Checkboxes Ouer -->
                            <!-- <div class="checkbox-outer">
                                <h4>Skills</h4>
                                <ul class="checkboxes">

                                    <li v-for="(skill,i) in skills" :key="i">
                                        <input :id="`skill-${i}`" type="checkbox" name="skills[]" :value="skill.slug" v-model="filterForm.skills" @change="filterJob">
                                        <label :for="`skill-${i}`">{{ skill.title }}</label>                            
                                    </li>

                                </ul>
                            </div> -->

                            <!-- Checkboxes Ouer -->
                            <div class="checkbox-outer">
                                <h4>{{ trans('lang.project_length') }}</h4>
                                <ul class="checkboxes">

                                    <li v-for="(length,i) in project_length" :key="i">
                                        <input :id="`key-${i}`" type="checkbox" name="lengths" :value="i" v-model="filterForm.projectLengths" @change="filterJob">
                                        <label :for="`key-${i}`">{{ length }}</label>                            
                                    </li>

                                </ul>
                            </div>

                            <div class="checkbox-outer">
                                <h4>Datum der Veröffentlichung</h4>
                                <ul class="checkboxes">
                                    <li>
                                        <input id="check-aa" type="radio" name="dateCheck" v-model="filterForm.datePosted" value="" checked @change="filterJob">
                                        <label for="check-aa">Alle</label>                                
                                    </li>
                                    <li>
                                        <input id="check-a" type="radio" name="dateCheck" v-model="filterForm.datePosted" value="hour" @change="filterJob">
                                        <label for="check-a">Letzter Stunde</label>                                
                                    </li>
                                    <li>
                                        <input id="check-b" type="radio" name="dateCheck" v-model="filterForm.datePosted" value="1" @change="filterJob">
                                        <label for="check-b">Letzten 24 Stunden</label>                                
                                    </li>
                                    <li>
                                        <input id="check-c" type="radio" name="dateCheck" v-model="filterForm.datePosted" value="7" @change="filterJob">
                                        <label for="check-c">Letzten 7 Tage</label>                                
                                    </li>
                                    <li>
                                        <input id="check-d" type="radio" name="dateCheck" v-model="filterForm.datePosted" value="14" @change="filterJob">
                                        <label for="check-d">Letzten 14 Tage</label>                                
                                    </li>
                                    <li>
                                        <input id="check-e" type="radio" name="dateCheck" v-model="filterForm.datePosted" value="30" @change="filterJob">
                                        <label for="check-e">Letzten 30 Tage</label>                                
                                    </li>
                                </ul>
                            </div>

                            <div class="filter-block">
                                <h4>Tags</h4>
                                <ul class="tags-style-one">
                                    <li><a href="#">app</a></li>
                                    <li><a href="#">administrative</a></li>
                                    <li><a href="#">android</a></li>
                                    <li><a href="#">wordpress</a></li>
                                    <li><a href="#">design</a></li>
                                    <li><a href="#">react</a></li>
                                </ul>
                            </div>

                        </form>
                    </div>

                    <div class="call-to-action-four">
                        <h5>Rekrutieren?</h5>
                        <p>Inserieren Sie Ihre Stellen bei Millionen von monatlichen Nutzern und durchsuchen Sie Millionen Lebensläufe in unserer Datenbank.</p>
                        <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Jetzt mit der Rekrutierung beginnen</span></a>
                        <div class="image"></div>
                    </div>

                </div>
                </div>
            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    
                <div class="mb-3"><span><strong class="text-muted">{{ filteredJobs.length }}</strong> of 
                <strong class="text-muted">{{ jobData.total }}</strong> results</span></div>

                <div class="ls-outer">

                    <template v-if="filterLoading">
                        <div class="spinner">
                            <span class="loader-job"> </span>
                        </div>
                    </template>

                    <template v-else>
                        <!-- Job Block -->
                        <div class="job-block featured_class" v-for="(job,i) in filteredJobs" :key="i">
                            
                            <span v-if="job.is_feature=='true'" class="wt-featuredtag"><img src="/images/featured.png" alt="" 
                            data-tipso="Plus Member" class="template-content tipso_style"></span>

                            <div class="inner-box">
                                <div class="content">
                                    <span class="company-logo mt-3">
                                        <img src="https://creativelayers.net/themes/superio/images/resource/company-logo/1-2.png" alt="">
                                        </span>

                                    <a :href="`/profile/${job.employer.slug}`" class="d-flex align-items-center"><i class="material-symbols-outlined">verified</i> {{ job.employer.first_name +" "+ job.employer.last_name }}</a>
                                    <p style="font-size: 12px; color: #a7a7a7;">Member Since: {{ moment(job.employer.created_at).format("MMMM YYYY") }}</p>

                                    <h4 class="mt-3"><a :href="`/job/${job.slug}`">{{ job.title }}</a></h4>
                                    <p>{{ job.description }}</p>
                                    <ul class="job-info">
                                        <li class="d-flex align-items-center"><i class="icon material-symbols-outlined mr-2">date_range</i> <vue-moment-ago prefix="" suffix="ago" :date="job.created_at" lang="en" /> </li>
                                        <!-- <vue-moment-ago prefix="" suffix="ago" :date="job.created_at" lang="en" /> -->
                                        <li class="d-flex align-items-center" v-if="job.price!=null || job.price > 0"><span class="icon material-symbols-outlined mr-2">payments</span> {{ job.price }} Fr</li>
                                        
                                        <li class="d-flex align-items-center" v-else><i class="icon material-symbols-outlined mr-2">payments</i> Open</li>
                                        
                                        <!-- <li><i class=""></i></li> -->
                                    </ul>
                                    <ul class="job-other-info">

                                        <li v-if="job.project_level != ''" class="privacy"><i class="fas fa-dollar-sign"></i> {{ job.project_level }}</li>

                                        <li class="time d-flex align-items-center"><i class="material-symbols-outlined">home_pin</i> {{ job.location.title }}</li>

                                        <li class="required d-flex align-items-center"><i class="material-symbols-outlined">schedule</i> {{ job.duration }}</li>

                                        <li class="tag d-flex align-items-center"><i class="material-symbols-outlined">fingerprint</i> {{ trans('lang.job_id') }} - {{ job.code }}</li>

                                        <li v-for="(cat,i) in job.categories" :key="i" class="cat d-flex align-items-center"><i class="material-symbols-outlined">layers</i>{{ cat.name }}</li>
                                    </ul>



                                    <button @click.prevent="addWishList($event,job.id,'saved_jobs')" class="bookmark-btn">
                                        <span class="fa-heart" :class="my_saved_jobs.includes(job.id)?'fas text-danger':'far'"></span>
                                    </button>

                                    <!-- <button v-else class="bookmark-btn active" @click.prevent="addWishList(job.id,'saved_jobs')" v-cloak>
                                        <span class="far fa-heart"></span>
                                    </button> -->

                                </div>
                            </div>
                        </div>

                        <div class="text-center" v-if="loadingJobs">
                            <div class="spinner-border text-info" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <!-- Listing Show More -->
                        <div class="ls-show-more">
                            <p>Zeigt {{ filteredJobs.length }} von {{ jobData.total }} Jobs</p>
                            <div class="bar"><span class="bar-inner" :style="`width: ${progressWidth}%`"></span></div>
                            <button v-if="nextPage != null" @click="showMoreData()" class="show-more">Mehr anzeigen</button>
                        </div>

                    </template>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import VueMomentAgo from 'vue-moments-ago';
export default {
    components: {
        Multiselect,
        VueMomentAgo,
    },
    props:{
        categories: Array,
        locations: Array,
        skills: Array,
        project_length: Object,
        jobs: Object,
        my_saved_jobs: Array,
    },
    data(){
        return{
            filterForm: {
                ctgs: [],
                skills: [],
                prjLengths: [],
                locations: [],
                projectLengths: [],
                datePosted: [],
                keyword: "",
            },
            jobData: this.jobs,
            filteredJobs : this.jobs.data,
            nextPage: this.jobs.last_page==this.jobs.current_page?null:this.jobs.current_page+1,
            loadingJobs: false,
            filterLoading: false,

            value: [],

            moment: moment,
        }
    },
    computed:{
        progressWidth: function(){
            let percentage = (this.filteredJobs.length * 100)/this.jobs.total;
            return percentage;
        }
        
    },
    methods:{
        showMoreData(){
            this.loadingJobs = true;

            axios.get("/search-results",{
                params: {
                    type: 'job',
                    page: this.nextPage,
                    vueApi: true,
                    category: JSON.stringify(this.filterForm.ctgs),
                    locations: JSON.stringify(this.filterForm.locations),
                    skills: JSON.stringify(this.filterForm.skills),
                    project_lengths: JSON.stringify(this.filterForm.projectLengths),
                    datePosted: this.filterForm.datePosted,
                    s: this.filterForm.keyword,

                }
            }).then(resp=>{
                return resp.data;
            }).then(data=>{
                data.data.forEach(element => {
                    this.filteredJobs.push(element);
                });
                this.jobData = data;
                this.nextPage = this.jobData.last_page==this.jobData.current_page?null:this.jobData.current_page+1;
                this.loadingJobs = false;
            }).catch(err=>{
                console.error(err.response.data);
            })
        },


        filterJob(){
            this.filterLoading = true;
            axios.get("/search-results",{
                params:{
                    page: 1,
                    type: 'job',
                    vueApi: true,
                    category: JSON.stringify(this.filterForm.ctgs),
                    locations: JSON.stringify(this.filterForm.locations),
                    skills: JSON.stringify(this.filterForm.skills),
                    project_lengths: JSON.stringify(this.filterForm.projectLengths),
                    datePosted: this.filterForm.datePosted,
                    s: this.filterForm.keyword,

                }
            }).then(resp=>{
                return resp.data;
            }).then(data=>{
                console.log(data);
                this.jobData = data;
                this.filteredJobs = data.data;
                this.nextPage = this.jobData.last_page==this.jobData.current_page?null:this.jobData.current_page+1;
                this.filterLoading = false;

            }).catch(err=>{
                console.error(err.response.data);
            });
        },

        addWishList(e,jobId,type){

            var btn = e.currentTarget;
            
            var child = btn.children[0];

            if(child.classList.contains("far"))
            {
                child.classList.remove("far");
                child.classList.add("fas","text-danger");
            }
            else if(child.classList.contains("fas"))
            {
                child.classList.remove("fas","text-danger");
                child.classList.add("far");
            }
            
            axios.post("/job/add-wishlist",{
                id: jobId,
                column: type,
            }).then(resp=>{
                return resp.data;
            }).then(data=>{
                if(data.type=="success"){
                    this.toggleWishList(jobId);
                }
            }).catch(err=>{
                console.error(err.response.data);
            })
        },

        toggleWishList(jobId){
            
            if(this.my_saved_jobs.includes(jobId))
            {
                let index = this.my_saved_jobs.indexOf(jobId);

                if(index > -1){
                    this.my_saved_jobs.splice(index,1);
                }
            }
            else{

                this.my_saved_jobs.push(jobId);
            }

        }
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
.multiselect__tags {
    min-height: 60px;
    border: 1px solid #ECEDF2;
    border-radius: 8px;
}
.multiselect__input{
    border: none !important;
    padding-left: 15px !important;
    height: 0px !important;
}
.multiselect__select:before {
    top: 100%;
}
.multiselect__placeholder{
    margin-top: 9px;
    padding-left: 45px;
}
.multiselect__single {
    padding-left: 15px;
    margin-bottom: 8px;
    margin-top: 12px;
    font-weight: 600;
    color: #1967d2;
}
</style>