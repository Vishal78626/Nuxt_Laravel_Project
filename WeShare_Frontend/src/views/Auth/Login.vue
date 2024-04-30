<template>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
              <form @submit.prevent="handleLogin">
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" v-model="email" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" v-model="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { mapState, mapActions } from 'vuex';
  export default {
    name: "Login",
    data() {
      return {
        email: '',
        password: ''
      };
    },
    computed: {
      ...mapState('auth', ['test'])
    },
    mounted() {
      console.log(this.test);
    },
    methods: {

      ...mapActions('auth', ['login']),

      async handleLogin() {
        const credentials = {
          email: this.email,
          password: this.password
        };
        await this.login(credentials);
      }
    }
  };
  </script>
  
  <style scoped>
  </style>
  