import axios from "../../modules/axios_module";

const state = {
    publication: [],
    myPublication: [],
};

const getters = {
    publication: state => {
        return state.publication
    },
    myPublication: state => {
        return state.myPublication
    },
};

const mutations = {
    setPublication: (state, payload) => {
        state.publication = payload;
    },
    setMyPublication: (state, payload) => {
        state.myPublication = payload;
    },
};

const actions = {
    sendPublicationAsync: async ({commit}, payload) => {
        return await axios.post('/publication/send', payload)
            .then(({data}) =>{

            }).catch(err =>{
            })
    },
    getPublicationAllAsync: async ({commit}, payload) => {
        return await axios.post('/publication/get-all', payload)
            .then(({data}) =>{
                commit('setPublication',data.data)
            }).catch(err =>{
            })
    },
    getPublicationMyAsync: async ({commit}, payload) => {
        return await axios.post('/publication/get-my', payload)
            .then(({data}) =>{
                commit('setMyPublication',data.data)
            }).catch(err =>{
            })
    },
    deletePublicationAsync: async ({commit}, payload) => {
        return await axios.post('/publication/delete', payload)
            .then(({data}) =>{

            }).catch(err =>{
            })
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
};
