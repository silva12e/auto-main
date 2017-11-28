<template>
	<div class="container">
        <div class="row">
            <div class="col-md-12">
            	<h1  class="heading"><i class="fa fa-calendar"></i> Create New Appointment</h1>
            </div>
        </div>
        <div class="main">
	        <form @submit.prevent="submit">
	       	 	<div class="row appointment-forms">
		        	<div class="col-md-12">
		        		<h3 style="color:black" class="heading"><i class="fa fa-user"></i> Customer Details</h3><hr>
		        	</div>
		        </div>
		        <div class="row appointment-forms">
		        	<div class="col-md-6">
						<label class="form-label">Customer/Owner</label>
						<select @change="showVehicleFormSection" v-model="customers.id" name="customer_id" class="form-control">
							<option disabled></option>
							<option v-for="customer in customers" :value="customer.id">
								{{ customer.name }}
							</option>
						</select>
					</div>
		        </div>
		        <div v-if="showVehicleSection">
		        	<div class="row appointment-forms">
			        	<div class="col-md-12">
			        		<h3 style="color:black" class="heading"><i class="fa fa-car"></i> Vehicle Details</h3><hr>
			        	</div>
			        </div>
			        <div class="row appointment-forms">
			        	<div class="col-md-6">
							<label class="form-label">Vehicle</label>
							<select @change="showAppointmentFormSection()" v-model="vehicle.id" name="vehicle_id" class="form-control">
								<option disabled></option>
								<option v-for="vehicle in vehicles" :value="vehicle.id">
									{{ vehicle.year }} {{ vehicle.make }} {{ vehicle.model }}
								</option>
							</select>
						</div>
			        </div>
		        </div>
		        <div v-if="showAppointmentSection">
				    <div class="row appointment-forms">
			        	<div class="col-md-12">
			        		<h3 style="color:black" class="heading"><i class="fa fa-calendar"></i> Appointment Details</h3><hr>
			        	</div>
			        </div>
				     <div class="row" style="padding:40px;">
			        	<div class="form-area form-group">
							<div class="col-md-8">
								<label class="form-label">Date</label>
								<datepicker  format="dd MM yy" :value="appointmentDate" name="date"></datepicker>
							</div>
							<div class="col-md-6">
								<label class="form-label">Date</label>
								<input class="form-control" type="text" name="time" placeholder="eg. 1:00 pm">
							</div>
							<div class="col-md-8">
								<label class="form-label">Service</label>
								<select v-model="services.id" name="service_id" class="form-control">
									<option  v-for="service in services" :value="service.id">
										{{ service.title }}
									</option>
								</select>
							</div>
				        </div>
				    </div>
				    <div class="row" style="padding:40px;">
			        	<div class="form-area form-group">
							<div class="col-md-6">
								<button class="btn btn-success"><i class="fa fa-plus"></i> Create new appointment</button>
							</div>
				        </div>
				    </div>
				</div>
			</form>
		</div>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
export default {
    data()
    {
        return {
        	showAppointmentSection:false,
        	showVehicleSection:false,
        	customers:[],
        	customer:[],
        	vehicle:[],
        	vehicles:[],
        	types:[],
        	services:[],
        	myTime: '',
        	appointmentDate:'',

        }
    },
    filters:
    {
        moment: function (date)
        {
            if(date==null)return '';
            return moment(date).format('MMMM Do YYYY');
        }
    },
    components: {
    	Datepicker,
  	},
    mounted()
    {
    	this.init();

	},
	methods:
	{
		showVehicleFormSection()
		{
			this.showVehicleSection = true;
			axios.post('/vehicles/customer-vehicle/'+ this.customers.id).then(response =>{
				this.vehicles = response.data.vehicles;
			});

		},
		showAppointmentFormSection()
		{

			this.showAppointmentSection = true;
			axios.post('/service/type/'+ this.vehicle.id).then(response =>{
				this.services = response.data.services;
			});

		},
		submit()
		{

    		let formData = new FormData(event.target);
    		this.$validator.validateAll().then((result) => {
             if (result) {
             	axios.post('/appointments/book-appointment', formData).then(response =>{
					console.log('new Appointment created!'),
					this.init();
				});
				swal({
                      title: 'Success!',
                      text:  'Your appointment has been booked',
                      type: 'success',
                      timer:5000
                    });

				 window.location.href = '/appointments/all-appointments';
             }});
		},
		init()
    	{
    		axios.post('/vehicle-types/types').then(response =>{
				this.types = response.data.types;
				this.customers = response.data.customers;
			});
		},
	}
}
</script>

