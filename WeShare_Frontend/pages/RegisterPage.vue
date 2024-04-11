<template>
    <body>
        <div class="register-container">
      <h2>Welcome User</h2>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" v-model="formData.name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="formData.email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" v-model="formData.password" required>
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
    </body>
  </template>
  
  <script>
  import axios from 'axios';
  export default {
    name:"RegisterPage",
    data() {
      return {
        formData: {
        name: '',
        email: '',
        password:''
      }
      };
    },
    methods: {
      submitForm() {
        if (!this.formData.name||!this.formData.email || !this.formData.password) {
        alert('Please fill in both email and password');
        return;
      }
      axios.post('/api/register', this.formData)
        .then(response => {
          console.log(response.data);
        //   this.$router.push('/login');
        })
        .catch(error => {
          console.error(error);
        });
      }
    }
  };
  </script>
  
<style scoped>
  body {
  background-image: url('./bg2.png');
  background-size: cover;
  background-position: center;
  /* background-repeat: no-repeat; */
}
.register-container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
  color: yellow;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  text-align: center;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  color: black;
  font-weight: bold;
}

input {
  width: 100%;
  padding: 8px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  transition: border-color 0.3s;
}

input:focus {
  outline: none;
  border-color: yellow;
}

button {
  width: 100%;
  padding: 10px;
  background-color: yellow;
  color: black;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s, color 0.3s;
}

button:hover {
  background-color: black;
  color: yellow;
}
</style>

  