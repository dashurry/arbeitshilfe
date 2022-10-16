<template>
    <section class="pt-10 pb-10">
    <!-- <section
        :class="app.sectionClass + ' wt-haslayout wt-main-section wt-mobapp'"
        :style="sectionStyle" 
        :id="app.sectionId"
        v-if="Object.entries(app).length != 0"
    > -->
        <!-- <div class="wt-overlay-3" :style="[pageID ?
                {'background-image': 'url('+imageUrl+app.background_image+')'} : '']"></div> -->
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-6">
                    <div class="wt-mobapp-wrap">
                        <div class="wt-sectionheadvthree">
                            <div class="wt-sectiontitlevtwo">
                                <span :style="{color:app.subtitleColor}" data-aos="fade-up">{{app.subtitle}}</span>
                                <h2 :style="{color:app.titleColor}" data-aos="fade-up">{{app.title}}
                                    <em :style="{color:app.titleTwoColor}">{{app.titleTwo}}</em>
                                </h2>
                            </div>
                            <div class="wt-description" v-html="app.description" data-aos="fade-right" data-aos-delay="150">
                            </div>
                        </div>
                        <div class="wt-mobapp-btns">
                            <a :href="app.ios_url" class="wt-appbtn" v-if="app.ios_image">
                                <img data-aos="fade-down"
                                    :src="imageUrl+app.ios_image" 
                                    alt="img description" 
                                />
                            </a>
                            <a :href="app.andriod_url" class="wt-appbtn wt-android" v-if="app.android_image">
                                <img data-aos="fade-down"
                                    :src="imageUrl+app.android_image" 
                                    alt="img description" 
                                />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <figure class="wt-mobapp-img" style="transform: scale(2);">
                        <img data-aos="fade-left"
                            :src="'../images/3974111.png'" 
                            alt="image"
                            v-if="newAppImage"
                        >
                        <img data-aos="fade-left"
                            :src="'../images/3974111.png'" 
                            alt="img description" 
                            v-else-if="pageID"
                        />
                    </figure>
                </div> -->

                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 text-center">

                        <!-- Divider -->
                        <hr class="hr-sm bg-warning mx-auto mb-10 mb-md-12">

                        <!-- Preheading -->
                        <h6 class="text-uppercase text-primary mb-5">
                        Useful at all Tiers
                        </h6>

                        <!-- Heading -->
                        <h2 class="display-4 mb-10">
                        All plans include a full suite of functional features.
                        </h2>

                    </div>
                </div>

                <div class="row mt-n8 mt-md-n9">

                    <div class="col-md-6 col-lg-4">

                        <!-- Item -->
                        <div class="d-flex mt-8 mt-md-9">

                        <!-- Icon -->
                        <div class="icon text-primary-light">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"></path><path d="M4 4l7.631-1.43a2 2 0 01.738 0L20 4v9.283a8.51 8.51 0 01-4 7.217l-3.47 2.169a1 1 0 01-1.06 0L8 20.5a8.51 8.51 0 01-4-7.217V4z" fill="#335EEA" opacity=".3"></path><path d="M11.175 14.75a.946.946 0 01-.67-.287l-1.917-1.917a.926.926 0 010-1.342c.383-.383 1.006-.383 1.341 0l1.246 1.246 3.163-3.162a.926.926 0 011.341 0 .926.926 0 010 1.341l-3.833 3.834a.946.946 0 01-.671.287z" fill="#335EEA"></path></g></svg>              </div>

                        <!-- Body -->
                        <div class="ms-5">

                            <!-- Title -->
                            <p class="fs-lg fw-bold mb-1">
                            Secure
                            </p>

                            <!-- Text -->
                            <p class="fs-sm text-muted mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna lectus, mattis non accumsan in, tempor dictum neque. In hac habitasse platea dictumst.
                            </p>

                        </div>

                        </div>

                    </div>

                    <div class="col-md-6 col-lg-4">

                        <!-- Item -->
                        <div class="d-flex mt-8 mt-md-9">

                        <!-- Icon -->
                        <div class="icon text-primary-light">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"></path><path d="M22 15.01l.025-.01v4.586a1 1 0 01-1.707.707L18.025 18H5a3 3 0 01-3-3V6a3 3 0 013-3h14a3 3 0 013 3v9.01zM6.168 10.555C7.678 12.819 9.646 14 12 14c2.354 0 4.322-1.18 5.832-3.445a1 1 0 10-1.664-1.11C15.01 11.181 13.646 12 12 12c-1.646 0-3.01-.82-4.168-2.555a1 1 0 00-1.664 1.11z" fill="#335EEA"></path></g></svg>              </div>

                        <!-- Body -->
                        <div class="ms-5">

                            <!-- Title -->
                            <p class="fs-lg fw-bold mb-1">
                            Cross-platform
                            </p>

                            <!-- Text -->
                            <p class="fs-sm text-muted mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna lectus, mattis non accumsan in, tempor dictum neque. In hac habitasse platea dictumst.
                            </p>

                        </div>

                        </div>

                    </div>

                    <div class="col-md-6 col-lg-4">

                        <!-- Item -->
                        <div class="d-flex mt-8 mt-md-9">

                        <!-- Icon -->
                        <div class="icon text-primary-light">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"></path><path d="M14.293 16.707a1 1 0 011.414-1.414l4 4a1 1 0 01-1.414 1.414l-4-4z" fill="#335EEA" opacity=".3"></path><path d="M11 16a5 5 0 100-10 5 5 0 000 10zm0 2a7 7 0 110-14 7 7 0 010 14z" fill="#335EEA"></path></g></svg>              </div>

                        <!-- Body -->
                        <div class="ms-5">

                            <!-- Title -->
                            <p class="fs-lg fw-bold mb-1">
                            Searchable
                            </p>

                            <!-- Text -->
                            <p class="fs-sm text-muted mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna lectus, mattis non accumsan in, tempor dictum neque. In hac habitasse platea dictumst.
                            </p>

                        </div>

                        </div>

                    </div>

                    <div class="col-md-6 col-lg-4">

                        <!-- Item -->
                        <div class="d-flex mt-8 mt-md-9">

                        <!-- Icon -->
                        <div class="icon text-primary-light">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"></path><path d="M7 11h8a2 2 0 002-2V8h2v1a4 4 0 01-4 4H7v2a1 1 0 01-2 0V9a1 1 0 112 0v2z" fill="#335EEA" opacity=".3"></path><path d="M6 21a2 2 0 100-4 2 2 0 000 4zm0 2a4 4 0 110-8 4 4 0 010 8zM18 7a2 2 0 100-4 2 2 0 000 4zm0 2a4 4 0 110-8 4 4 0 010 8zM6 7a2 2 0 100-4 2 2 0 000 4zm0 2a4 4 0 110-8 4 4 0 010 8z" fill="#335EEA"></path></g></svg>              </div>

                        <!-- Body -->
                        <div class="ms-5">

                            <!-- Title -->
                            <p class="fs-lg fw-bold mb-1">
                            Document History
                            </p>

                            <!-- Text -->
                            <p class="fs-sm text-muted mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna lectus, mattis non accumsan in, tempor dictum neque. In hac habitasse platea dictumst.
                            </p>

                        </div>

                        </div>

                    </div>

                    <div class="col-md-6 col-lg-4">

                        <!-- Item -->
                        <div class="d-flex mt-8 mt-md-9">

                        <!-- Icon -->
                        <div class="icon text-primary-light">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"></path><path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" fill="#335EEA" opacity=".3"></path><path d="M18.5 11h-13A1.5 1.5 0 004 12.5v.5h4.586a1 1 0 01.707.293l1 1a2.414 2.414 0 003.414 0l1-1a1 1 0 01.707-.293H20v-.5a1.5 1.5 0 00-1.5-1.5zM5.5 6A1.5 1.5 0 004 7.5V8h16v-.5A1.5 1.5 0 0018.5 6h-13z" fill="#335EEA"></path></g></svg>              </div>

                        <!-- Body -->
                        <div class="ms-5">

                            <!-- Title -->
                            <p class="fs-lg fw-bold mb-1">
                            100% Free
                            </p>

                            <!-- Text -->
                            <p class="fs-sm text-muted mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna lectus, mattis non accumsan in, tempor dictum neque. In hac habitasse platea dictumst.
                            </p>

                        </div>

                        </div>

                    </div>

                    <div class="col-md-6 col-lg-4">

                        <!-- Item -->
                        <div class="d-flex mt-8 mt-md-9">

                        <!-- Icon -->
                        <div class="icon text-primary-light">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"></path><path d="M16.374 19.939l5.849-8.773A.75.75 0 0021.599 10H17V4.477a.75.75 0 00-1.374-.416l-5.849 8.773A.75.75 0 0010.401 14H15v5.523a.75.75 0 001.374.416z" fill="#335EEA"></path><path d="M4.5 5h5a1.5 1.5 0 010 3h-5a1.5 1.5 0 010-3zm0 12h5a1.5 1.5 0 010 3h-5a1.5 1.5 0 010-3zm-2-6h4a1.5 1.5 0 010 3h-4a1.5 1.5 0 010-3z" fill="#335EEA" opacity=".3"></path></g></svg>              </div>

                        <!-- Body -->
                        <div class="ms-5">

                            <!-- Title -->
                            <p class="fs-lg fw-bold mb-1">
                            Group Sync
                            </p>

                            <!-- Text -->
                            <p class="fs-sm text-muted mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna lectus, mattis non accumsan in, tempor dictum neque. In hac habitasse platea dictumst.
                            </p>

                        </div>

                        </div>

                    </div>

                </div>
        </div>
    </section>		
</template>
<script>
export default {
    props:['app', 'pageID', 'sectionStyle'],
    data() {
        return {
            baseUrl: APP_URL,
            newAppImage:false,
            newBgImage:false,
            tempUrl:APP_URL+'/uploads/pages/temp/',
            imageUrl:APP_URL+'/uploads/pages/'+this.pageID+'/',
        }
    },
    mounted: function() {
        Event.$on('new-app-image', (data) => {
            this.newAppImage = true
        })
    }  
};
</script>