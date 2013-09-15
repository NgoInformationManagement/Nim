//(function(){
    var viewModel = {
        toto: function(formId) {
            alert('fqfqsdfqsd' + formId);
        }
    };

    ko.applyBindings(viewModel, $('#left').get(0));
//})();



/**
 * Create a "mockup" of a class, it can be based on an other mockup (extend)
 * It works with a anonymous function (you can manage private attribute and method)
 * of
 *
 * @param classDefinition
 * @param extendedDefinition
 * @returns {*}
 * @constructor
 */
//var Object = function(classDefinition, extendedDefinition) {
//    if (extendedDefinition) {
//        for (key in extendedDefinition) {
//            if (extendedDefinition.hasOwnProperty(key)) {
//                this[key] = this['parent'][key] = extendedDefinition[key];
//            }
//        }
//    }
//
//    for (key in classDefinition) {
//        if (classDefinition.hasOwnProperty(key)) {
//            this[key] = classDefinition[key];
//        }
//    }
//
//    return this;
//};
//
//NIM.toolbar = new Object({
//    connard: 'jj',
//    submitForm: function(formId) {
//        $(formId).submit();
//    }
//});
//NIM.toolbar2 = new Object({
//    submitForm: function(formId) {
//        alert(this.connard);
//        this.parent.submitForm(formId);
//    }
//}, NIM.toolbar);

//NIM.toolbar = new Class((function(){
//    var privateattr = 'privatetoolbar';
//    return {
//        publicattr: 'publictoolbar',
//        submitForm: function(formId) {
//            alert(privateattr + ' ' + this.publicattr);
//            //$(formId).submit();
//        }
//    }
//})());
//
//NIM.toolbar2 = new Class((function(){
//    var privateattr = 'privatetoolbar2';
//    return {
//        publicattr: 'publictoolbar2',
//        submitForm: function(formId) {
//            alert(privateattr + ' ' + this.publicattr);
//            this.parent.submitForm(formId);
//            //$(formId).submit();
//        }
//    }
//})(), NIM.toolbar);


//NIM.toolbar2 = (function(parent) {
////    var that = {},
////        key;
////
////    for (key in parent) {
////        if (parent.hasOwnProperty(key)) {
////            that[key] = parent[key];
////        }
////    }
//
//    return {
//        toto: function () {
//            alert('otot');
//        },
//        submitForm: function(formId) {
//            alert(parent.connard);
//            this.toto();
//            parent.submitForm(formId);
//        }
//    }
//})(NIM.toolbar);