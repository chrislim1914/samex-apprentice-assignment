/**
 * Users store module
 */
import axios from 'axios'

import { user } from '../../api/index'

/**
 * @const state
 * @type {object}
 */
const state = {
  user: {},
  responseData: {}
}

/**
 * @const actions
 * @type {object}
 */
const actions = {
  registerUser: async (context, payload) => {
    try {
      var resp = await axios.post(user.registerUser, payload)
      context.commit('setRegisterResponse', resp.data)
    } catch (error) {
      context.commit('setRegisterResponse', 'General Error')
    }
  }
}

/**
 * @const mutations
 * @type {object}
 */
const mutations = {
  setRegisterResponse: (state, data) => {
    state.registerResponse = data
  }
}

export default {state, actions, mutations}
