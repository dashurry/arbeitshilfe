<template>
    <section class="d-flex flex-wrap">
    <!-- <div
        :class="slider.sectionClass + ' wt-bannerholdervthree'"
        :style="sectionStyle" 
        :id="slider.sectionId"
        v-if="Object.entries(slider).length != 0"
    > -->
    <!-- <div id="wt-home-slider"></div> -->
    <!-- <div class="phoneCloud" data-aos="fade-left" data-aos-duration="1600"></div> -->
    <!-- <div class="flyingPhone animationPhone"></div> -->
    <!-- <div class="newComment animationComment"></div> -->
        <!-- <div class="wt-bannercontent-wrap"> -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mt-5">
                        <div></div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mt-5">
                        <div class="phoneCloud" data-aos="fade-left" data-aos-duration="1600"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div v-if="isLoggedIn == 'true'" class="text-center">
                            <!-- <h1 class="goodkitH1" data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-duration="600">{{slider.search_form_subtitle}}</h1> -->
                            <h1 class="goodkitH1" data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-duration="600">{{slider.search_form_subtitle}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-12 col-lg-8">
                            <div class="wt-bannerthree-content justify-content-center" data-aos="fade-up" data-aos-duration="1000">
                                <!-- SEARCH FORM -->
                                    <search-form-v2
                                        :placeholder="trans('ich suche nach')"
                                        :no_record_message="trans('Kein Eintrag gefunden')"
                                        :slider="slider"
                                        :symbol="symbol"
                                        v-if="slider.enable_search_form && isLoggedIn =='true'"/>
                            </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 d-flex justify-content-center flex-wrap" v-if="isLoggedIn =='true'" data-aos="fade-in" data-aos-easing="ease-in-out" data-aos-delay="1500">
                        <!-- Buttons -->
                        <!-- <a class="btn btn-primary lift" href="" target="_blank">Job inserieren</a>
                        <a class="btn btn-white lift ml-3" :href="'/search-results?type=job'">Job suchen</a> -->
                        <button class="btn btn-primary lift">
                            <a class="text-white" href="" target="_blank">Job inserieren</a>
                        </button>
                        <button class="btn btn-white lift ml-3">
                            <a class="text-dark" :href="'/search-results?type=job'">Job suchen</a>
                        </button>
                    </div>
                </div>
                                <!-- VIDEO -->
                                <!-- 16:9 aspect ratio -->
                                
                                
                                <!-- <div v-if="isLoggedIn == 'false'" class="embed-responsive embed-responsive-16by9" style="width: 660px;">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/I7yVBOrqqW0?autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe>
                                </div> -->

                                
                                
                

                            <!-- <div v-if="isLoggedIn == 'true'" class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 text-center mt-4" data-aos="fade-in" data-aos-easing="ease-in-out" data-aos-delay="1500">
                                    <a class="btn btn-primary lift" href="https://themes.getbootstrap.com/product/goodkit/" target="_blank">
                                    Job inserieren
                                    </a>
                                    <a class="btn btn-white lift ml-3" :href="'/search-results?type=job'">
                                    <span class="d-sm-none">Docs</span><span class="d-none d-sm-inline-block">Job suchen</span>
                                    </a>

                                </div>
                            </div> -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="position: relative;" v-if="isLoggedIn == 'false'">
                        <h1 style="color: #323232;font-weight: 500 !important;font-family: 'DM Serif Display',serif;font-size: 4.5rem;line-height: 1.08;"
                        data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-duration="600">Teilen Sie Ihren Bedarf<br>
                        <h1 style="color: #323232;font-weight: 500 !important;font-family: 
                        'DM Serif Display',serif;font-size: 4.5rem;line-height: 1.08;background-image: linear-gradient(90deg,rgba(245,192,112,.4),rgba(245,192,112,.4));" 
                        class="typed text-underline-warning d-inline"></h1>
                        </h1>

                        <p class="goodkitParagraph">
                            Jetzt kostenlos registriere und Profitieren Sie von allen Vorzügen kostenlos.
                        </p>

                        <div class="play-video-btn">
                            <a class="cs-video-btn cs-video-btn my-3 mr-3" href="https://www.youtube.com/embed/I7yVBOrqqW0?autoplay=1&mute=1"></a>
                                <span id="ss" class="font-size-sm font-weight-light text-dark" style="font-family: 'Roboto',Helvetica,Arial,Lucida,sans-serif;">Play video</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <!-- <img class="animationPhone" src="/images/flyingPhone.png" alt="phone"> -->
                        <div class="flyingPhone animationPhone"></div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div id="wt-home-slider"></div>
                    </div>
                     <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <div class="newComment animationComment"></div>
                    </div>
                     <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <div></div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- <div id="particles-js" class="wt-particles particles-js"></div> -->
        <!-- <carousel 
            id="wt-home-slider" 
            class="wt-home-slider"
            :items='1'
            :animateOut="'fadeOut'"
            :animateIn="'fadeIn'"
            :loop='true'
            :nav='false'
            :dots='false'
            :margin='0'
            :autoplay='true'
        > -->
        <!-- <div id="wt-home-slider" class="owl-carousel owl-loaded owl-drag">
            <figure class="item" v-for="(slide, index) in slider.slider_image" :key="index">
                <img 
                    :src="imageUrl+slide" 
                    alt="img description" 
                    v-if="page_id"
                />
            </figure> 
        </div> -->
        <!-- </carousel> -->
    <!-- </div> -->
    </section>
</template>

<style scoped>
.cs-video-btn{
        display: inline-block;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: 3.25rem;
    height: 3.25rem;
    padding-left: .125rem;
    transition: background-color 0.3s ease-in-out,color 0.3s ease-in-out,box-shadow 0.3s ease-in-out;
    border-radius: 50%;
    background-color: #ff5851;
    color: #fff;
    font-size: 1rem;
    text-align: center;
    text-decoration: none;
    box-shadow: 0 0.25rem 1rem -0.25rem rgb(30 33 44 / 20%);
    vertical-align: middle;
}
.cs-video-btn:hover {
    color: #fff;
    text-decoration: none;
    box-shadow: 0px 0px 30px 6px rgba(255,88,81,1);
-webkit-box-shadow: 0px 0px 30px 6px rgba(255,88,81,1);
-moz-box-shadow: 0px 0px 30px 6px rgba(255,88,81,1);
}
.cs-video-btn::before {
    padding-left: .125rem;
    font-family: "createx-icons";
    line-height: 3.25rem;
    content: '\e93f';
}
</style>

<script>
import "lightgallery.js";
import "lightgallery.js/dist/css/lightgallery.css";
import "/public/js/lg-video.min.js";

// import carousel from 'vue-owl-carousel'

export default {
    props:['slider', 'page_id', 'element_id', 'symbol'],
    // components:{carousel},
    data () {
        const isLoggedIn = this.$isLoggedIn;
        return {
            tempUrl:APP_URL+'/uploads/pages/temp/',
            imageUrl:APP_URL+'/uploads/pages/'+this.page_id+'/',
            isLoggedIn:isLoggedIn,
            locoScroll: null,
        }
    },
    mounted () {
        var self =this
        // setTimeout(function(){ 
        //     self.intParticles()
        // }, 3000);
        
        // var wt_home_slider = jQuery("#wt-home-slider")
        // wt_home_slider.owlCarousel({
        //     items: 1,
        //     loop:true,
        //     nav:false,
        //     margin: 0,
        //     rtl:true,
        //     autoplay:true,
        //     animateOut: 'fadeOut',
        //     animateIn: 'fadeIn'
        // });

        // Light gallery
        /* Video module */
        lightGallery(document.getElementById('video-gallery'));

        if(document.getElementsByClassName('typed'))
        {
            var typed = new Typed('.typed', {
                strings: ['mit uns.', 'wir haben Sie alle.'],
                smartBackspace: false, // Default value
                typeSpeed: 60,
                backSpeed: 60,
                backDelay: 1700,
                showCursor: true,
                cursorChar: '|',
                loop: true
            });
        }
    },

    computed: {
        sectionStyle() {
            return {
                padding: this.slider.padding ? `${this.slider.padding.top}${this.slider.padding.unit} ${this.slider.padding.right}${this.slider.padding.unit} ${this.slider.padding.bottom}${this.slider.padding.unit} ${this.slider.padding.left}${this.slider.padding.unit}` : '',
                margin: this.slider.margin ? `${this.slider.margin.top}${this.slider.margin.unit} ${this.slider.margin.right}${this.slider.margin.unit} ${this.slider.margin.bottom}${this.slider.margin.unit} ${this.slider.margin.left}${this.slider.margin.unit}` : '',
                'text-align': this.slider.alignment,
                background: this.slider.sectionColor
            }
        },
    },

};
</script>