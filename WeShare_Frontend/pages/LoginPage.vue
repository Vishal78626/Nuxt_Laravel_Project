<template>
    <div class="login-container">
      <div class="login-box">
        <h2 class="login-heading">Login</h2>
        <form @submit.prevent="login">
          <input type="email" v-model="email" placeholder="Email" class="login-input" required>
          <input type="password" v-model="password" placeholder="Password" class="login-input" required>
          <button type="submit" class="login-button">Login</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
        password: ''
      };
    },
    methods: {
      login() {
        // Handle login logic here
      }
    }
  };
  </script>
  
  <style scoped>
  .login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: yellow;
  }
  
  .login-box {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  
  .login-heading {
    color: black;
    text-align: center;
  }
  
  .login-input {
    width: 100%;
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  .login-button {
    width: 100%;
    padding: 8px;
    background-color: black;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  </style>
  