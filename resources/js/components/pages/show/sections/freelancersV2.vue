<template>
  <section class="d-flex flex-column justify-content-center pt-10 pb-10" v-if="isLoggedIn == 'true'">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <!-- Divider -->
          <hr class="hr-sm bg-warning mx-auto mb-10 mb-md-12">
          <h2 class="display-4 text-center mb-4" data-aos="fade-up">{{freelancer.title}}
            <span class="text-underline-warning" style="background-image: linear-gradient(90deg,rgba(104,125,237,.2),rgba(104,125,237,.2));">{{freelancer.titleTwo}}</span>
          </h2>
          <div class="mb-5 font-weight-light text-center text-muted h5 DM-Sans" v-if="freelancer.description" v-html="freelancer.description" data-aos="fade-right"></div>
        </div>
      </div>
    </div>
    <div class="container mb-5 pb-3 pb-lg-0 mb-lg-7">
      <div class="row">
        <div class="card overflow-hidden card-hover shadow mx-auto mt-3" v-for="(freelancer, index) in topFreelancers" :key="index">
          <a class="card-floating-icon" :href="baseUrl+'/profile/'+freelancer.slug">
            <i class="material-symbols-outlined">mail</i>
          </a>
          <div class="mx-auto">
            <img :src="freelancer.image" alt="Freelancer Profile Image">
          </div>
          <div class="card-body text-center">
            <h3 class="h6 mb-2">{{freelancer.name}}</h3>
            <p class="mb-0" v-html="limitJobDesc(freelancer.tagline)">{{freelancer.tagline}}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
  .DM-Sans {
    font-family: "DM Sans", sans-serif;
  }
  .card{
    border-radius: 0.75rem;
  }
  .card-body {
    min-height: auto;
  }
</style>
<script>
  // import Event from '../../../event'
  import carousel from 'vue-owl-carousel'
  export default {
    props: ['parent_index', 'element_id', 'freelancers', 'pageID'],
    components: {
      carousel
    },
    data() {
      const isLoggedIn = this.$isLoggedIn;
      return {
        freelancer: {},
        topFreelancers: [],
        isLoggedIn:isLoggedIn,
        isActive: false,
        baseUrl: APP_URL,
        tempUrl: APP_URL + '/uploads/pages/temp/',
        imageUrl: APP_URL + '/uploads/pages/' + this.pageID + '/',
        filtersApplied: false,
        auth: false,
      }
    },
    computed: {
      sectionStyle() {
        return {
          padding: this.freelancer.padding ? `${this.freelancer.padding.top}${this.freelancer.padding.unit} ${this.freelancer.padding.right}${this.freelancer.padding.unit} ${this.freelancer.padding.bottom}${this.freelancer.padding.unit} ${this.freelancer.padding.left}${this.freelancer.padding.unit}` : '',
          margin: this.freelancer.margin ? `${this.freelancer.margin.top}${this.freelancer.margin.unit} ${this.freelancer.margin.right}${this.freelancer.margin.unit} ${this.freelancer.margin.bottom}${this.freelancer.margin.unit} ${this.freelancer.margin.left}${this.freelancer.margin.unit}` : '',
          'text-align': this.freelancer.alignment,
          background: this.freelancer.sectionColor
        }
      },
      contentSectionStyle() {
        return {
          background: this.freelancer.contentBackground,
          color: this.freelancer.contentColor
        }
      },
    },
    updated: function() {
      var index = this.getArrayIndex(this.freelancers, 'id', this.element_id)
      if (this.freelancer[index]) {
        this.freelancer = this.freelancer[index]
      }
      this.freelancer.id = this.element_id
    },
    mounted: function() {
      this.isActive = false
      var self = this
      Event.$on('freelancer-sectionV2-update', (data) => {
        setTimeout(function() {
          self.isActive = !self.isActive;
        }, 10);
      })
    },
    methods: {
      add_wishlist: function(element_id, id, column, saved_text) {
        var self = this;
        axios.post(APP_URL + '/user/add-wishlist', {
          id: id,
          column: column,
        }).then(function(response) {
          if (response.data.authentication == true) {
            if (response.data.type == 'success') {
              if (column == 'saved_freelancer') {
                jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                jQuery('#' + element_id).addClass('wt-liked');
                jQuery('#' + element_id).find('.save_text').text(Vue.prototype.trans('lang.saved'));
              }
              self.showMessage(response.data.message);
            } else {
              self.showError(response.data.message);
            }
          } else {
            self.showError(response.data.message);
          }
        }).catch(function(error) {
          console.log(error);
        });
      },
      getTopFreelancers: function() {
        var self = this;
        axios.get(APP_URL + "/get-all-freelancers").then(function(response) {
          if (response.data.type == "success") {
            self.topFreelancers = response.data.freelancers
            self.filtersApplied = true
          }
        }).catch(function(error) {});
      },
      getAuth: function() {
        var self = this;
        axios.get(APP_URL + "/check-auth").then(function(response) {
          self.auth = response.data.auth;
        }).catch(function(error) {
          console.error(error);
        });
      },
      limitJobDesc(tagline) {
        let limitedText = null;
        // Default limit is 140 characters
        if (tagline.length > 30) {
          limitedText = tagline.substring(0, 30 - 3) + " ... ";
        } else {
          limitedText = tagline;
        }
        return limitedText;
      }
    },
    created: function() {
      var self = this
      setTimeout(function() {
        var index = self.getArrayIndex(self.freelancers, 'id', self.element_id)
        if (self.freelancers[index]) {
          self.freelancer = self.freelancers[index]
        }
      }, 100);
      this.getTopFreelancers()
      this.getAuth()
    },
  };
</script>