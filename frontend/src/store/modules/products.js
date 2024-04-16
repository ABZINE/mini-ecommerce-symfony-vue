import axios from 'axios'

// initial state
const state = {
  all: []
}

// getters
const getters = {}

// actions
const actions = {
  async getAllProducts ({ commit }) {
    try {
        const api = 'https://fakestoreapi.com/products';
        // let const api = 'https://localhost:8000/products';
        await axios.get(api).then((res) => {
            // JSON responses are automatically parsed.
            commit("setProducts", res.data);
        })
        }
      catch (error) {
        console.error(error);
      }
  }
}

// mutations
const mutations = {
  setProducts (state, products) {
    state.all = products
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}