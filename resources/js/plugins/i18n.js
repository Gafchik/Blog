import { createI18n } from 'vue-i18n'
import ukr from '../locales/ukr/main_locale.js'
import rus from '../locales/rus/main_locale.js'


export default createI18n({
    legacy: false,
    locale: 'ukr',
    fallbackLocale: 'rus',
    messages: {
        ukr: ukr,
        rus: rus
    }
})
