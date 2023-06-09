import { createStore } from 'vuex'
import AuthStore from "./core/auth-store";
import CoreStore from "./core/core-store";
import Publication from "./publication/publication-store";
import createPersistedState from 'vuex-persistedstate'


export const store = createStore({
    plugins:[
        createPersistedState()
    ],
    modules: {
        authStore: AuthStore,
        coreStore: CoreStore,
        publication: Publication,
    }
})
