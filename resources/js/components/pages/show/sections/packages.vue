<template>
    <section class="pt-10 pb-10">
    <!-- <section 
        :class="pkg.sectionClass + ' wt-main-section wt-packages-wrap'"
        :id="pkg.sectionId" 
        :style="sectionStyle"
        v-if="Object.entries(pkg).length != 0"
    >
        <div class="wt-overlay-5" :style="[pageID ?
                {'background-image': 'url('+imageUrl+pkg.backgroundImg+')'} : '']"></div> -->
      
        <div class="container-lg">
          <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

              <!-- Divider -->
              <hr class="hr-sm bg-warning mx-auto mb-10 mb-md-12">

              <!-- Heading -->
              <h2 class="display-3 mb-4">
                Pricing made <span class="text-underline-warning" style="background-image: linear-gradient(90deg,rgba(245,192,112,.4),rgba(245,192,112,.4));">simple</span>.
              </h2>

              <!-- Text -->
              <p class="mb-9">
                Bootstrap Themes pricing model is fairly simple. Here's a look at the prices specifically for Goodkit on the marketplace.
              </p>

            </div>
          </div>
          <div class="row mt-n6">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <template v-for="(pkgItem, index) in topPackages">
                    <!-- Card -->
                    <div class="card rounded-top-start-3 rounded-bottom-end-3 mt-6" v-if="index==0" :key="index">
                        <div class="card-body">

                        <!-- Preheading -->
                        <h6 class="text-center text-uppercase text-warning">
                            Standard
                        </h6>

                        <!-- Price -->
                        <p class="display-5 fw-bold text-center">
                            <span class="fs-3 align-middle">$</span>
                            <span class="mx-n2">49</span>
                            <span class="fs-2 align-middle">/mo </span>
                        </p>

                        <!-- List -->
                        <ul class="list-checked list-checked-warning">
                            <li class="mb-3">
                            Use on one site
                            </li>
                            <li class="mb-3">
                            Lifetime updates
                            </li>
                            <li>
                            Technical support
                            </li>
                        </ul>

                        <!-- Button -->
                        <a class="btn w-100 btn-gray-300 shadow-none lift" :href="baseUrl+'/user/package/checkout/' + pkgItem.id" target="_blank" v-if="role !== 'admin'" >
                            Purchase
                        </a>

                        </div>
                    </div>
                </template>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <template v-for="(pkgItem, index) in topPackages">
                    <!-- Card -->
                    <div class="card rounded-top-start-3 rounded-bottom-end-3 mt-6" v-if="index==1" :key="index">
                        <div class="card-body">

                        <!-- Preheading -->
                        <h6 class="text-center text-uppercase text-warning">
                            Multisite
                        </h6>

                        <!-- Price -->
                        <p class="display-4 fw-bold text-center">
                            <span class="fs-3 align-middle">$</span>
                            <span class="mx-n2">149</span>
                            <span class="fs-2 align-middle">/mo </span>
                        </p>

                        <!-- List -->
                        <ul class="list-checked list-checked-warning">
                            <li class="mb-3">
                            Unlimited sites
                            </li>
                            <li class="mb-3">
                            Client use allowed
                            </li>
                            <li class="mb-3">
                            Lifetime updates
                            </li>
                            <li>
                            Technical support
                            </li>
                        </ul>

                        <!-- Button -->
                        <a class="btn w-100 btn-primary lift" :href="baseUrl+'/user/package/checkout/' + pkgItem.id" target="_blank" v-if="role !== 'admin'">
                            Purchase
                        </a>

                        </div>
                    </div>
                </template>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <template v-for="(pkgItem, index) in topPackages">
                    <!-- Card -->
                    <div class="card rounded-top-start-3 rounded-bottom-end-3 mt-6" v-if="index==2" :key="index">
                        <div class="card-body">

                        <!-- Preheading -->
                        <h6 class="text-center text-uppercase text-warning">
                            Extended
                        </h6>

                        <!-- Price -->
                        <p class="display-4 fw-bold text-center">
                            <span class="fs-3 align-middle">$</span>
                            <span class="mx-n2">499</span>
                            <span class="fs-2 align-middle">/mo </span>
                        </p>

                        <!-- List -->
                        <ul class="list-checked list-checked-warning">
                            <li class="mb-3">
                            Use on one site
                            </li>
                            <li class="mb-3">
                            Paying users allowed
                            </li>
                            <li class="mb-3">
                            Client use allowed
                            </li>
                            <li class="mb-3">
                            Lifetime updates
                            </li>
                            <li>
                            Technical support
                            </li>
                        </ul>

                        <!-- Button -->
                        <a class="btn w-100 btn-gray-300 shadow-none lift" :href="baseUrl+'/user/package/checkout/' + pkgItem.id" target="_blank" v-if="role !== 'admin'">
                            Purchase
                        </a>

                        </div>
                    </div>
                </template>
            </div>
          </div>
        </div>
    </section>
</template>
<script>
// import Event from '../../../event'
import carousel from 'vue-owl-carousel'

export default {
    props:['parent_index', 'element_id', 'packages', 'pageID', 'role'],
    components:{carousel},
    data() {
        return {
            pkg:{},
            topPackages:[],
            package_options:[],
            roleType:false,
            isActive:false,
            baseUrl: APP_URL,
            tempUrl:APP_URL+'/uploads/pages/temp/',
            imageUrl:APP_URL+'/uploads/pages/'+this.pageID+'/',
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
                background:this.pkg.contentBackground,
                color:this.pkg.contentColor
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
        var self= this
        Event.$on('pkg-section-update', (data) => {
            setTimeout(function(){ 
                self.isActive = !self.isActive;
            }, 10);
        })
    },
    methods:{
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
            axios
            .get(APP_URL + '/get-top-packages/' + role)
            .then(function(response) {
                if (response.data.type == "success") {
                    self.topPackages = response.data.packages
                    self.package_options = response.data.package_options
                }
            })
            .catch(function(error) {  });
        }
    },
    created: function() {
        var self = this
        setTimeout(function(){ 
            var index = self.getArrayIndex(self.packages, 'id', self.element_id)
            if (self.packages[index]) {
                self.pkg = self.packages[index]
            }
        }, 100);
        this.getPackages()
    },
};
</script>
