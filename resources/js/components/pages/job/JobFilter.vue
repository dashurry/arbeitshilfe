<template>
  <div class="container">
    <div class="row">
      <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="p-3">
          <div id="dismiss">
            <i class="material-symbols-outlined">arrow_back</i>
          </div>
            <form>
                <ul class="list-unstyled components">
                <!-- Search Filter Block -->
                <h5 class="font-weight-normal text-dark">Start Search</h5>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="s" placeholder="Jobs suchen..." v-model="filterForm.keyword">
                </div>
                <!-- Categories Filter Block -->
                <h5 class="font-weight-normal text-dark">Categories</h5>
                <div class="form-group">
                    <multiselect v-model="filterForm.ctgs" :options="categories" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Nach Kategorie filtern" label="title" track-by="id" :hideSelected="true" @input="filterJob"></multiselect>
                </div>
                <!-- Locations Checkboxes Ouer -->
                <h5 class="font-weight-normal text-dark">Locations</h5>
                <div class="form-group">
                    <multiselect v-model="filterForm.locations" :options="locations" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Nach Standorten filtern" label="title" track-by="id" :hideSelected="true" @input="filterJob"></multiselect>
                </div>
                <!-- Project Checkboxes -->
                <div class="mb-4">
                    <h5 class="font-weight-normal text-dark">{{ trans('lang.project_length') }}</h5>
                    <ul class="checkboxes">
                    <li v-for="(length,i) in project_length" :key="i">
                        <input :id="`key-${i}`" type="checkbox" name="lengths" :value="i" v-model="filterForm.projectLengths" @change="filterJob">
                        <label :for="`key-${i}`">{{ length }}</label>
                    </li>
                    </ul>
                </div>
                <!-- Duration Checkboxes -->
                <div class="mb-4">
                    <h5 class="font-weight-normal text-dark">Datum der Veröffentlichung</h5>
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
                </ul>
            </form>
        </nav>
        <!-- Page Content  -->
        <div id="content">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
              </button>
            </div>
          </nav>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="mb-3">
          <span>
            <strong class="text-muted">{{ filteredJobs.length }}</strong> of <strong class="text-muted">{{ jobData.total }}</strong> results </span>
        </div>
        <template v-if="filterLoading">
          <div class="spinner">
            <span class="loader-job"></span>
          </div>
        </template>
        <template v-else>
          <!-- Job Block -->
          <div class="card mb-3" v-for="(job,i) in filteredJobs" :key="i">
            <span v-if="job.is_feature=='true'" class="wt-featuredtag">
              <img src="/images/featured.png" alt="" data-tipso="Plus Member" class="template-content tipso_style">
            </span>
            <div class="card-body">
              <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12">
                  <img src="https://creativelayers.net/themes/superio/images/resource/company-logo/1-2.png" alt="" class="img-fluid mb-3">
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                  <a :href="`/profile/${job.employer.slug}`" class="d-flex align-items-center">
                    <i class="material-symbols-outlined">verified</i> {{ job.employer.first_name +" "+ job.employer.last_name }}
                  </a>
                  <p style="font-size: 12px; color: #a7a7a7;">Member Since: {{ moment(job.employer.created_at).format("MMMM YYYY") }}</p>
                  <h4 class="mt-3">
                    <a :href="`/job/${job.slug}`">{{ job.title }}</a>
                  </h4>
                  <p>{{ job.description }}</p>
                  <ul class="d-flex mb-3">
                    <li class="d-flex align-items-center mr-3">
                      <i class="material-symbols-outlined mr-2">date_range</i>
                      <vue-moment-ago prefix="" suffix="ago" :date="job.created_at" lang="en" />
                    </li>
                    <li class="d-flex align-items-center mr-3" v-if="job.price!=null || job.price > 0">
                      <span class="material-symbols-outlined mr-2">payments</span> {{ job.price }} Fr
                    </li>
                    <li class="d-flex align-items-center" v-else>
                      <i class="material-symbols-outlined mr-2">payments</i> Open
                    </li>
                  </ul>
                  <ul class="d-flex justify-content-around flex-wrap align-items-center">
                    <li v-if="job.project_level != ''" class="privacy">
                      <i class="material-symbols-outlined">payments</i> {{ job.project_level }}
                    </li>
                    <li class="mb-2 d-flex align-items-center badge badge-primary badge-pill">
                      <i class="material-symbols-outlined">home_pin</i> {{ job.location.title }}
                    </li>
                    <li class="mb-2 d-flex align-items-center badge badge-pill badge-warning">
                      <i class="material-symbols-outlined">schedule</i> {{ job.duration }}
                    </li>
                    <li class="mb-2 d-flex align-items-center badge badge-pill badge-danger">
                      <i class="material-symbols-outlined">fingerprint</i> {{ trans('lang.job_id') }} - {{ job.code }}
                    </li>
                    <li v-for="(cat,i) in job.categories" :key="i" class="mb-2 d-flex align-items-center badge badge-pill badge-success">
                      <i class="material-symbols-outlined">layers</i>{{ cat.name }}
                    </li>
                  </ul>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12">
                  <button @click.prevent="addWishList($event,job.id,'saved_jobs')">
                    <span class="fa-heart" :class="my_saved_jobs.includes(job.id)?'fas text-danger':'far'"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
                <div class="text-center" v-if="loadingJobs">
                    <div class="spinner-border text-info" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Listing Show More -->
                <div class="col-6">
                    <div class="ls-show-more d-flex flex-column align-items-center mt-5">
                        <p>Zeigt {{ filteredJobs.length }} von {{ jobData.total }} Jobs</p>
                            <div class="progress mb-3" style="width: 100%;">
                                <div class="progress-bar" role="progressbar" :style="`width: ${progressWidth}%`" :aria-valuenow="'${progressWidth}'" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        <button v-if="nextPage != null" @click="showMoreData()" class="btn btn-link shadow-none">Mehr anzeigen</button>
                    </div>
                </div>
          </div>
        </template>
      </div>
    </div>
  </div>
</template>
<style scoped>
#sidebar {
    width: 300px;
    left: -300px;
}
#sidebar.active {
    left: 0;
}
</style>
<script>
  import Multiselect from 'vue-multiselect';
  import VueMomentAgo from 'vue-moments-ago';
  export default {
    components: {
      Multiselect,
      VueMomentAgo,
    },
    props: {
      categories: Array,
      locations: Array,
      skills: Array,
      project_length: Object,
      jobs: Object,
      my_saved_jobs: Array,
    },
    data() {
      return {
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
        filteredJobs: this.jobs.data,
        nextPage: this.jobs.last_page == this.jobs.current_page ? null : this.jobs.current_page + 1,
        loadingJobs: false,
        filterLoading: false,
        value: [],
        moment: moment,
      }
    },
    computed: {
      progressWidth: function() {
        let percentage = (this.filteredJobs.length * 100) / this.jobs.total;
        return percentage;
      }
    },
    methods: {
      showMoreData() {
        this.loadingJobs = true;
        axios.get("/search-results", {
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
        }).then(resp => {
          return resp.data;
        }).then(data => {
          data.data.forEach(element => {
            this.filteredJobs.push(element);
          });
          this.jobData = data;
          this.nextPage = this.jobData.last_page == this.jobData.current_page ? null : this.jobData.current_page + 1;
          this.loadingJobs = false;
        }).catch(err => {
          console.error(err.response.data);
        })
      },
      filterJob() {
        this.filterLoading = true;
        axios.get("/search-results", {
          params: {
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
        }).then(resp => {
          return resp.data;
        }).then(data => {
          console.log(data);
          this.jobData = data;
          this.filteredJobs = data.data;
          this.nextPage = this.jobData.last_page == this.jobData.current_page ? null : this.jobData.current_page + 1;
          this.filterLoading = false;
        }).catch(err => {
          console.error(err.response.data);
        });
      },
      addWishList(e, jobId, type) {
        var btn = e.currentTarget;
        var child = btn.children[0];
        if (child.classList.contains("far")) {
          child.classList.remove("far");
          child.classList.add("fas", "text-danger");
        } else if (child.classList.contains("fas")) {
          child.classList.remove("fas", "text-danger");
          child.classList.add("far");
        }
        axios.post("/job/add-wishlist", {
          id: jobId,
          column: type,
        }).then(resp => {
          return resp.data;
        }).then(data => {
          if (data.type == "success") {
            this.toggleWishList(jobId);
          }
        }).catch(err => {
          console.error(err.response.data);
        })
      },
      toggleWishList(jobId) {
        if (this.my_saved_jobs.includes(jobId)) {
          let index = this.my_saved_jobs.indexOf(jobId);
          if (index > -1) {
            this.my_saved_jobs.splice(index, 1);
          }
        } else {
          this.my_saved_jobs.push(jobId);
        }
      }
    },
  }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
  /* .multiselect__tags {
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
} */
</style>