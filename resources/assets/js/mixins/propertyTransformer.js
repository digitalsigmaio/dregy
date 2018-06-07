/**
 * Created by Manson on 6/7/2018.
 */

let propertyTransformer = {
    methods: {
        // language transformers
        transformer(property, attribute) {

            let key;
            switch ('{!!  \App::getLocale() !!}') {
                case 'ar':
                    key = 'ar_' + attribute;
                    return property[key];
                    break;
                case 'en':
                    key = 'en_' + attribute;
                    return property[key];
                    break;
                default:
                    return null;
                    break;
            }
        },
        name(property){
            return this.transformer(property, 'name')
        },
        address(property) {
            return this.transformer(property, 'address')
        },
        note(property) {
            return this.transformer(property, 'note')
        }
    }
};
