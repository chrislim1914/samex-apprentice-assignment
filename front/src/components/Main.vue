<template>
  <!-- app-main -->
  <div class="app-main">
    <div class="overlay"></div>
    <div class="form-wrap">
      <h1 class="mt-5">Registration</h1>
      <form class="mt-5" @submit.prevent="register" novalidate>
        <div class="form-group mb-4">
          <label for="first-name">First Name*</label>
          <input type="text" id="first-name" v-model="firstname">
          <div class="text-danger form-text" v-if="errorNoFirstName">
            <i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>
            First name is needed!
          </div>
        </div>
        <div class="form-group mb-4">
          <label for="lastname">Last Name</label>
          <input type="text" id="lastname" v-model="lastname">
        </div>
        <div class="form-group mb-4">
          <label for="emailadd">Email Address*</label>
          <input type="text" id="emailadd" v-model="email">
          <div class="text-danger form-text" v-if="errorInvalidEmail">
            <i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>
            Please Enter Valid Email Address!
          </div>
        </div>
        <div class="form-group mb-5">
          <label for="phoneno">Phone Number</label>
          <input type="text" id="phoneno" v-model="phoneno">
        </div>
        <div class="form-group">
          <button type="submit">
            Register
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import validate from '@/validate'
export default {
  name: 'MainComponent',
  data () {
    return {
      firstname: '',
      lastname: '',
      email: '',
      phoneno: '',
      errorInvalidEmail: false,
      errorNoFirstName: false
    }
  },
  computed: {
    ...mapState({
      user: ({users}) => users.user,
      registerResponse: ({users}) => users.registerResponse
    })
  },
  watch: {
    phoneno (c) {
      this.phoneno = c.replace(/[^0-9]/g, '')
    }
  },
  methods: {
    ...mapActions([
      'registerUser'
    ]),
    register () {
      this.errorNoFirstName = !this.firstname
      this.errorInvalidEmail = !validate.isEmail(this.email)

      if (
        this.errorNoFirstName ||
        this.errorInvalidEmail
      ) {
        return
      }

      this.registerUser({
        email: this.email,
        firstname: this.firstname.trim(),
        lastname: this.lastname.trim(),
        phoneno: this.phoneno
      }).then(() => {
        this.$toasted.show(
          'Registration completed.',
          {type: 'success'}
        )
        this.firstname = ''
        this.lastname = ''
        this.email = ''
        this.phoneno = ''
      })
    }
  }
}
</script>

<style lang='scss' scoped>
  @import '~scss/main.scss';
</style>
