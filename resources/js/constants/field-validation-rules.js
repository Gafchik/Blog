import  i18n  from '../plugins/i18n';


const rules = {
    required: value => !!value || i18n.global.t('validation.required'),
    email: value => new RegExp(
        /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/
    ).test(value) || i18n.global.t('validation.wrongEmail')
}

export default rules

