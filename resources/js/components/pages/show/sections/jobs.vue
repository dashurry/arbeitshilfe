<template>
  <section class="d-flex flex-wrap align-items-center pt-10 pb-10" v-if="isLoggedIn == 'true'">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <!-- Divider -->
          <hr class="hr-sm bg-warning mx-auto mb-10 mb-md-12">
          <!-- Heading -->
          <h2 class="display-4 mb-4 text-center" data-aos="fade-right"> Stellen Sie <span class="text-underline-warning" style="background-image: linear-gradient(90deg,rgba(245,192,112,.4),rgba(245,192,112,.4));">talentierte</span> Mitarbeiter in Stunden statt in Wochen ein. </h2>
          <!-- Text -->
          <p class="text-muted mb-9 mb-md-0 text-center" data-aos="fade-up"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna lectus, mattis non accumsan in, tempor dictum neque. In hac habitasse platea dictumst. Proin sit amet convallis enim. Sed auctor lorem id tortor dignissim, in sollicitudin odio porta. </p>
        </div>
      </div>
    </div>
      <!-- Cards -->
      <div class="container">
        <div class="row overflow-auto">
            <template v-for="(job,i) in latestJobs2">
              
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-5" :key="i">
                
                <div class="card card-hover shadow h-100 d-flex align-items-center aos-init aos-animate">
                  <div class="card-body text-center mt-n11">
                    <div class="avatar avatar-xl mb-3">
                      <img v-if="job.user_image!=null" class="avatar-img img-fluid rounded-circle border-5 border-white" :src="job.user_image" alt="...">
                      <div v-else class="avatar-img rounded-circle border-5 border-white job-name-thumb" :style="{
                                        backgroundColor: `${job.user_thumb_alt_color}`
                                      }">
                        {{ job.user_thumb_alt }}
                      </div>
                    </div>
                    <h5 class="card-title">
                      <a :href="baseUrl+'/profile/'+job.user_slug"> {{job.user_name }} </a>
                    </h5>
                    <p class="card-text mt-n1 mb-5">
                      <a class="text-dark" :href="baseUrl+'/job/'+job.slug">{{ job.title }}</a>
                    </p>
                    <blockquote class="mb-5">
                      <q class="fs-lg" v-html="limitJobDesc(job.description,job.slug)"></q>
                    </blockquote>
                    <!-- Divider -->
                    <hr class="my-5" style="max-width: 60px;">
                    <!-- Link -->
                    <!-- <a class="h6 text-uppercase text-decoration-none" :href="baseUrl+'/job/'+job.slug" style="color: #6658ea;"> Hire now </a> -->
                  </div>
                </div>
              </div>
            </template>
        </div>
    </div>
  </section>
</template>
<style scoped>
  .fs-lg a {
    color: grey;
  }
  .card{
    border-radius: 0.75rem;
  }
</style>
<script>
  import carousel from 'vue-owl-carousel'
  export default {
    props: ['parent_index', 'element_id', 'jobs', 'pageID'],
    components: {
      carousel
    },
    data() {
      const isLoggedIn = this.$isLoggedIn;
      return {
        job: {},
        latestJobs: [],
        latestJobs2: [],
        isLoggedIn:isLoggedIn,
        isActive: false,
        baseUrl: APP_URL,
        tempUrl: APP_URL + '/uploads/pages/temp/',
        imageUrl: APP_URL + '/uploads/pages/' + this.pageID + '/',
        page: 1,
        pageSize: 6,
        last_page: 0,
        current_page: 0,
        is_loading: false
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
          background: this.job.contentBackground,
          color: this.job.contentColor
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
    methods: {
      mouseOver() {
        $(".wt-latestjobs ul li").hover(function() {
          $(this).addClass('active').siblings().removeClass('active')
        });
      },
      loadJobs: function() {
        this.page += 1;
        this.getLatestJobs(this.page, this.pageSize, true);
      },
      getLatestJobs: function(page, per_page, load_more) {
        var self = this;
        if (load_more) {
          self.is_loading = true
          $('.wt-btnarea').addClass('wt-btnloader')
        }
        axios.post(APP_URL + "/get-latest-jobs", {
          page: page,
          per_page: per_page
        }).then(function(response) {
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
              }, 1000)
            }
            self.current_page = response.data.current_page
            self.last_page = response.data.last_page
          } else {
            $('.wt-btnarea').hide();
          }
        }).catch(function(error) {
          console.error(error.response.data)
        });
      },
      add_wishlist: function(element_id, id, column, saved_text) {
        var self = this;
        axios.post(APP_URL + '/user/add-wishlist', {
          id: id,
          column: column,
        }).then(function(response) {
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
        }).catch(function(error) {
          console.log(error);
        });
      },
      limitJobDesc(desc, slug) {
        let limitedText = null;
        // Default limit is 140 characters
        let JobUrl = this.baseUrl + "/job/" + slug;
        if (desc.length > 100) {
          limitedText = desc.substring(0, 100 - 3) + " ... " + `
				<a href="${JobUrl}">mehr</a>`;
        } else {
          limitedText = desc;
        }
        return limitedText;
      }
    },
    created: function() {
      var self = this
      setTimeout(function() {
        var index = self.getArrayIndex(self.jobs, 'id', self.element_id)
        if (self.jobs[index]) {
          self.job = self.jobs[index]
        }
      }, 100);
      this.getLatestJobs(this.page, this.pageSize, false)
    },
  };
</script>