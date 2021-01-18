// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import Toasted from 'vue-toasted'

Vue.config.productionTip = false

// plugins
Vue.use(
  Toasted,
  {
    duration: 3000,
    position: 'top-center',
    theme: 'bubble'
  }
)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
