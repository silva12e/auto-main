require('./bootstrap');

window.Vue = require('vue');
import VeeValidate from 'vee-validate';
import VueSweetAlert from 'vue-sweetalert';
import vmodal from 'vue-js-modal';
import Notifications from 'vue-notification';
import money from 'v-money';
import 'vue-event-calendar/dist/style.css';
import vueEventCalendar from 'vue-event-calendar';
import VueMask from 'v-mask';
import Vuetify from 'vuetify';
 
Vue.use(Vuetify);
Vue.use(VueMask);
Vue.use(vueEventCalendar, {locale: 'en'}) 
Vue.use(money, {precision: 4});
Vue.use(Notifications);
Vue.use(vmodal);
Vue.use(VeeValidate);
Vue.use(VueSweetAlert);

Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('vehicle-types', require('./components/VehicleTypes.vue'));
Vue.component('service-dashboard', require('./components/car_services/Index.vue'));
Vue.component('car-services', require('./components/car_services/Services.vue'));
Vue.component('service-list', require('./components/car_services/ServiceByType.vue'));
Vue.component('services', require('./components/Services.vue'))
Vue.component('appointments', require('./components/Appointments.vue'));
Vue.component('appointment-index', require('./components/appointments/Index.vue'));
Vue.component('create-appointment', require('./components/appointments/Create.vue'));
Vue.component('vehicles-index', require('./components/vehicles/Index.vue'));
Vue.component('customers-index', require('./components/customers/Index.vue'));

window.swal = require('sweetalert2');

const app = new Vue({
    el: '#app'
});


$(document).ready(function () 
{
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () 
    {
      hamburger_cross();      
    });

    function hamburger_cross() 
    {
      if (isClosed == true) 
      {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } 
      else 
      {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  $('[data-toggle="offcanvas"]').click(function () 
  {
        $('#wrapper').toggleClass('toggled');
  });  
});