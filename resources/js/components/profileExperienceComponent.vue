<template>
  <div class="card-body">
    <!-- Header -->
    <div class="media flex-wrap">
        <div class="media-body">
          <h2>{{ trans('lang.add_your_exp') }}</h2>
        </div>
      <a href="javascript:void(0);" @click="addExperience" class="btn btn-sm btn-outline-primary add-experience-btn">{{ trans('lang.add_experience') }}</a>
    </div>
    <!-- Accordion -->
    <ul id="experience-list" class="mt-3">
      <div v-if="stored_experiences" class="card">
        <li v-for="(stored_experience, index) in stored_experiences" :key="index">
          <!-- Collapse Head -->
          <div class="card-header d-flex justify-content-between flex-wrap" :id="'experienceaccordion-'+index+''">
            <h5>
              <button type="button" class="btn btn-link shadow-none" :id="'experienceaccordion-'+index+''" data-toggle="collapse" :data-target="'#experienceaccordioninner-'+index+''">
                {{stored_experience.job_title}} ({{stored_experience.start_date}} - {{stored_experience.end_date}})
              </button>
            </h5>
            <div>
              <a href="javascript:void(0);" class="wt-addinfo badge badge-primary shadow-none" :id="'experienceaccordion-'+index+''" data-toggle="collapse" :data-target="'#experienceaccordioninner-'+index+''" aria-expanded="true">
                <i class="material-symbols-outlined">edit</i>
              </a>
              <a href="javascript:void(0);" class="badge badge-danger shadow-none" @click="removeStoredExperience(index)">
                <i class="material-symbols-outlined">delete</i>
              </a>
            </div>
          </div>
          <!-- Collapse Body -->
          <div class="collapse hide" :id="'experienceaccordioninner-'+index+''" :aria-labelledby="'experienceaccordion-'+index+''" data-parent="#accordion">
              <div class="card-body">
                <!-- Job Title Input -->
                <div class="form-group">
                  <input type="text" :value="stored_experience.job_title" v-bind:name="'experience['+[index]+'][job_title]'" class="form-control" :placeholder="ph_job_title" />
                </div>
                <!-- Date Picker Input-->
                <div class="form-group">
                    <date-pick class="w-100"
                      v-model="stored_experience.start_date"
                      :inputAttributes="{placeholder: 'Bitte Zeitraum wählen'}"
                      :weekdays="weekdayList" 
                      :months="monthsList" 
                      :nextMonthCaption="trans('lang.next_month')"
                      :prevMonthCaption="trans('lang.pre_month')"
                      :setTimeCaption="trans('lang.set_time')">
                    </date-pick>
                  <input type="hidden" v-bind:name="'experience['+[index]+'][start_date]'" :value="stored_experience.start_date" />
                </div>
                <!-- Date Picker Input -->
                <div class="form-group">
                    <date-pick class="w-100"
                      v-model="stored_experience.end_date"
                      :inputAttributes="{placeholder: 'Bitte Zeitraum wählen'}"
                      :weekdays="weekdayList" 
                      :months="monthsList" 
                      :nextMonthCaption="trans('lang.next_month')"
                      :prevMonthCaption="trans('lang.pre_month')"
                      :setTimeCaption="trans('lang.set_time')">
                    </date-pick>
                  <input type="hidden" v-bind:name="'experience['+[index]+'][end_date]'" :value="stored_experience.end_date" />
                </div>
                <!-- Company Name Input -->
                <div class="form-group">
                  <input type="text" :value="stored_experience.company_title" v-bind:name="'experience['+[index]+'][company_title]'" class="form-control" :placeholder="ph_company_title" />
                </div>
                <!-- Job Description Textarea -->
                <div class="form-group">
                  <textarea :value="stored_experience.description" v-bind:name="'experience['+[index]+'][description]'" class="form-control" :placeholder="ph_job_desc" aria-describedby="textareaHelpBlock"></textarea>
                  <small id="textareaHelpBlock" class="form-text text-muted">{{ trans('lang.date_note') }}</small>
                </div>
              </div>
          </div>
        </li>
      </div>
      <div class="card">
        <li v-for="(experience, index) in experiences" :key="index" ref="experiencelistelement" class="experience-list-item">
          <!-- Collapse Head -->
          <div class="card-header d-flex justify-content-between">
              <h5>
                <button type="button" class="btn btn-link shadow-none" :id="'experienceaccordion-'+experience.count+''" data-toggle="collapse" :data-parent="'#experienceaccordioninner-'+experience.count+''">
                  {{experience.job_title}} ( {{experience.start_date}} - {{experience.end_date}} )
                </button>
              </h5>
                <div>
                  <a href="javascript:void(0);" class="wt-addinfo badge badge-primary shadow-none" :id="'experienceaccordion-'+experience.count+''" data-toggle="collapse" :data-target="'#experienceaccordioninner-'+experience.count+''" aria-expanded="true">
                    <i class="material-symbols-outlined">edit</i>
                  </a>
                  <a href="javascript:void(0);" class="badge badge-danger shadow-none delete-experience">
                    <i class="material-symbols-outlined">delete</i>
                  </a>
                </div>
          </div>
          <!-- Collapse Body -->
          <div class="collapse hide" :id="'experienceaccordioninner-'+experience.count+''" :aria-labelledby="'experienceaccordion-'+experience.count+''" data-parent="#accordion">
            <div class="card-body">
              <!-- Job Title Input -->
              <div class="form-group">
                <input type="text" v-bind:name="'experience['+[experience.count]+'][job_title]'" class="form-control" :placeholder="ph_job_title" v-model="experience.job_title" />
              </div>
              <!-- Date Picker Input-->
              <div class="form-group">
                <date-pick class="w-100"
                  v-model="experience.start_date"
                  :inputAttributes="{placeholder: 'Bitte Zeitraum wählen'}"
                  :weekdays="weekdayList" 
                  :months="monthsList" 
                  :nextMonthCaption="trans('lang.next_month')"
                  :prevMonthCaption="trans('lang.pre_month')"
                  :setTimeCaption="trans('lang.set_time')">
                </date-pick>
                <input type="hidden" v-bind:name="'experience['+[experience.count]+'][start_date]'" :value="experience.start_date" :placeholder="ph_start_date" />
              </div>
              <!-- Date Picker Input-->
              <div class="form-group">
                <date-pick class="w-100"
                  v-model="experience.end_date"
                  :inputAttributes="{placeholder: 'Bitte Zeitraum wählen'}"
                  :weekdays="weekdayList" 
                  :months="monthsList" 
                  :nextMonthCaption="trans('lang.next_month')"
                  :prevMonthCaption="trans('lang.pre_month')"
                  :setTimeCaption="trans('lang.set_time')">
                </date-pick>
                <input type="hidden" id="end_date" v-bind:name="'experience['+[experience.count]+'][end_date]'" :value="experience.end_date" :placeholder="ph_end_date" />
              </div>
              <!-- Company Name Input -->
              <div class="form-group">
                <input type="text" v-bind:name="'experience['+[experience.count]+'][company_title]'" class="form-control" :placeholder="ph_company_title" />
              </div>
              <!-- Job Description Textarea -->
              <div class="form-group">
                <textarea v-bind:name="'experience['+[experience.count]+'][description]'" class="form-control" :placeholder="ph_job_desc" aria-describedby="textareaHelpBlock"></textarea>
                <small id="textareaHelpBlock" class="form-text text-muted">{{ trans('lang.date_note') }}</small>
              </div>
            </div>
          </div>
        </li>
      </div>
    </ul>
  </div>
</template>

<script>
import DatePick from "vue-date-pick";
import Event from "../event.js";
export default {
  components: { DatePick },
  props: [
    "widget_title",
    "server_error_message",
    "server_errors",
    "ph_job_title",
    "ph_company_title",
    "ph_job_desc",
    "ph_start_date",
    "ph_end_date",
    'weekdays',
    'months'
  ],
  data() {
    return {
      weekdayList:JSON.parse(this.weekdays),
      monthsList:JSON.parse(this.months),
      error_message: this.server_errors,
      start_date: "",
      end_date: "",
      stored_experiences: [],
      experience: {
        company_title: this.ph_company_title,
        start_date: this.ph_start_date,
        end_date: this.ph_end_date,
        job_title: this.ph_job_title,
        description: "",
        count: 0
      },
      experiences: [],
      freelancer_experiences: [],
      count: 0
    };
  },
  methods: {
    getExperiences() {
      let self = this;
      axios
        .get(APP_URL + "/freelancer/get-freelancer-experiences")
        .then(function(response) {
          self.stored_experiences = response.data.experiences;
        });
    },
    addExperience: function() {
      // count numbers of collapsible items from <ul> element
      var expereience_list_count = jQuery(".add-experience-btn").parents(".experienceComponent").find("ul#experience-list div.card li").length;
      console.log(expereience_list_count);
      // checking if there is any vue component that has referrence name = "experiencelistelement"
      if (this.$refs.experiencelistelement) {
        // count all collapsible items inside the referrence element
        this.experience.count = expereience_list_count + this.$refs.experiencelistelement.length;
      }
      else {
        this.experience.count = expereience_list_count - 1;
      }
      // push new collapsible item into experiences array and increase the total number
      this.experiences.push(
        Vue.util.extend({}, this.experience, this.experience.count++)
      );
    },
    removeStoredExperience: function(index) {
      this.stored_experiences.splice(index, 1);
    }
  },
  watch : {
        start_date() {
            let input = $(".vdpComponent.vdpWithInput>input");

            input.css({
                color: "#313889",
                fontStyle: "normal",
            })
        }
    },
  mounted: function() {
    Event.$emit("experience-component-render", { error: this.error_message });
    jQuery(document).on("click", ".delete-experience", function(e) {
      e.preventDefault();
      var _this = jQuery(this);
      _this.parents(".experience-list-item").remove();
    });
  },
  created: function() {
    this.getExperiences();
  }
};
</script>

<style>
.vdpComponent.vdpWithInput>input {
    color: #313889;
    outline: none;
    background: #fff;
    font-size: 14px;
    box-shadow: none;
    line-height: 1.5 !important;
    padding: 0.5625rem 1.125rem !important;
    border-radius: 0.75rem !important;
    display: inline-block;
    vertical-align: middle;
    border: 1px solid #dfdfeb !important;
    /* text-transform: inherit; */
    box-sizing: border-box;
    width: 100%;
    font-style: normal;
}
.vdpComponent.vdpWithInput>input::placeholder{
  color: #999999;
  font-style: italic;
}
</style>