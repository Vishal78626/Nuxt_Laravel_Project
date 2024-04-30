import apiService from "@/service/apiService";

export default {
  namespaced: true,
  state: {
    token: localStorage.getItem('token') || '',
    user: '',
    test: "testing"
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
      localStorage.setItem('token', token); // Save token to local storage
    },
    setUser(state, user) {
      state.user = user;
    },
    clearAuthData(state) {
      state.token = '';
      state.user = null;
      localStorage.removeItem('token'); // Remove token from local storage
    }
  },
  actions: {
    async login({ commit }, credentials) {
      console.log(credentials);
      // try {
      //   const response = await apiService.post('/login', credentials);
      //   const { token, user } = response.data;
      //   commit('setToken', token);
      //   commit('setUser', user);
      //   return user;
      // } catch (error) {
      //   throw error;
      // }
    },
    async register({ commit }, userData) {
      try {
        const response = await apiService.post('/register', userData);
        const { token, user } = response.data;
        commit('setToken', token);
        commit('setUser', user);
        return user;
      } catch (error) {
        throw error;
      }
    },
    logout({ commit }) {
      commit('clearAuthData');
    }
  },
  getters: {
    isLoggedIn(state) {
      return !!state.token;
    },
    currentUser(state) {
      return state.user;
    }
  }
};
