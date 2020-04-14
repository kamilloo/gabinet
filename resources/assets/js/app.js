
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('../css/bootstrap-tagsinput.css');
var tagsInput = require('./bootstrap-tagsinput');
var fileManager = require('./vendor/laravel-filemanager/js/stand-alone-button')
var Bloodhound = require('./typeahead.bundle');
var axios = require('axios');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('file-upload', require('./components/FileUpload.vue').default);
Vue.component('wysiwig', require('./components/Wysiwyg.vue').default);
Vue.component('pricing-items', require('./components/PricingItems.vue').default);

const app = new Vue({
    el: '#app'
});

function getTags(){
    axios.get('/admin/tags')
        .then(function (response){
            initTags(response.data);

        }).catch(function (error) {
            console.log(error);
    });
}


function initTags(tags_data) {
    var tags = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: $.map(tags_data, function (tag) {
            return {
                name: tag
            };
        })
    });
    tags.initialize();

    $('input[name="tags"]').tagsinput({
        typeaheadjs: [{
            minLength: 1,
            highlight: true,
        },{
            minlength: 1,
            name: 'tags',
            displayKey: 'name',
            valueKey: 'name',
            source: tags.ttAdapter()
        }],
        freeInput: true
    });
}

getTags();

