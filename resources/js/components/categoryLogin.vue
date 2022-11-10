<template>
<!-- Sign in Modal -->
<div class="modal fade show" id="modal-signin" tabindex="-1" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">

        <!-- Sign in form -->
        <div class="cs-view show" id="modal-signin-view">
            <div class="modal-header border-0 pb-0 px-md-5 px-4 d-block position-relative">
            <h3 class="modal-title mt-4 mb-0 text-center">Anmelden</h3>
            <button type="button" class="close position-absolute" style="top: 1.5rem; right: 1.5rem;" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
            </div>
            <div class="modal-body px-md-5 px-4">
            <p class="font-size-sm text-muted text-center">Melden Sie sich mit der bei der Registrierung angegebenen E-Mail und dem Passwort bei Ihrem Konto an.</p>
            <form class="needs-validation" @submit.prevent="login">
                <div class="form-group" v-if="loginFailed">
                    <div class="alert alert-danger">
                        <span class="text-muted">{{ loginFailedMsg }}</span>
                    </div>
                </div>
                <div class="form-group">
                <label for="signin-email">Email</label>
                <input type="email" class="form-control" id="signin-email" placeholder="E-Mail Adresse" v-model="form.email"
                 :class="{ 'is-invalid': form.errors.has('email') }">
                 <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group">
                <label for="signin-password" class="form-label">Passwort</label>
                <div class="cs-password-toggle input-group-overlay">
                    <input type="password" class="form-control appended-form-control" id="signin-password" placeholder="Passwort" v-model="form.password"
                    :class="{ 'is-invalid': form.errors.has('password') }">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <has-error :form="form" field="password"></has-error>
                    
                </div>
                </div>
                <div class="d-flex justify-content-between align-items-center form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember-me" v-model="form.remember">
                    <label for="remember-me" class="custom-control-label">Remember me</label>
                </div>
                <a href="https://arbeitshilfe.website/password/reset" class="font-size-sm text-decoration-none">Passwort vergessen?</a>
                </div>
                <button :disabled="form.busy" type="submit" class="btn btn-primary btn-hover-shadow btn-block">Sign in</button>
                <p class="font-size-sm pt-4 mb-0 text-muted">
                    Sie haben noch kein Konto?
                    <a href="https://arbeitshilfe.website/register" class="font-weight-bold text-decoration-none" data-view="#modal-signup-view">Benutzerkonto anlegen</a>
                  </p>
            </form>
            </div>
        </div>
        <div class="modal-body text-center px-0 pt-2 pb-4">
              <hr>
              <p class="font-size-sm text-heading mb-3 pt-4"></p>
              
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Vue from 'vue';
import { HasError, AlertError } from 'vform/src/components/bootstrap4';

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
export default {
    data(){
        return{
            form : new Form({
                email: '',
                password: '',
                remember: false
            }),
            loginFailed : false,
            loginFailedMsg: '',
        }
    },
    methods:{
        login(){
            this.form.post('/login-from-category').then((resp)=>{
                console.log(resp.data);
                if(resp.data.status == "FAIL"){
                    this.loginFailed = true;
                    this.loginFailedMsg = resp.data.msg;
                }
                else if(resp.data.status == "OK"){
                    this.loginFailed = false;
                    this.loginFailedMsg='';
                    window.location.href = resp.data.url;
                }
            }).catch((err)=>{
                console.log(err.response.data);
            });

        }
    }
}

$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

<style>
.btn-primary {
    color: #fff;
    background-color: #ff3f3a;
    border-color: #ff3f3a;
    box-shadow: none;
}
.btn-hover-shadow:hover.btn-primary {
    box-shadow: 0 0.5rem 1.125rem -0.5rem rgb(255 63 58 / 92%);
}
.btn-primary:hover {
    color: #fff;
    background-color: #ff1a14;
    border-color: #ff0d07;
}
.custom-control-input:checked ~ .custom-control-label::before {
    color: #fff;
    border-color: #ff3f3a;
    background-color: #ff3f3a;
}
.field-icon {
    float: right;
    margin-top: -32px;
    position: relative;
    z-index: 12;
    padding-right: 33px;
    font-size: 17px;
    cursor: pointer;
}
</style>