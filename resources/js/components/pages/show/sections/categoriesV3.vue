<template>
  <section class="d-flex flex-wrap align-items-center pt-10 pb-10">
    <div v-if="isLoggedIn == 'false'" class="container">
      <div class="row align-items-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
          <div>
            <h1 data-aos="fade-up" class="display-4" v-if="category.subtitle">{{category.subtitle}}</h1>
            <h2 data-aos="fade-up" :style="{color:category.titleTwoColor}">{{category.title}} {{category.titleTwo}}</h2>
            <div data-aos="fade-up" v-html="category.description" class="text-muted h5 font-weight-light mt-4 mb-4"></div>
            <div class="wt-btnarea" data-aos="fade-up">
              <a v-if="isLoggedIn == 'true'" :href="baseUrl+'/page/dienstleistungen'" class="btn btn-primary btn-lg shadow-none lift">{{ trans('lang.show_all') }}</a>
              <a v-else href="#" data-target="#modalSignIn" data-toggle="modal" class="btn btn-primary btn-lg shadow-none lift">{{ trans('lang.show_all') }}</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 pt-5">
          <ul class="wt-categoryvtwo" data-aos="fade-up" data-aos-delay="550" data-aos-offset="300">
            <template v-for="(cat, index) in categoryList">
              <li @mouseover="mouseOver" class="transform" :key="index" v-if="cat.has_3d_icon=='1'">
                <div class="d-flex float-left flex-column justify-content-center align-items-center iusqHF p-3">
                  <figure>
                    <img :src="baseUrl+'/uploads/categories/'+ cat.image" :alt="cat.title">
                  </figure>
                  <h4 class="font-weight-light">
                    <a class="text-dark" :href="baseUrl+'/search-results?type='+ type+'&category%5B%5D='+cat.slug">{{ cat.title }}</a>
                  </h4>
                </div>
                <div class="lcvTnr hoyCxl"></div>
              </li>
            </template>
          </ul>
        </div>
      </div>
    </div>
    <div v-if="isLoggedIn == 'true'" class="container" data-aos="fade-right">
      <div class="row align-items-center justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <!-- Divider -->
          <hr class="hr-sm bg-warning mx-auto mb-10 mb-md-12">
          <h2 class="display-4 mb-5 text-center">Was soll für dich erledigt werden?</h2>
        </div>
        <div class="col-12 d-flex flex-wrap text-uppercase text-primary justify-content-center">
          <div id="accordion" class="d-flex flex-column text-center">
            <div class="d-flex flex-wrap text-uppercase text-primary justify-content-center">
              <div class="" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark shadow-none" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> TECHNOLOGIE & DESIGN </button>
                </h5>
              </div>
              <div class="" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark shadow-none collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> HAUSHALT & HANDWERK </button>
                </h5>
              </div>
              <div class="" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark shadow-none collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> BILDUNG & BERATUNG </button>
                </h5>
              </div>
              <div class="" id="headingFour">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark shadow-none collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> LIFESTYLE & FREIZEIT </button>
                </h5>
              </div>
            </div>
            <div class="d-flex flex-wrap text-uppercase text-primary justify-content-center">
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                
                  <template v-for="(cat,i) in filterCategory([43,47,51])">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                      <ul class="mb-3 card card-hover">
                        <a :href="`/search-results?type=job&category=${cat.id}`" class="text-dark">
                          <li class="px-3 py-3" style="line-height:18px;">
                            <div class="row align-items-center position-relative">
                              <span class="material-symbols-outlined col-4">{{cat.image}}</span>
                              <span class="col-6 card-title mb-0 text-dark">{{ cat.title }}</span>
                            </div>
                          </li>
                        </a>
                      </ul>
                    </div>
                  </template>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                
                  <template v-for="(cat,i) in filterCategory([44,48,52])">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                      <ul class="mb-3 card card-hover">
                        <a :href="`/search-results?type=job&category=${cat.id}`" class="text-dark">
                          <li class="px-3 py-3" style="line-height:18px;">
                            <div class="row align-items-center position-relative">
                              <span class="material-symbols-outlined col-4">{{cat.image}}</span>
                              <span class="col-6 card-title mb-0 text-dark">{{ cat.title }}</span>
                            </div>
                          </li>
                        </a>
                      </ul>
                    </div>
                  </template>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                
                  <template v-for="(cat,i) in filterCategory([45,49,53])">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                      <ul class="mb-3 card card-hover">
                        <a :href="`/search-results?type=job&category=${cat.id}`" class="text-dark">
                          <li class="px-3 py-3" style="line-height:18px;">
                            <div class="row align-items-center position-relative">
                              <span class="material-symbols-outlined col-4">{{cat.image}}</span>
                              <span class="col-6 card-title mb-0 text-dark">{{ cat.title }}</span>
                            </div>
                          </li>
                        </a>
                      </ul>
                    </div>
                  </template>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                
                  <template v-for="(cat,i) in filterCategory([46,50,54,55])">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                      <ul class="mb-3 card card-hover">
                        <a :href="`/search-results?type=job&category=${cat.id}`" class="text-dark">
                          <li class="px-3 py-3" style="line-height:18px;">
                            <div class="row align-items-center position-relative">
                              <span class="material-symbols-outlined col-4">{{cat.image}}</span>
                              <span class="col-6 card-title mb-0 text-dark">{{ cat.title }}</span>
                            </div>
                          </li>
                        </a>
                      </ul>
                    </div>
                  </template>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <loginForm></loginForm>
  </section>
</template>
<script>
  import loginForm from '../../../categoryLogin.vue'
  export default {
    props: ['parent_index', 'element_id', 'categories', 'pageID', 'type'],
    components: {
      loginForm
    },
    data() {
      return {
        category: {},
        categoryList: [],
        baseUrl: APP_URL,
        newBgImage: false,
        tempUrl: APP_URL + '/uploads/pages/temp/',
        imageUrl: APP_URL + '/uploads/pages/' + this.pageID + '/',
        isLoggedIn: this.$isLoggedIn
      }
    },
    computed: {
      sectionStyle() {
        return {
          padding: this.category.padding ? `${this.category.padding.top}${this.category.padding.unit} ${this.category.padding.right}${this.category.padding.unit} ${this.category.padding.bottom}${this.category.padding.unit} ${this.category.padding.left}${this.category.padding.unit}` : '',
          margin: this.category.margin ? `${this.category.margin.top}${this.category.margin.unit} ${this.category.margin.right}${this.category.margin.unit} ${this.category.margin.bottom}${this.category.margin.unit} ${this.category.margin.left}${this.category.margin.unit}` : '',
          'text-align': this.category.alignment,
          background: !this.category.backgroundImg ? this.category.sectionColor : ''
        }
      },
      contentSectionStyle() {
        return {
          background: this.category.contentBackground,
          color: this.category.contentColor
        }
      },
    },
    updated: function() {
      var index = this.getArrayIndex(this.categories, 'id', this.element_id)
      if (this.category[index]) {
        this.category = this.category[index]
      }
      this.category.id = this.element_id
    },
    methods: {
      mouseOver() {
        // $("ul.wt-categoryvtwo li").trigger('mouseout');
        $("ul.wt-categoryvtwo li").hover(function() {
          $(this).addClass('active').siblings().removeClass('active')
        });
      },
      filterCategory(ids) {
        let cats = [];
        this.categoryList.forEach(function(item, i) {
          if (ids.includes(item.id)) {
            cats.push(item);
          }
        });
        return cats;
      },
      getCategories: function() {
        var self = this;
        axios.get(APP_URL + "/get-seven-categories").then(function(response) {
          if (response.data.type == "success") {
            self.categoryList = response.data.categories
            setTimeout(function() {
              if ($('ul.wt-categoryvtwo li:nth-child(1)')) {
                $('ul.wt-categoryvtwo li:nth-child(1)').addClass("active")
              }
            }, 1000)
          }
        }).catch(function(error) {});
      }
    },
    created: function() {
      var self = this
      setTimeout(function() {
        var index = self.getArrayIndex(self.categories, 'id', self.element_id)
        if (self.categories[index]) {
          self.category = self.categories[index]
        }
      }, 100);
      this.getCategories();
    },
  };
</script>