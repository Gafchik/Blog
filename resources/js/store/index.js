import { createStore } from 'vuex'
import AuthStore from "./core/auth-store";

export const store = createStore({
    modules: {
        authStore: AuthStore,
    }
})
