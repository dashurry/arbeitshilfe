<template>
  <section class="d-flex justify-content-center align-items-center pt-10 pb-10">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
          <!-- Divider -->
          <hr class="hr-sm bg-warning mx-auto mb-10 mb-md-12" data-aos="fade-up">
          <!-- Heading -->
          <h2 class="display-3 mb-4" data-aos="fade-left"> Pricing made <span class="text-underline-warning" style="background-image: linear-gradient(90deg,rgba(245,192,112,.4),rgba(245,192,112,.4));">simple</span>. </h2>
          <!-- Text -->
          <p class="mb-9" data-aos="fade-left"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio repudiandae ipsum earum, sit molestias commodi voluptatum vero nemo cum dolorum? Adipisci amet inventore obcaecati quibusdam, minima possimus eum ad porro?</p>
        </div>
      </div>
      <div class="row mt-n6">
        <template v-for="(pkgItem, index) in topPackages">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" :key="index" data-aos="fade-in" data-aos-delay="400">
            <!-- Card -->
            <div class="card rounded-top-start-3 rounded-bottom-end-3 mt-6">
              <div class="card-body text-center">
                <!-- Preheading -->
                <h6 class="text-center text-uppercase text-warning"> {{ pkgItem.title }} </h6>
                <!-- Price -->
                <p class="display-5 fw-bold text-center">
                  <span class="fs-3 align-middle">$</span>
                  <span class="mx-n2">{{ pkgItem.cost }}</span>
                  <span class="fs-2 align-middle">/mo </span>
                </p>
                <!-- List -->
                <ul class="list-checked list-checked-warning">
                  <li class="mb-3 d-flex align-items-center" v-if="pkgItem.options.no_of_connects">
                    <i class="material-symbols-outlined mr-2 text-warning font-weight-bold">check</i>{{ pkgItem.options.no_of_connects }}
                  </li>
                  <li class="mb-3 d-flex align-items-center" v-if="pkgItem.options.no_of_services">
                    <i class="material-symbols-outlined mr-2 text-warning font-weight-bold">check</i>{{ pkgItem.options.no_of_services }} 
                    </li>
                  <li class="mb-3 d-flex align-items-center" v-if="pkgItem.options.no_of_featured_services">
                    <i class="material-symbols-outlined mr-2 text-warning font-weight-bold">check</i>{{ pkgItem.options.no_of_featured_services }} 
                  </li>
                  <li class="mb-3 d-flex align-items-center" v-if="pkgItem.options.no_of_skills">
                    <i class="material-symbols-outlined mr-2 text-warning font-weight-bold">check</i>{{ pkgItem.options.no_of_skills }} 
                  </li>
                  <li class="mb-3 d-flex align-items-center" v-if="pkgItem.options.duration">
                    <i class="material-symbols-outlined mr-2 text-warning font-weight-bold">check</i>{{ pkgItem.options.duration }}
                  </li>
                </ul>
                <!-- Button -->
                <b-button v-if="role !== 'admin' && isLoggedIn =='true'" variant="outline-dark" class="w-50  lift" :href="baseUrl+'/user/package/checkout/' + pkgItem.id" target="_blank"> Purchase </b-button>
                <b-button v-else class="w-50 lift" variant="outline-dark" href='#' data-target="#modalSignIn" data-toggle="modal"> Purchase </b-button>
              </div>
            </div>
          </div>
        </template>
      </div>
    </div>
  </section>
</template>
<script>
  // import Event from '../../../event'
  import carousel from 'vue-owl-carousel'
  export default {
    props: ['parent_index', 'element_id', 'packages', 'pageID', 'role'],
    components: {
      carousel
    },
    data() {
      const isLoggedIn = this.$isLoggedIn;
      return {
        pkg: {},
        topPackages: [],
        package_options: [],
        roleType: false,
        isActive: false,
        isLoggedIn: isLoggedIn,
        baseUrl: APP_URL,
        tempUrl: APP_URL + '/uploads/pages/temp/',
        imageUrl: APP_URL + '/uploads/pages/' + this.pageID + '/',
      }
    },
    computed: {
      sectionStyle() {
        return {
          padding: this.pkg.padding ? `${this.pkg.padding.top}${this.pkg.padding.unit} ${this.pkg.padding.right}${this.pkg.padding.unit} ${this.pkg.padding.bottom}${this.pkg.padding.unit} ${this.pkg.padding.left}${this.pkg.padding.unit}` : '',
          margin: this.pkg.margin ? `${this.pkg.margin.top}${this.pkg.margin.unit} ${this.pkg.margin.right}${this.pkg.margin.unit} ${this.pkg.margin.bottom}${this.pkg.margin.unit} ${this.pkg.margin.left}${this.pkg.margin.unit}` : '',
          'text-align': this.pkg.alignment,
          background: this.pkg.sectionColor
        }
      },
      contentSectionStyle() {
        return {
          background: this.pkg.contentBackground,
          color: this.pkg.contentColor
        }
      },
    },
    updated: function() {
      var index = this.getArrayIndex(this.packages, 'id', this.element_id)
      if (this.pkg[index]) {
        this.pkg = this.pkg[index]
      }
      this.pkg.id = this.element_id
    },
    mounted: function() {
      this.isActive = false
      var self = this
      Event.$on('pkg-section-update', (data) => {
        setTimeout(function() {
          self.isActive = !self.isActive;
        }, 10);
      })
    },
    methods: {
      pkgImgError: function(event) {
        event.target.src = this.baseUrl + '/images/packages.png'
      },
      editElement: function() {
        var self = this
        this.$emit("editData");
      },
      getPackages: function() {
        var self = this;
        let role = ''
        if (this.roleType) {
          role = 'employer'
        } else {
          role = 'freelancer'
        }
        axios.get(APP_URL + '/get-top-packages/' + role).then(function(response) {
          if (response.data.type == "success") {
            self.topPackages = response.data.packages
            self.package_options = response.data.package_options
          }
        }).catch(function(error) {});
      }
    },
    created: function() {
      var self = this
      setTimeout(function() {
        var index = self.getArrayIndex(self.packages, 'id', self.element_id)
        if (self.packages[index]) {
          self.pkg = self.packages[index]
        }
      }, 100);
      this.getPackages()
    },
  };
</script>