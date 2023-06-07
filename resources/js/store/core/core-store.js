
const state = {
    navigationDrawer: false,
};

const getters = {
    navigationDrawer: state => {
        return state.navigationDrawer
    },
};

const mutations = {
    setNavigationDrawer: (state, payload) => {
        state.navigationDrawer = payload;
    },
};

const actions = {
    setNavigationDrawerAsync: async ({commit}, payload) => {
        commit('setNavigationDrawer', payload);
    },
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
};
