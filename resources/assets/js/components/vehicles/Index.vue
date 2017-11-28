<template>
	<div class="container">
		<modal name="show-vehicle" :height="'850px'" :width="'850px'"  style="background-color:#f14444">
	        <div class="container">
	        	<div class="panel">
	        		<div class="panel-heading">
	        			<h3 class="modal-header"><i class="fa fa-user"></i> Vehicle Information</h3>
	        		</div>
	        		<div class="panel-body">
	        			<table class="table-users table-responsive table">
		                    <tbody>
						        <tr>
						          	<th># Vehicle ID</th>
						            <td> {{ vehicle.id }} </td>
						        </tr>
						        <tr>
						          <th>Make</th>
						            <td> {{ vehicle.make }} </td>
						        </tr>
						        <tr>
						          <th>Model</th>
						            <td> {{ vehicle.model }} </td>
						        </tr>
						        <tr>
						          <th>Year</th>
						            <td> {{ vehicle.year }} </td>
						        </tr>
						      	<tr>
						          <th>Mileage </th>
						            <td> {{ vehicle.odometer_meter }} </td>
						        </tr>
						        <tr>
						          <th>Engine</th>
						            <td> {{ vehicle.engine }} </td>
						        </tr>
						        <tr>
						          	<th>Color</th>
						            <td> {{ vehicle.color }} </td>
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
	        	</div>
		    </div>
	    </modal>
	    <modal name="edit-vehicle" :height="'850px'" :width="'850px'" style="background-color:#f14444">
			<div class="container">
				<form @submit.prevent="update(vehicle.id)">
	    			<div class="row appointment-forms" >
			        	<div class="col-md-12">
			        		<h3 style="color:black" class="heading"><i class="fa fa-car"></i> Update Vehicle</h3><hr>
			        	</div>
			        </div>  
			        <div class="row appointment-forms" >
			        	<div class="form-area form-group">
							<div class="col-md-8">
								<label class="form-label">Make</label>
								<input v-model="vehicle.make" class="form-control" type="text" name="make">
							</div>
							<div class="col-md-8">
								<label class="form-label">Model</label>
								<input v-model="vehicle.model" class="form-control" type="text" name="model">
							</div>
							<div class="col-md-8">
								<label class="form-label">Year</label>
								<input v-model="vehicle.year" class="form-control" type="number" name="year">
							</div>
							<div class="col-md-8">
								<label class="form-label">Color</label>
								<input v-model="vehicle.color" class="form-control" type="text" name="color">
							</div>
							<div class="col-md-8">
								<label class="form-label">Engine</label>
								<input v-model="vehicle.engine" class="form-control" type="text" name="engine">
							</div>
							<div class="col-md-8">
								<label class="form-label">Mileage</label>
								<input v-model="vehicle.odometer_meter" class="form-control" type="text" name="odometer_meter">
							</div>
							<div class="col-md-8">
								<label class="form-label">Vehicle type</label>
								<select v-model="type_id" name="type_id" class="form-control">
									<option  v-for="type in types" :value="type.id">{{type.type}}</option>
								</select>
							</div>
							<div class="col-md-6" style="padding-top:40px;">
								<button class="button">
									<i class="fa fa-"></i> Update vehicle
								</button>
							</div>
				        </div>
				    </div>
				</form>
			</div>
		</modal>
		<div class="row" style="color:#fff">
			<h1 class="heading"><i class="fa fa-car"></i> Vehicles</h1>
		</div>
		<div class="main">
			<div class="row">
				<div class="col-md-12" style="padding:20px;">
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#index" aria-controls="index" role="tab" data-toggle="tab">All vehicles</a></li>
				    <li role="presentation"><a href="#create" aria-controls="create" role="tab" data-toggle="tab">Create new vehicle</a></li>
				  </ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="padding:40px;">
					<div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="index">
					    	<div class="row" style="background-color:white;">
								<div class="col-md-12">
									<h3 style="color:black">All Vehicle Types</h3>
								</div>
								<div class="col-md-4"></div>
								<div v-if="vehicles != ''" class="col-md-12" style="margin-top:80px;margin-bottom:80px;">
									<table class="table-users table" border="0">
					                    <thead>
					                        <tr>
					                        	<th># Vehicle ID </th>
					                            <th>Year</th>
					                            <th>Make</th>
					                            <th>Model</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <tr v-for="vehicle in vehicles">
					                            <td>{{ vehicle.id }}</td>
					                            <td>{{ vehicle.year }}</td>
					                            <td>{{ vehicle.make }}</td>
					                            <td>{{ vehicle.model }}</td>
					                            <td><i @click="show(vehicle.id)" class="fa fa-eye"></i></td>
					                            <td><i @click="edit(vehicle.id)" class="fa fa-pencil"></i></td>
					                            <td><i @click="remove(vehicle.id)" class="fa fa-trash"></i></td>
					                        </tr>
					                    </tbody>
					                </table>
								</div>
								<div v-else class="col-md-4" style="margin-top:80px;margin-bottom:80px;">
									<p style="color:red">No records to show. Please, Add new vehicles</p>
								</div>
							</div>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="create">
					    	<form @submit.prevent="submit">
					    		<div class="row appointment-forms" >
						        	<div class="col-md-12">
						        		<h3 style="color:black" class="heading"><i class="fa fa-user"></i> Owner/Customer information</h3><hr>
						        	</div>
						        </div>  
						        <div class="row appointment-forms" >
						        	<div class="form-area form-group">
										<div class="col-md-12">
											<label class="form-label">Vehicle owner/Customer</label>
					                        <select @change="customerSelect" v-model="customers.id" name="customer_id" class="form-control">
					                        <option disabled></option>
					                        <option v-for="customer in customers" :value="customer.id">{{customer.name}}</option>
					                      </select>
										</div>
									</div>
								</div>
					    		<div v-if="customerSelected">
					    			<div class="row appointment-forms" >
							        	<div class="col-md-12">
							        		<h3 style="color:black" class="heading"><i class="fa fa-car"></i> Vehicle information</h3><hr>
							        	</div>
							        </div>  
							        <div class="row appointment-forms" >
							        	<div class="form-area form-group">
											<div class="col-md-12">
												<label class="form-label">Make</label>
												<input class="form-control" type="text" name="make">
											</div>
											<div class="col-md-12">
												<label class="form-label">Model</label>
												<input class="form-control" type="text" name="model">
											</div>
											<div class="col-md-12">
												<label class="form-label">Year</label>
												<input class="form-control" type="number" name="year">
											</div>
											<div class="col-md-12">
												<label class="form-label">Color</label>
												<input class="form-control" type="text" name="color">
											</div>
											<div class="col-md-12">
												<label class="form-label">Engine</label>
												<input class="form-control" type="text" name="engine">
											</div>
											<div class="col-md-12">
												<label class="form-label">Mileage</label>
												<input class="form-control" type="text" name="odometer_meter">
											</div>
											<div class="col-md-12">
												<label class="form-label">Vehicle type</label>
												<select v-model="type_id" name="type_id" class="form-control">
													<option  v-for="type in types" :value="type.id">{{type.type}}</option>
												</select>
											</div>
											<div class="col-md-6" style="padding-top:40px;">
												<button class="button">
													<i class="fa fa-plus"></i> Create new vehicle
												</button>
											</div>
								        </div>
								    </div>
					    		</div>
							</form>
					    </div>
					 </div>
				</div>
			</div>	
		</div>
	</div>
	</div>
</template>
<script>
export default {
    data() 
    {
        return {
            types:[],
            vehicles:[],
            customers:[],
            customer:[],
            vehicle:[],
            customerSelected: false,
            type_id:'',
        }
    },
    mounted()
    {
        this.init();
	},
    methods:
    {
    	test()
    	{
    		alert('hi');
    	},
    	customerSelect()
    	{
    		this.customerSelected = true;
    	},
    	submit(event) 
    	{
    		let formData = new FormData(event.target);
    		this.$validator.validateAll().then((result) => {
             if (result) {
             	axios.post('/vehicles/store-vehicle', formData).then(response =>{
					console.log('new Vehicle type has been created'),
					this.init();
				});
				swal({
                      title: 'Success!',
                      text:  'Your Vehicle type has been created',
                      type: 'success',
                      timer:5000
                    });
				event.target.reset();
             }});
    	},
    	init: function()
    	{
    		axios.post('/vehicles/all').then(response =>{
				this.vehicles = response.data.vehicles;
				this.types = response.data.types;
				this.customers = response.data.customers;
			});
    	},
    	remove(id)
	  	{
	  		axios.post('/vehicles/remove/'+ id).then(response=>{
            swal({
                   title: 'Vehicle Removed!',
                   text:  'You have successfully removed this vehicle',
                   type: 'success',
                   timer: 5000
                 });
                 this.init();
            });
	  	},
	  	show(id)
	  	{
	  		axios.post('/vehicles/show/'+ id).then(response=>{
	  			this.vehicle = response.data.vehicle;
	  			this.customer = response.data.customer;
	  		});
	  		this.$modal.show('show-vehicle');
	  	},
	  	edit(id)
	  	{
	  		axios.post('/vehicles/show/'+ id).then(response=>{
	  			this.vehicle = response.data.vehicle;
	  			this.customer = response.data.customer;
	  		});
	  		this.$modal.show('edit-vehicle');
	  	},
	  	update(id)
	  	{
  			let formData = new FormData(event.target);
         	axios.post('/vehicles/update/'+id, formData).then(response =>{
				console.log('Customer had been updated'),
				this.init();
			});
			swal({
              title: 'Success!',
              text:  'Your vehicle has been Updated!',
              type: 'success',
              timer:5000
            });
	  	},
    }
}
</script>