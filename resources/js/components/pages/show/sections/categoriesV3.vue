<template>
<section class="pt-10 pb-10">
    <!-- <section 
        :class="category.sectionClass + ' wt-haslayout  wt-main-section wt-bg-holder wt-categories-wrap'"
        :id="category.sectionId" 
        :style="sectionStyle" 
        v-if="Object.entries(category).length != 0"
    > -->
        <!-- <div class="wt-overlay-1" :style="[newBgImage ?
            {'background-image': 'url('+tempUrl+category.backgroundImg+')'} :
            pageID ?
            {'background-image': 'url('+imageUrl+category.backgroundImg+')'} : '']">
        </div> -->
        <div v-if="isLoggedIn == 'false'" class="container">
                <div class="row align-items-center">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div>
                        <!-- <div class="wt-categories-holder"> -->
                            <!-- <div class="wt-sectionheadvtwo"> -->
                                <!-- <div class="wt-sectiontitlevtwo"> -->
                                    <!-- :style="{color:category.subtitleColor}" -->
                                    <h1 data-aos="fade-up" class="display-4" v-if="category.subtitle">{{category.subtitle}}</h1>
                                    <!-- <span data-aos="fade-up" style="color: #323232 !important;font-family: 'DM Serif Display',serif;font-size: 3.5rem;font-weight: 300;line-height: 1.2;" v-if="category.subtitle">{{category.subtitle}}</span> -->
                                    <h2 data-aos="fade-up" :style="{color:category.titleTwoColor}">{{category.title}} {{category.titleTwo}}</h2>
                                        <!-- <em :style="{color:category.titleTwoColor}">{{category.titleTwo}} </em> -->
                                        <div data-aos="fade-up" v-html="category.description" class="text-muted h5 font-weight-light mt-4 mb-4"></div> 
                                <!-- </div> -->
                                <!-- <div class="wt-description" data-aos="fade-up" style="color: #575a7b!important;font-family: DM Sans,sans-serif;font-weight: 400;font-size: 1.125rem;line-height: 1.6;" v-html="category.description">
                                </div> -->
                                <div class="wt-btnarea" data-aos="fade-up">
                                    <a v-if="isLoggedIn == 'true'" :href="baseUrl+'/page/dienstleistungen'" class="btn btn-primary shadow-none lift">{{ trans('lang.show_all') }}</a>
                                    <a v-else href="#" data-target="#modal-signin" data-toggle="modal" class="btn btn-primary shadow-none lift">{{ trans('lang.show_all') }}</a>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pt-5">
                        <ul class="wt-categoryvtwo" data-aos="fade-up" data-aos-delay="550" data-aos-offset="300">
                            <template v-for="(cat, index) in categoryList">
                                <li @mouseover="mouseOver" class="transform" :key="index" v-if="cat.has_3d_icon=='1'">
                                    <!-- <div class="wt-categorycontentvtwo iusqHF p-3"> -->
                                        <div class="d-flex float-left flex-column justify-content-center align-items-center iusqHF p-3">
                                        <figure><img :src="baseUrl+'/uploads/categories/'+ cat.image" :alt="cat.title"></figure>
                                        <!-- <div class="wt-cattitlevtwo"> -->
                                            <h4 class="font-weight-light">
                                                <a class="text-dark" :href="baseUrl+'/search-results?type='+ type+'&category%5B%5D='+cat.slug">{{ cat.title }}</a>
                                            </h4>
                                        <!-- </div> -->
                                        <!-- <div class="wt-description">
                                            <p v-if="cat.abstract">{{ cat.abstract }}</p>
                                        </div> -->
                                    </div>
                                    <div class="lcvTnr hoyCxl"></div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
            <div v-if="isLoggedIn == 'true'" class="container mt-8" data-aos="fade-right" data-aos-delay="350">
                <div class="row align-items-center justify-content-center">
                    <h2 class="display-4 mb-5 text-center">Was soll für dich erledigt werden?</h2>
                    <div class="text-uppercase text-primary row justify-content-center">

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <h4 class="row justify-content-center">TECHNOLOGIE & DESIGN</h4>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <template v-for="(cat,i) in filterCategory([43,47,51])" >
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                                        <ul class="mb-3 card card-hover">
                                            <a :href="`/search-results?type=job&category=${cat.id}`">
                                                <li class="px-3 py-3" style="line-height:18px;">
                                                    <div class="row align-items-center position-relative"><img :src="`/uploads/categories/${cat.image}`" class="col-4 img-fluid">
                                                    <span class="col-8 card-title mb-0 text-dark">{{ cat.title }}</span></div>
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                       </div>
                       <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <a data-toggle="collapse" href="#collapseExampleTwo" role="button" aria-expanded="false" aria-controls="collapseExampleTwo">
                                <h4 class="row justify-content-center">HAUSHALT & HANDWERK</h4>
                            </a>
                            <div class="collapse" id="collapseExampleTwo">
                                <template v-for="(cat,i) in filterCategory([44,48,52])" >
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                                        <ul class="mb-3 card card-hover">
                                            <a :href="`/search-results?type=job&category=${cat.id}`">
                                                <li class="px-3 py-3" style="line-height:18px;">
                                                    <div class="row align-items-center position-relative"><img :src="`/uploads/categories/${cat.image}`" class="col-4 img-fluid">
                                                    <span class="col-8 card-title mb-0 text-dark">{{ cat.title }}</span></div>
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                       </div>
                       <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <a data-toggle="collapse" href="#collapseExampleThree" role="button" aria-expanded="false" aria-controls="collapseExampleThree">
                                <h4 class="row justify-content-center">BILDUNG & BERATUNG</h4>
                            </a>
                            <div class="collapse" id="collapseExampleThree">
                                <template v-for="(cat,i) in filterCategory([45,49,53])" >
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                                        <ul class="mb-3 card card-hover">
                                            <a :href="`/search-results?type=job&category=${cat.id}`">
                                                <li class="px-3 py-3" style="line-height:18px;">
                                                    <div class="row align-items-center position-relative"><img :src="`/uploads/categories/${cat.image}`" class="col-4 img-fluid">
                                                    <span class="col-8 card-title mb-0 text-dark">{{ cat.title }}</span></div>
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                       </div>
                       <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <a data-toggle="collapse" href="#collapseExampleFour" role="button" aria-expanded="false" aria-controls="collapseExampleFour">
                                <h4 class="row justify-content-center">LIFESTYLE & FREIZEIT</h4>
                            </a>
                            <div class="collapse" id="collapseExampleFour">
                                <template v-for="(cat,i) in filterCategory([46,50,54])" >
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                                        <ul class="mb-3 card card-hover">
                                            <a :href="`/search-results?type=job&category=${cat.id}`">
                                                <li class="px-3 py-3" style="line-height:18px;">
                                                    <div class="row align-items-center position-relative"><img :src="`/uploads/categories/${cat.image}`" class="col-4 img-fluid">
                                                    <span class="col-8 card-title mb-0 text-dark">{{ cat.title }}</span></div>
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                       </div>

                       <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 catSonstige">
                            <a data-toggle="collapse" href="#collapseExampleFive" role="button" aria-expanded="false" aria-controls="collapseExampleFive">
                                <h4 class="row justify-content-center">SONSTIGE</h4>
                            </a>
                            <div class="collapse" id="collapseExampleFive">
                                <template v-for="(cat,i) in filterCategory([55])" >
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" :key="i" v-if="cat.has_3d_icon=='0'">
                                        <ul class="mb-3 card card-hover">
                                            <a :href="`/search-results?type=job&category=${cat.id}`">
                                                <li class="px-3 py-3" style="line-height:18px;">
                                                    <div class="row align-items-center position-relative"><img :src="`/uploads/categories/${cat.image}`" class="col-4 img-fluid">
                                                    <span class="col-8 card-title mb-0 text-dark">{{ cat.title }}</span></div>
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                       </div>

                        <template v-for="(cat,i) in categoryList">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 hideForMobile" :key="i" v-if="cat.has_3d_icon=='0'">
                                <ul class="mb-3 card card-hover">
                                    <a :href="`/search-results?type=job&category=${cat.id}`">
                                        <li class="px-3 py-3" style="line-height:18px;">
                                            <div class="row align-items-center position-relative"><img :src="`/uploads/categories/${cat.image}`" class="col-4 img-fluid">
                                            <span class="col-8 card-title mb-0 text-dark">{{ cat.title }}</span></div>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                        </template>

                    </div>
                </div>
            </div>
        <loginForm></loginForm>
    </section>
</template>
<script>
import loginForm from '../../../categoryLogin.vue'
export default {
    
    props:['parent_index', 'element_id', 'categories', 'pageID', 'type'],
    components:{
        loginForm
    },
    data() {
        return {
            category:{},
            categoryList:[],
            baseUrl: APP_URL,
            newBgImage:false,
            tempUrl:APP_URL+'/uploads/pages/temp/',
            imageUrl:APP_URL+'/uploads/pages/'+this.pageID+'/',
            isLoggedIn : this.$isLoggedIn
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
                background:this.category.contentBackground,
                color:this.category.contentColor
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
    methods:{
        mouseOver () {
            // $("ul.wt-categoryvtwo li").trigger('mouseout');
            $("ul.wt-categoryvtwo li").hover(function() {
                $(this).addClass('active')
                    .siblings().removeClass('active')
            });
        },
        filterCategory(ids) {
            let cats = [];

            this.categoryList.forEach(function(item,i){
                if(ids.includes(item.id)){
                    cats.push(item);
                }
            });
            return cats;
        },
        getCategories: function() {
            var self = this;
            axios
            .get(APP_URL + "/get-seven-categories")
            .then(function(response) {
                if (response.data.type == "success") {
                    self.categoryList =response.data.categories
                    setTimeout(function() {

                        if ($('ul.wt-categoryvtwo li:nth-child(1)')) {
                            $('ul.wt-categoryvtwo li:nth-child(1)').addClass("active")
                        }
                    },1000)
                }
            })
            .catch(function(error) {  });
        }
    },
    created: function() {
        var self = this
        setTimeout(function(){ 
            var index = self.getArrayIndex(self.categories, 'id', self.element_id)
            if (self.categories[index]) {
                self.category = self.categories[index]
            }
        }, 100);
        this.getCategories();
    },
};
</script>
