<template>
<!-- :style="sectionStyle" -->
<section class="pt-10 pb-10">
    <!-- <section 
        :class="job.sectionClass + ' wt-haslayout wt-main-section wt-section-bg wt-latestjobs-wrap'"
        :id="job.sectionId"  
        v-if="Object.entries(job).length != 0"> -->
        <!-- <div class="wt-border-bg">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 109"><defs></defs><title>img-06</title><path class="cls-3" style="fill: #f5f7fa;fill-rule: evenodd;" d="M0,0c392.2,126.94,699.94,121.9,932.18,75.56,42.25-8.42,62.22-14.27,109.76-24.18,340.48-70.91,642-47.06,878.06,0V109H.17Z"/></svg>
        </div> -->
        <!-- <div class="wt-overlay-2":style="[pageID ?{'background-image': 'url('+imageUrl+job.backgroundImg+')'} : '']"></div> -->
        <!-- <div class="wt-overlay-2"></div> -->
        <hr class="hr-sm bg-warning mx-auto mb-10 mb-md-12">
        <div class="container-lg">
          <div class="row justify-content-end">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

              <!-- Heading -->
              <h2 class="display-4 mb-4 text-center">
                Stellen Sie <span class="text-underline-warning" style="background-image: linear-gradient(90deg,rgba(245,192,112,.4),rgba(245,192,112,.4));">talentierte</span> Mitarbeiter in Stunden statt in Wochen ein.
              </h2>

              <!-- Text -->
              <p class="text-muted mb-9 mb-md-0 text-center">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna lectus, mattis non accumsan in, tempor dictum neque. 
                In hac habitasse platea dictumst. Proin sit amet convallis enim. Sed auctor lorem id tortor dignissim, in sollicitudin odio porta.
              </p>

            </div>
          </div>
          <div class="row">
            <!-- Left Cards -->
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            
                <template v-for="(job,i) in latestJobs2">
                    <!-- Card -->
                    <div class="position-relative" v-if="i==0" :key="i">

                            <!-- Decoration -->
                            <div class="position-absolute bottom-start text-warning mb-n12 ms-n10">
                            <svg width="185" height="186" viewBox="0 0 185 186" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            <circle cx="22" cy="2" r="2" fill="currentColor"></circle><circle cx="42" cy="2" r="2" fill="currentColor"></circle><circle cx="62" cy="2" r="2" fill="currentColor">
                                </circle><circle cx="82" cy="2" r="2" fill="currentColor"></circle><circle cx="102" cy="2" r="2" fill="currentColor"></circle><circle cx="122" cy="2" r="2" fill="currentColor"></circle><circle cx="142" cy="2" r="2" fill="currentColor"></circle><circle cx="162" cy="2" r="2" fill="currentColor"></circle><circle cx="182" cy="2" r="2" fill="currentColor"></circle><circle cx="2" cy="22" r="2" fill="currentColor"></circle><circle cx="22" cy="22" r="2" fill="currentColor"></circle><circle cx="42" cy="22" r="2" fill="currentColor"></circle><circle cx="62" cy="22" r="2" fill="currentColor"></circle><circle cx="82" cy="22" r="2" fill="currentColor"></circle><circle cx="102" cy="22" r="2" fill="currentColor"></circle><circle cx="122" cy="22" r="2" fill="currentColor"></circle><circle cx="142" cy="22" r="2" fill="currentColor"></circle><circle cx="162" cy="22" r="2" fill="currentColor"></circle><circle cx="182" cy="22" r="2" fill="currentColor"></circle><circle cx="2" cy="42" r="2" fill="currentColor"></circle><circle cx="22" cy="42" r="2" fill="currentColor"></circle><circle cx="42" cy="42" r="2" fill="currentColor"></circle><circle cx="62" cy="42" r="2" fill="currentColor"></circle><circle cx="82" cy="42" r="2" fill="currentColor"></circle><circle cx="102" cy="42" r="2" fill="currentColor"></circle><circle cx="122" cy="42" r="2" fill="currentColor"></circle><circle cx="142" cy="42" r="2" fill="currentColor"></circle><circle cx="162" cy="42" r="2" fill="currentColor"></circle><circle cx="182" cy="42" r="2" fill="currentColor"></circle><circle cx="2" cy="62" r="2" fill="currentColor"></circle><circle cx="22" cy="62" r="2" fill="currentColor"></circle><circle cx="42" cy="62" r="2" fill="currentColor"></circle><circle cx="62" cy="62" r="2" fill="currentColor"></circle><circle cx="82" cy="62" r="2" fill="currentColor"></circle><circle cx="102" cy="62" r="2" fill="currentColor"></circle><circle cx="122" cy="62" r="2" fill="currentColor"></circle><circle cx="142" cy="62" r="2" fill="currentColor"></circle><circle cx="162" cy="62" r="2" fill="currentColor"></circle><circle cx="182" cy="62" r="2" fill="currentColor"></circle><circle cx="2" cy="82" r="2" fill="currentColor"></circle><circle cx="22" cy="82" r="2" fill="currentColor"></circle><circle cx="42" cy="82" r="2" fill="currentColor"></circle><circle cx="62" cy="82" r="2" fill="currentColor"></circle><circle cx="82" cy="82" r="2" fill="currentColor"></circle><circle cx="102" cy="82" r="2" fill="currentColor"></circle><circle cx="122" cy="82" r="2" fill="currentColor"></circle><circle cx="142" cy="82" r="2" fill="currentColor"></circle><circle cx="162" cy="82" r="2" fill="currentColor"></circle><circle cx="182" cy="82" r="2" fill="currentColor"></circle><circle cx="2" cy="102" r="2" fill="currentColor"></circle><circle cx="22" cy="102" r="2" fill="currentColor"></circle><circle cx="42" cy="102" r="2" fill="currentColor"></circle><circle cx="62" cy="102" r="2" fill="currentColor"></circle><circle cx="82" cy="102" r="2" fill="currentColor"></circle><circle cx="102" cy="102" r="2" fill="currentColor"></circle><circle cx="122" cy="102" r="2" fill="currentColor"></circle><circle cx="142" cy="102" r="2" fill="currentColor"></circle><circle cx="162" cy="102" r="2" fill="currentColor"></circle><circle cx="182" cy="102" r="2" fill="currentColor"></circle><circle cx="2" cy="122" r="2" fill="currentColor"></circle><circle cx="22" cy="122" r="2" fill="currentColor"></circle><circle cx="42" cy="122" r="2" fill="currentColor"></circle><circle cx="62" cy="122" r="2" fill="currentColor"></circle><circle cx="82" cy="122" r="2" fill="currentColor"></circle><circle cx="102" cy="122" r="2" fill="currentColor"></circle><circle cx="122" cy="122" r="2" fill="currentColor"></circle><circle cx="142" cy="122" r="2" fill="currentColor"></circle><circle cx="162" cy="122" r="2" fill="currentColor"></circle><circle cx="182" cy="122" r="2" fill="currentColor"></circle><circle cx="2" cy="142" r="2" fill="currentColor"></circle><circle cx="22" cy="142" r="2" fill="currentColor"></circle><circle cx="42" cy="142" r="2" fill="currentColor"></circle><circle cx="62" cy="142" r="2" fill="currentColor"></circle><circle cx="82" cy="142" r="2" fill="currentColor"></circle><circle cx="102" cy="142" r="2" fill="currentColor"></circle><circle cx="122" cy="142" r="2" fill="currentColor"></circle><circle cx="142" cy="142" r="2" fill="currentColor"></circle><circle cx="162" cy="142" r="2" fill="currentColor"></circle><circle cx="182" cy="142" r="2" fill="currentColor"></circle><circle cx="2" cy="162" r="2" fill="currentColor"></circle><circle cx="22" cy="162" r="2" fill="currentColor"></circle><circle cx="42" cy="162" r="2" fill="currentColor"></circle><circle cx="62" cy="162" r="2" fill="currentColor"></circle><circle cx="82" cy="162" r="2" fill="currentColor"></circle><circle cx="102" cy="162" r="2" fill="currentColor"></circle><circle cx="122" cy="162" r="2" fill="currentColor"></circle><circle cx="142" cy="162" r="2" fill="currentColor"></circle><circle cx="162" cy="162" r="2" fill="currentColor"></circle><circle cx="182" cy="162" r="2" fill="currentColor"></circle><circle cx="2" cy="182" r="2" fill="currentColor"></circle><circle cx="22" cy="182" r="2" fill="currentColor"></circle><circle cx="42" cy="182" r="2" fill="currentColor"></circle><circle cx="62" cy="182" r="2" fill="currentColor"></circle><circle cx="82" cy="182" r="2" fill="currentColor"></circle><circle cx="102" cy="182" r="2" fill="currentColor"></circle><circle cx="122" cy="182" r="2" fill="currentColor"></circle><circle cx="142" cy="182" r="2" fill="currentColor"></circle><circle cx="162" cy="182" r="2" fill="currentColor"></circle><circle cx="182" cy="182" r="2" fill="currentColor"></circle></svg>                </div>

                            <!-- Card -->
                            <div class="card card-sm rounded-top-start rounded-bottom-end aos-init aos-animate" data-aos="fade-up">

                            <!-- Image -->
                            <img class="card-img-top rounded-top-start" src="/images/employee-header-1.jpg" alt="...">

                            

                            <!-- Body -->
                            <div class="card-body text-center mt-n11">

                                <!-- Avatar -->
                                <div class="avatar avatar-xl mb-3">
                                  <img v-if="job.user_image!=null" class="avatar-img rounded-circle border-5 border-white" :src="job.user_image" alt="...">
                                  <div v-else class="avatar-img rounded-circle border-5 border-white job-name-thumb" :style="{
                                    backgroundColor: `${job.user_thumb_alt_color}`
                                  }">
                                    {{ job.user_thumb_alt }}
                                  </div>
                                </div>

                                <!-- Heading -->
                                <h4 class="font-sans-serif mb-0">
                                <a :href="baseUrl+'/profile/'+job.user_slug"> {{job.user_name }} </a>
                                </h4>

                                <!-- Text -->
                                <p class="fs-sm text-muted mt-n1 mb-5">
                                <a :href="baseUrl+'/job/'+job.slug">{{ job.title }}</a>
                                </p>

                                <!-- Blockquote -->
                                <blockquote class="mb-5">
                                <q class="fs-lg" v-html="limitJobDesc(job.description,job.slug)">
                                </q>
                                </blockquote>

                                <!-- Divider -->
                                <hr class="my-5" style="max-width: 60px;">

                                <!-- Link -->
                                <a class="h6 text-uppercase text-decoration-none" :href="baseUrl+'/job/'+job.slug" style="color: #6658ea;">
                                Hire now
                                </a>

                            </div>

                            </div>

                    </div>

                    <!-- Card -->
                    <div :key="i" class="card card-sm rounded-top-start rounded-bottom-end mt-5 aos-init aos-animate" data-aos="fade-up" v-if="i==1">

                        <!-- Image -->
                        <img class="card-img-top rounded-top-start" src="/images/employee-header-2.jpg" alt="...">

                        <!-- Body -->
                        <div class="card-body text-center mt-n11">

                        <!-- Avatar -->
                        <div class="avatar avatar-xl mb-3">
                            <img v-if="job.user_image!=null" class="avatar-img rounded-circle border-5 border-white" :src="job.user_image" alt="...">
                            <div v-else class="avatar-img rounded-circle border-5 border-white job-name-thumb" :style="{
                              backgroundColor: `${job.user_thumb_alt_color}`
                            }">
                              {{ job.user_thumb_alt }}
                            </div>
                        </div>

                        <!-- Heading -->
                        <h4 class="font-sans-serif mb-0">
                            <a :href="baseUrl+'/profile/'+job.user_slug"> {{job.user_name }} </a>
                        </h4>

                        <!-- Text -->
                        <p class="fs-sm text-muted mt-n1 mb-5">
                            <a :href="baseUrl+'/job/'+job.slug">{{ job.title }}</a>
                        </p>

                        <!-- Blockquote -->
                        <blockquote class="mb-5">
                            <q class="fs-lg" v-html="limitJobDesc(job.description,job.slug)"></q>
                        </blockquote>

                        <!-- Divider -->
                        <hr class="my-5" style="max-width: 60px;">

                        <!-- Link -->
                        <a class="h6 text-uppercase text-decoration-none" :href="baseUrl+'/job/'+job.slug" style="color: #6658ea;">
                            Hire now
                        </a>

                        </div>

                    </div>
                </template>


            </div>
                <!-- Mittle Cards -->
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mt-md-15">
            <template v-for="(job,i) in latestJobs2">
              <!-- Card -->
              <div :key="i" class="card card-sm rounded-top-start rounded-bottom-end mt-5 aos-init aos-animate" data-aos="fade-up" v-if="i==2">

                <!-- Image -->
                <img class="card-img-top rounded-top-start" src="/images/employee-header-1.jpg" alt="office">

                <!-- Body -->
                <div class="card-body text-center mt-n11">

                  <!-- Avatar -->
                  <div class="avatar avatar-xl mb-3">
                    <img v-if="job.user_image!=null" class="avatar-img rounded-circle border-5 border-white" :src="job.user_image" alt="...">
                    <div v-else class="avatar-img rounded-circle border-5 border-white job-name-thumb" :style="{
                      backgroundColor: `${job.user_thumb_alt_color}`
                    }">
                      {{ job.user_thumb_alt }}
                    </div>
                  </div>

                  <!-- Heading -->
                  <h4 class="font-sans-serif mb-0">
                    <a :href="baseUrl+'/profile/'+job.user_slug"> {{job.user_name }} </a>
                  </h4>

                  <!-- Text -->
                  <p class="fs-sm text-muted mt-n1 mb-5">
                    <a :href="baseUrl+'/job/'+job.slug">{{ job.title }}</a>
                  </p>

                  <!-- Blockquote -->
                  <blockquote class="mb-5">
                    <q class="fs-lg" v-html="limitJobDesc(job.description,job.slug)"></q>
                  </blockquote>

                  <!-- Divider -->
                  <hr class="my-5" style="max-width: 60px;">

                  <!-- Link -->
                  <a class="h6 text-uppercase text-decoration-none" :href="baseUrl+'/job/'+job.slug" style="color: #6658ea;">
                    Hire now
                  </a>

                </div>

              </div>

              <!-- Card -->
              <div :key="i" class="card card-sm rounded-top-start rounded-bottom-end mt-5 d-none d-md-block aos-init aos-animate" data-aos="fade-up" v-if="i==3">

                <!-- Image -->
                <img class="card-img-top rounded-top-start" src="/images/employee-header-1.jpg" alt="...">

                <!-- Body -->
                <div class="card-body text-center mt-n11">

                  <!-- Avatar -->
                  <div class="avatar avatar-xl mb-3">
                    <img v-if="job.user_image!=null" class="avatar-img rounded-circle border-5 border-white" :src="job.user_image" alt="...">
                    <div v-else class="avatar-img rounded-circle border-5 border-white job-name-thumb" :style="{
                      backgroundColor: `${job.user_thumb_alt_color}`
                    }">
                      {{ job.user_thumb_alt }}
                    </div>
                  </div>

                  <!-- Heading -->
                  <h4 class="font-sans-serif mb-0">
                    <a :href="baseUrl+'/profile/'+job.user_slug"> {{job.user_name }} </a>
                  </h4>

                  <!-- Text -->
                  <p class="fs-sm text-muted mt-n1 mb-5">
                    <a :href="baseUrl+'/job/'+job.slug">{{ job.title }}</a>
                  </p>

                  <!-- Blockquote -->
                  <blockquote class="mb-5">
                      <q class="fs-lg" v-html="limitJobDesc(job.description,job.slug)"></q>
                  </blockquote>

                  <!-- Divider -->
                  <hr class="my-5" style="max-width: 60px;">

                  <!-- Link -->
                  <a class="h6 text-uppercase text-decoration-none" :href="baseUrl+'/job/'+job.slug" style="color: #6658ea;">
                    Hire now
                  </a>

                </div>

              </div>
            </template>

            <div class="wt-btnarea text-center" data-aos="fade-up" style="position: absolute;margin-top: 7rem;">
                            <a :href="baseUrl+'/search-results?type=job'" class="btn btn-primary shadow-none lift" v-if="current_page < last_page" @click="loadJobs">{{trans("lang.load_more")}}</a>
                        </div>
                        
            </div>


                <!-- Right Cards -->
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 align-self-center">

            <template v-for="(job,i) in latestJobs2">
              <!-- Card -->
              <div :key="i" class="card card-sm rounded-top-start rounded-bottom-end mt-5 d-none d-md-block aos-init aos-animate" data-aos="fade-up" v-if="i==4">

                <!-- Image -->
                <img class="card-img-top rounded-top-start" src="/images/employee-header-1.jpg" alt="...">

                <!-- Body -->
                <div class="card-body text-center mt-n11">

                  <!-- Avatar -->
                  <div class="avatar avatar-xl mb-3">
                    <img v-if="job.user_image!=null" class="avatar-img rounded-circle border-5 border-white" :src="job.user_image" alt="...">
                    <div v-else class="avatar-img rounded-circle border-5 border-white job-name-thumb" :style="{backgroundColor: `${job.user_thumb_alt_color}`}">
                      {{ job.user_thumb_alt }}
                    </div>
                  </div>

                  <!-- Heading -->
                  <h4 class="font-sans-serif mb-0">
                    <a :href="baseUrl+'/profile/'+job.user_slug"> {{job.user_name }} </a>
                  </h4>

                  <!-- Text -->
                  <p class="fs-sm text-muted mt-n1 mb-5">
                    <a :href="baseUrl+'/job/'+job.slug">{{ job.title }}</a>
                  </p>

                  <!-- Blockquote -->
                  <blockquote class="mb-5">
                    <q class="fs-lg" v-html="limitJobDesc(job.description,job.slug)"></q>
                  </blockquote>

                  <!-- Divider -->
                  <hr class="my-5" style="max-width: 60px;">

                  <!-- Link -->
                  <a class="h6 text-uppercase text-decoration-none" :href="baseUrl+'/job/'+job.slug" style="color: #6658ea;">
                    Hire now
                  </a>

                </div>

              </div>
            </template>

            </div>

          </div>
        </div>
    </section>
</template>

<style scoped>
  .fs-lg a{
    color: grey;
  }
</style>

<script>
import carousel from 'vue-owl-carousel'

export default {
    props:['parent_index', 'element_id', 'jobs', 'pageID'],
    components:{carousel},
    data() {
        return {
            job:{},
            latestJobs:[],
            latestJobs2:[],
            isActive:false,
            baseUrl: APP_URL,
            tempUrl:APP_URL+'/uploads/pages/temp/',
            imageUrl:APP_URL+'/uploads/pages/'+this.pageID+'/',
            page: 1,
            pageSize: 5,
            last_page: 0,
            current_page: 0,
            is_loading:false
        }
    },
    computed: {
        sectionStyle() {
            return {
                padding: this.job.padding ? `${this.job.padding.top}${this.job.padding.unit} ${this.job.padding.right}${this.job.padding.unit} ${this.job.padding.bottom}${this.job.padding.unit} ${this.job.padding.left}${this.job.padding.unit}` : '',
                margin: this.job.margin ? `${this.job.margin.top}${this.job.margin.unit} ${this.job.margin.right}${this.job.margin.unit} ${this.job.margin.bottom}${this.job.margin.unit} ${this.job.margin.left}${this.job.margin.unit}` : '',
                'text-align': this.job.alignment,
                background: this.job.sectionColor
            }
        },
        contentSectionStyle() {
            return {
                background:this.job.contentBackground,
                color:this.job.contentColor
            }
        },
    },
    updated: function() {
        var index = this.getArrayIndex(this.jobs, 'id', this.element_id)
        if (this.job[index]) {
            this.job = this.job[index]
        }
        this.job.id = this.element_id
    },
    methods:{
        mouseOver () {
             $(".wt-latestjobs ul li").hover(function() {
                $(this).addClass('active')
                    .siblings().removeClass('active')
            });
        },
        loadJobs: function () {
            this.page+=1;
            this.getLatestJobs(this.page, this.pageSize, true);
        },
        getLatestJobs: function(page, per_page, load_more) {
            var self = this;
            if (load_more) {
                self.is_loading = true
                $('.wt-btnarea').addClass('wt-btnloader')
            }
            axios
            .post(APP_URL + "/get-latest-jobs", {
                page: page,
                per_page: per_page
            })
            .then(function(response) {
                if (response.data.type == "success") {
                    if (load_more) {
                         response.data.jobs.forEach(element => {
                             self.latestJobs.push(element)
                             self.latestJobs2.push(element);
                        });
                        // self.latestJobs = response.data.jobs;
                        // self.is_loading = false;
                        // $('.wt-btnarea').removeClass('wt-btnloader');
                        self.is_loading = false
                        $('.wt-btnarea').removeClass('wt-btnloader')
                    } else {
                        self.latestJobs = response.data.jobs
                        self.latestJobs2 = response.data.jobs;
                        setTimeout(function() {

                            if ($('.wt-latestjobs ul li:nth-child(2)')) {
                                $('.wt-latestjobs ul li:nth-child(2)').addClass("active")
                            }
                        },1000)
                    }
                    self.current_page = response.data.current_page
                    self.last_page = response.data.last_page
                } else{
                    $('.wt-btnarea').hide();
                }
            })
            .catch(function(error) {  
                console.error(error.response.data)
            });
        },
        add_wishlist: function (element_id, id, column, saved_text) {
            var self = this;
            axios.post(APP_URL + '/user/add-wishlist', {
                id: id,
                column: column,
            })
                .then(function (response) {
                    if (response.data.authentication == true) {
                        if (column == 'saved_jobs') {
                            jQuery('#' + element_id).addClass('wt-btndisbaled');
                            jQuery('#' + element_id).addClass('liked');
                        }
                        if (column == 'saved_employers') {
                            self.disable_follow = 'wt-btndisbaled';
                            self.follow_text = saved_text;
                        }
                        self.showMessage(response.data.message);
                    } else {
                        self.showError(response.data.message);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        limitJobDesc(desc,slug){
            let limitedText = null;
            // Default limit is 140 characters
            let JobUrl =  this.baseUrl+"/job/"+slug;
            if(desc.length > 140){
                 limitedText = desc.substring(0,140-3) + " ... "+`<a href="${JobUrl}">mehr</a>`;
            }
            else{
                limitedText = desc;
            }

            return limitedText;
        }
    },
    created: function () {
        var self = this
        setTimeout(function(){ 
            var index = self.getArrayIndex(self.jobs, 'id', self.element_id)
            if (self.jobs[index]) {
                self.job = self.jobs[index]
            }
        }, 100);
        this.getLatestJobs(this.page, this.pageSize, false)
    },
};
</script>
