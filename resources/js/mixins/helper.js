export default {
    computed: {
        currentLanguage() {
            return this.$i18n.locale;
        }
    },
    methods: {
        formatLabel(name, price) {
            if (price) {
                return `${name} (+${price}SR)`;
            }
            return name;
        }
    }
};
