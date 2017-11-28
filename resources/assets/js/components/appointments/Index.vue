<template>
	<div class="container">
    <modal name="edit-appointment" :height="'850px'" :width="'850px'"  style="background-color:#f14444">
      <div class="container">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="modal-header"><i class="fa fa-pencil"></i> Edit Appointment</h3>
          </div>
          <div class="panel-body">
             <div class="row" style="padding:40px;">
                  <div class="form-area form-group">
                <div class="col-md-8">
                  <label class="form-label">Date</label>
                  <datepicker  format="dd MM yy" :value="appointment.time" name="date"></datepicker>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Time</label>
                  <input v-mdoel class="form-control" type="text" name="time" placeholder="eg. 1:00 pm">
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
          </div>
        </div>
      </div>
    </modal>
   <modal name="show-appointment" :height="'850px'" :width="'850px'"  style="background-color:#f14444">
      <div class="container">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="modal-header"><i class="fa fa-calendar"></i> Appointment Information</h3>
          </div>
          <div class="panel-body">
            <table class="table-users table-responsive table">
              <tbody>
                  <tr>
                      <th># Appointment ID</th>
                      <td>{{ appointment.id }}</td>
                  </tr>
                  <tr>
                      <th>Appointment Service</th>
                      <td>{{ service.title }}</td>
                  </tr>
                  <tr>
                      <th>Date/Time</th>
                      <td>{{ appointment.date }} / {{ appointment.time }}</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel">
          <div class="panel-heading">
            <h3 class="modal-header"><i class="fa fa-user"></i> Registered Owner</h3>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel-body">
                <table style="width:50%" class="table-users table table-responsive">
                    <thead>
                        <tr>
                          <th># Customer ID </th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>{{ customer.id }}</td>
                          <td>{{ customer.name }}</td>
                          <td>{{ customer.email }}</td>
                          <td>{{ customer.primary_phone_number }}</td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="panel-heading">
            <h3 class="modal-header"><i class="fa fa-vehicle"></i> Vehicle information</h3>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel-body">
                <table style="width:50%" class="table-users table table-responsive">
                        <thead>
                            <tr>
                              <th># Vehicle ID </th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>{{ vehicle.id }}</td>
                              <td>{{ vehicle.make }}</td>
                              <td>{{ vehicle.model }}</td>
                              <td>{{ vehicle.year }}</td>
                            </tr>
                        </tbody>
                    </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </modal>
  <div class="row">
      <h1  class="heading"><i class="fa fa-wrench"></i> Appointments</h1>
  </div>
  <div class="row" style="background-color:white; border: 1px solid black;">
      <div class="col-md-12">
          <h3 style="color:black">All Appointments</h3>
      </div>
      <div class="col-md-4"></div>
          <table class="table-users table table-hover" border="0">
              <thead>
                  <tr>
                      <th># Appointment ID</th>
                      <th>Service</th>
                      <th>Date/Time</th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="appointment in appointments">
                      <td>{{ appointment.id }}</td>
                      <td>{{ appointment.service.title }}</td>
                      <td>{{ appointment.date }} {{ appointment.time }}</td>
                      <td style="padding-right:5px;">
                          <i @click="show(appointment.id)" class="fa fa-eye"></i>
                          <i @click="edit(appointment.id)" class="fa fa-pencil"></i>
                          <i @click="remove(appointment.id)" class="fa fa-trash"></i>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>

    </div>
  </div>
</div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
export default {
 	data () {
		return {
  		appointments:[],
      appointment:[],
      customer:[],
      vehicle:[],
      service:[],
      services:[],
      appointmentDate:'',
		}	
  	},
  	mounted()
  	{
  		this.init();
  	},
  	methods:
  	{
      show(id)
      {
        this.$modal.show('show-appointment');
        axios.post('/appointments/show/'+ id).then(response=>{
          this.appointment = response.data.appointment;
          this.vehicle = response.data.appointment.vehicle;
          this.customer = response.data.appointment.customer;
          this.service = response.data.appointment.service;
        });
      },
  		init()
  		{
  			axios.post('/appointments/all-appointments').then(response =>{
  				this.appointments = response.data.appointments;
        this.services = response.data.services;
  			});	
  		},
      remove(id)
      {
        axios.post('/appointments/remove/'+ id).then(response=>{
        swal({
           title: 'appointment Removed!',
           text:  'You have successfully removed this appointment',
           type: 'success',
           timer: 5000
         });
         this.init();
        });
      },
      edit(id)
      {
        this.$modal.show('show-appointment');
        axios.post('/appointments/show/'+ id).then(response=>{
          this.appointment = response.data.appointment;
          this.vehicle = response.data.appointment.vehicle;
          this.customer = response.data.appointment.customer;
          this.service = response.data.appointment.service;
        });
        this.$modal.show('edit-appointment');
      },
      update(id)
      {
        let formData = new FormData(event.target);
          axios.post('/appointments/update/'+id, formData).then(response =>{
        console.log('appointment has been updated'),
        this.init();
      });
      swal({
            title: 'Success!',
            text:  'Your appointment has been Updated!',
            type: 'success',
            timer:5000
          });
      },
  	}
}
</script>