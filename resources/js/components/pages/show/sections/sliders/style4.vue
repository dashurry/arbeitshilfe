<template>
    <section class="d-flex flex-wrap align-items-center pt-10 pb-10" id="app">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div v-if="isLoggedIn == 'true'" class="text-center">
                            <h1 class="display-3" data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-duration="600">{{slider.search_form_subtitle}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 d-flex justify-content-center flex-wrap" v-if="isLoggedIn =='true'" data-aos="fade-in" data-aos-easing="ease-in-out" data-aos-delay="500">
                        <!-- Buttons -->
                        <button class="btn btn-primary btn-lg lift shadow">
                            <a class="text-white" v-if="userType == 'Freiberufler'" :href="'/freelancer/dashboard/post-service'" target="_blank">Job inserieren</a>
                            <a class="text-white" v-else :href="'/employer/dashboard/post-job'" target="_blank">Job inserieren</a>
                        </button>
                    </div>
                </div>            
                <div class="row" v-if="isLoggedIn == 'false'">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-center">
                        <!-- HTML5 Video --->
                        <div id="video-gallery" data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-duration="800">
                            <div class="cs-video-btn my-3 mr-3" data-video='{"source": [{"src":"images/howitworksvideo.mp4", "type":"video/mp4"}], "attributes": {"preload": false, "controls": true}}' data-sub-html="<h4>'Arbeitshilfe | Online-Auftragsbörse</h4>"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 text-center">
                        <vue-typed-js :strings="['mit uns.', 'wir haben Sie alle.']" :typeSpeed="60" :backSpeed="60" :cursorChar="'|'" :loop="true" :backDelay="1700" :showCursor="true" class="justify-content-center">
                            <h1 class="display-3 text-wrap" data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-duration="600">Teilen Sie Ihren Bedarf <br>
                                <span class="typing text-underline-warning d-inline display-3" style="background-image: linear-gradient(90deg,rgba(245,192,112,.4),rgba(245,192,112,.4));"></span>
                                <p class="text-muted h5 fs-sm mt-4" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1000">
                                    Jetzt kostenlos registriere und Profitieren Sie von allen Vorzügen kostenlos.
                                </p>
                            </h1>
                        </vue-typed-js>
                    </div>
                </div>
                <div class="row mt-8">
                    <div class="col-12">
                        <hr data-aos="fade-left" class="hr-sm bg-warning mx-auto mb-10">
                        <!-- Preheading -->
                        <h6 class="text-uppercase text-primary mb-5 text-center" data-aos="fade-up">START TODAY</h6>
                    </div>
                </div>
            </div>
    </section>
</template>


<script scoped>
// lightGallery
import lightGallery from 'lightgallery';
import "lightgallery/css/lightgallery-bundle.css"
//Plugins
import lgVideo from 'lightgallery/plugins/video'

// import carousel from 'vue-owl-carousel'

export default {
    props:['slider', 'page_id', 'element_id', 'symbol'],
    // components:{carousel},
    data () {
        const isLoggedIn = this.$isLoggedIn;
        return {
            tempUrl:APP_URL+'/uploads/pages/temp/',
            imageUrl:APP_URL+'/uploads/pages/'+this.page_id+'/',
            baseUrl: APP_URL,
            isLoggedIn:isLoggedIn,
            locoScroll: null,
            userType: this.$userType,
        }
    },
    mounted () {
        var self =this
        
        // Light gallery - Video module
        lightGallery(document.getElementById('video-gallery'), {
            speed: 500,
            plugins: [lgVideo],
        });

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