<template>
    <div class="col-sm-12 col-md-6 mb-4 pl-0">
        <date-pick 
            v-model="expiry_date"
            :weekdays="weekdayList"
            class="w-100"
            :months="monthsList" 
            :nextMonthCaption="trans('lang.next_month')"
            :prevMonthCaption="trans('lang.pre_month')"
            :setTimeCaption="trans('lang.set_time')">
        </date-pick>
        <input
            type="hidden"
            name="expiry_date"
            :value="expiry_date"
            :placeholder="ph_expiry_date"
        />
    </div>
</template>
<script>
import DatePick from "vue-date-pick";
export default {
    components: { DatePick },
    props: ['ph_expiry_date', 'db_expiry_date', 'weekdays', 'months'], 
    data () {
        return {
            weekdayList:JSON.parse(this.weekdays),
            monthsList:JSON.parse(this.months),
            expiry_date: this.getExpiry(),
        }
    },
    methods: {
        getExpiry:function() {
            if (this.db_expiry_date) {
                return this.db_expiry_date
            } else {
                return this.ph_expiry_date
            }
        }
    },
    watch : {
        expiry_date() {
            let input = $(".vdpComponent.vdpWithInput>input");

            input.css({
                color: "#313889",
                fontStyle: "normal",
            })
        }
    }
}
</script>
<style scoped>
.vdpComponent.vdpWithInput>input {
    outline: none;
    background: #fff;
    font-size: 14px;
    -webkit-box-shadow: none;
    box-shadow: none;
    line-height: 18px;
    padding: 14px 20px;
    border-radius: 0.75rem !important;
    display: inline-block;
    vertical-align: middle;
    border: 1px solid #dfdfeb;
    /* text-transform: inherit; */
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%;
    font-style: italic;
    color: #999999;
}
.vdpComponent.vdpWithInput>input::placeholder{
  color: #999999;
}
.vdpOuterWrap.vdpFloating {
    z-index: 4 !important;
}
.vdpFloating .vdpInnerWrap {
    max-width: 100%;
}
.vdpHeader {
    margin: -1em -1em;
    background: #fff;
}
</style>