<template>
  <div class="card-body">
    <!-- Header -->
    <div class="media flex-wrap">
        <div class="media-body">
          <h2>{{ trans('lang.add_your_edu') }}</h2>
        </div>
      <a href="javascript:void(0);" @click="addEducation" class="btn btn-sm btn-outline-primary add-education-btn">{{ trans('lang.add_edu') }}</a>
    </div>
    <!-- Accordion -->
    <ul id="education-list" class="mt-3">
      <div v-if="stored_educations" class="card">
        <li v-for="(stored_education, index) in stored_educations" :key="index">
          <!-- Collapse Head -->
          <div class="card-header d-flex justify-content-between flex-wrap" :id="'educationaccordion-'+index+''">
            <h5>
              <button type="button" class="btn btn-link shadow-none" :id="'educationaccordion-'+index+''" data-toggle="collapse" :data-target="'#educationaccordioninner-'+index+''">
                {{stored_education.degree_title}} ({{stored_education.start_date}} - {{stored_education.end_date}})
              </button>
            </h5>
            <div>
              <a href="javascript:void(0);" class="wt-addinfo badge badge-primary shadow-none" :id="'educationaccordion-'+index+''" data-toggle="collapse" :data-target="'#educationaccordioninner-'+index+''" aria-expanded="true">
                <i class="material-symbols-outlined"></i>
              </a>
              <a href="javascript:void(0);" class="badge badge-danger shadow-none" @click="removeStoredEducation(index)">
                <i class="material-symbols-outlined">delete</i>
              </a>
            </div>
          </div>
          <!-- Collapse Body -->
          <div class="collapse hide" :id="'educationaccordioninner-'+index+''" :aria-labelledby="'educationaccordion-'+index+''" data-parent="#accordion">
            <div class="card-body">
              <!-- Degree Title Input -->
              <div class="form-group">
                <input type="text" :value="stored_education.degree_title" v-bind:name="'education['+[index]+'][degree_title]'" class="form-control" :placeholder="ph_job_title" />
              </div>
              <!-- Date Picker Input-->
              <div class="form-group">
                <date-pick class="w-100"
                  v-model="stored_education.start_date"
                   :inputAttributes="{placeholder: 'Bitte Zeitraum wählen'}"
                  :weekdays="weekdayList" 
                  :months="monthsList" 
                  :nextMonthCaption="trans('lang.next_month')"
                  :prevMonthCaption="trans('lang.pre_month')"
                  :setTimeCaption="trans('lang.set_time')">
                </date-pick>
                <input type="hidden" v-bind:name="'education['+[index]+'][start_date]'" :value="stored_education.start_date" />
              </div>
              <!-- Date Picker Input -->
              <div class="form-group">
                <date-pick class="w-100"
                  v-model="stored_education.end_date"
                   :inputAttributes="{placeholder: 'Bitte Zeitraum wählen'}"
                  :weekdays="weekdayList" 
                  :months="monthsList" 
                  :nextMonthCaption="trans('lang.next_month')"
                  :prevMonthCaption="trans('lang.pre_month')"
                  :setTimeCaption="trans('lang.set_time')">
                </date-pick>
                <input type="hidden" v-bind:name="'education['+[index]+'][end_date]'" :value="stored_education.end_date" />
              </div>
              <!-- Institute Title Input -->
              <div class="form-group">
                <input type="text" :value="stored_education.institute_title" v-bind:name="'education['+[index]+'][institute_title]'" class="form-control" :placeholder="ph_institute_title" />
              </div>
              <!-- Education Description Textarea -->
              <div class="form-group">
                <textarea :value="stored_education.description" v-bind:name="'education['+[index]+'][description]'" class="form-control" :placeholder="ph_desc"></textarea>
                <small id="textareaHelpBlock" class="form-text text-muted">{{ trans('lang.date_note') }}</small>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="card">
        <li v-for="(education, index) in educations" :key="index" ref="educationlistelement" class="education-list-item">
          <!-- Collapse Head -->
          <div class="card-header d-flex justify-content-between">
            <h5>
              <button type="button" class="btn btn-link shadow-none" :id="'educationaccordion-'+education.count+''" data-toggle="collapse" :data-parent="'#educationaccordioninner-'+education.count+''">
                {{education.degree_title}} ( {{education.start_date}} - {{education.end_date}} )</button>
            </h5>
              <!-- Edit/Delete Buttons -->
              <div>
                <a href="javascript:void(0);" class="wt-addinfo badge badge-primary shadow-none" :id="'educationaccordion-'+education.count+''" data-toggle="collapse" :data-target="'#educationaccordioninner-'+education.count+''" aria-expanded="true">
                  <i class="material-symbols-outlined"></i>
                </a>
                <a href="javascript:void(0);" class="badge badge-danger shadow-none delete-education">
                  <i class="material-symbols-outlined">delete</i>
                </a>
              </div>
          </div>
          <!-- Collapse Body -->
          <div class="collapse hide" :id="'educationaccordioninner-'+education.count+''" :aria-labelledby="'educationaccordion-'+education.count+''" data-parent="#accordion">
            <div class="card-body">
              <!-- Degree Title Input -->
              <div class="form-group">
                <input type="text" v-bind:name="'education['+[education.count]+'][degree_title]'" class="form-control" :placeholder="ph_degree_title" v-model="education.degree_title" />
              </div>
              <!-- Date Picker Input-->
              <div class="form-group">
                <date-pick class="w-100"
                  v-model="education.start_date"
                  :inputAttributes="{placeholder: 'Bitte Zeitraum wählen'}"
                  :weekdays="weekdayList" 
                  :months="monthsList" 
                  :nextMonthCaption="trans('lang.next_month')"
                  :prevMonthCaption="trans('lang.pre_month')"
                  :setTimeCaption="trans('lang.set_time')">
                </date-pick>
                <input type="hidden" v-bind:name="'education['+[education.count]+'][start_date]'" :value="education.start_date" :placeholder="ph_start_date" />
              </div>
              <!-- Date Picker Input-->
              <div class="form-group">
                <date-pick class="w-100"
                  v-model="education.end_date"
                  :inputAttributes="{placeholder: 'Bitte Zeitraum wählen'}"
                  :weekdays="weekdayList" 
                  :months="monthsList" 
                  :nextMonthCaption="trans('lang.next_month')"
                  :prevMonthCaption="trans('lang.pre_month')"
                  :setTimeCaption="trans('lang.set_time')">
                </date-pick>
                <input type="hidden" v-bind:name="'education['+[education.count]+'][end_date]'" :value="education.end_date" :placeholder="ph_end_date" />
              </div>
               <!-- Institute Title Input -->
              <div class="form-group">
                <input type="text" v-bind:name="'education['+[education.count]+'][institute_title]'" class="form-control" :placeholder="ph_institute_title" />
              </div>
              <!-- Education Description Textarea -->
              <div class="form-group">
                <textarea v-bind:name="'education['+[education.count]+'][description]'" class="form-control" :placeholder="ph_desc"></textarea>
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
import dateTime from "./DateTimeComponent";
export default {
  components: { DatePick, dateTime },
  props: [
    "widget_title",
    "ph_job_title",
    "ph_institute_title",
    "ph_desc",
    "ph_degree_title",
    "ph_start_date",
    "ph_end_date",
    'weekdays',
    'months'
  ],
  data() {
    return {
      weekdayList:JSON.parse(this.weekdays),
      monthsList:JSON.parse(this.months),
      start_date: "",
      end_date: "",
      stored_educations: [],
      education: {
        institute_title: this.ph_institute_title,
        start_date: this.ph_start_date,
        end_date: this.ph_end_date,
        degree_title: this.ph_degree_title,
        description: this.ph_desc,
        count: 0
      },
      educations: [],
      freelancer_educations: [],
      count: 0
    };
  },
  methods: {
    getEducations() {
      let self = this;
      axios.get(APP_URL + "/freelancer/get-freelancer-educations")
        .then(function(response) {
          self.stored_educations = response.data.educations;
          console.log(self.stored_educations);
        });
    },
    addEducation: function() {
      // count numbers of collapsible items from <ul> element
      var education_list_count = jQuery(".add-education-btn").parents(".educationComponent").find("ul#education-list div.card li").length;
      console.log(education_list_count);
       // checking if there is any vue component that has referrence name = "educationlistelement"
      if (this.$refs.educationlistelement) {
         // count all collapsible items inside the referrence element
        this.education.count = education_list_count + this.$refs.educationlistelement.length;
      } else {
        this.education.count = education_list_count - 1;
      }
      // push new collapsible item into experiences array and increase the total number
      this.educations.push(
        Vue.util.extend({}, this.education, this.education.count++)
      );
    },
    removeStoredEducation: function(index) {
      this.stored_educations.splice(index, 1);
    }
  },
  mounted: function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    this.start_date = yyyy + '-' + mm + '-' + dd;
    this.end_date = yyyy + '-' + mm + '-' + dd;
    this.education.start_date = yyyy + '-' + mm + '-' + dd;
    this.education.end_date = yyyy + '-' + mm + '-' + dd;
    jQuery(document).on("click", ".delete-education", function(e) {
      e.preventDefault();
      var _this = jQuery(this);
      _this.parents(".education-list-item").remove();
    });
  },
  created: function() {
    this.getEducations();
  }
};
</script>