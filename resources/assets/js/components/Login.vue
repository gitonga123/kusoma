<template>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
                  <h5 class="text-uppercase text-center">Login</h5>
                  <br><br>
                  <form>
                      <ul class="list-group alert alert-danger" v-if="errors.length > 0">
                          <li class="list-group-item" v-for="error in errors" v-text="error" :key="errors.indexOf(error)"></li>
                      </ul>
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="Email" v-model="email">
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" v-model="password">
                    </div>

                    <div class="form-group flexbox py-10">
                      <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" v-model="remember" checked>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Remember me</span>
                      </label>

                      <a class="text-muted hover-primary fs-13" href="#">Forgot password?</a>
                    </div>

                    <div class="form-group">
                      <button class="btn btn-bold btn-block btn-primary" :disabled="!isValidLoginForm" type="submit" @click="attemptLogin()">Login</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                email : ``,
                password: ``,
                remember: true,
                loading: false,
                errors: []
            }
        },
        methods: {
            emailIsValid() {
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(this.email.value.match(mailformat))                {
                    return false;
                } else {
                    // alert("You have entered an invalid email address!");
                    return false;
                }
            },
            attemptLogin() {
                this.errors = [];
                this.lading = true;
                axios.post('/login', {
                    email: this.email, password: this.password, remember: this.remember
                }).then(resp => {
                    location.reload();
                }).catch(error => {
                    this.loading = false;
                    if (error.response.status == 422) {
                        this.errors.push("We couldn't verify your account details");
                    } else {
                         this.errors.push("Ooops!, Something went Wrong. Please Refresh your server");
                    }
                });
            }
        },
        computed: {
            isValidLoginForm() {
                return this.emailIsValid && this.password && !this.loading
            }
        }
    }
</script>
