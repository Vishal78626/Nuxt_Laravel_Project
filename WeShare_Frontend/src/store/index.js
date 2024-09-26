import Vuex from 'vuex'
import auth from './auth.module';


const modules = {
    auth
};

export default new Vuex.Store({
    strict: false,
    modules
})