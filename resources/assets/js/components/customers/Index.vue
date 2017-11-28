<template>
	<div class="container">
	    <modal name="show-customer" :height="'850px'" :width="'850px'" style="background-color:#f14444">
			<div class="container">
	        	<div class="panel">
	        		<div class="panel-heading">
	        			<h3 class="modal-header"><i class="fa fa-user"></i> Customer Information <small>({{ customer.name }})</small></h3>
	        		</div>
	        		<div class="panel-body">
	        			<table class="table-users table-responsive table">
		                    <tbody>
						        <tr>
						          	<th># Customer ID </th>
						            <td> {{ customer.id }} </td>
						        </tr>
						        <tr>
						          <th>Name </th>
						            <td> {{ customer.name }} </td>
						        </tr>
						        <tr>
						          <th>Email </th>
						            <td> {{ customer.email }} </td>
						        </tr>
						      	<tr>
						          <th>Address </th>
						            <td> {{ customer.street_address }} </td>
						        </tr>
						        <tr>
						          <th>Postal Code </th>
						            <td> {{ customer.postal_code }} </td>
						        </tr>
						        <tr>
						          	<th>Primary Phone # </th>
						            <td> {{ customer.primary_phone_number }} </td>
						        </tr>
						        <tr>
						          	<th>Secondary Phone # </th>
						            <td> {{ customer.secondary_phone_number }} </td>
						        </tr>
						    </tbody>
		                </table>
	        		</div>
	        	</div>
	        	<div class="panel">
	        		<div class="panel-heading">
	        			<h3 class="modal-header"><i class="fa fa-user"></i> Registered Vehicles <small>({{ customer.name }})</small></h3>
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
				                        <tr v-for="vehicle in vehicles">
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

		<modal name="edit-customer" :height="'850px'" :width="'850px'" style="background-color:#f14444">
			<div class="container">
				<form @submit.prevent="update(customer.id)">
					<div class="row appointment-forms" >
			        	<div class="col-md-12">
			        		<h3 style="color:black" class="heading"><i class="fa fa-user"></i> Customer information</h3><hr>
			        	</div>
			        </div>
			        <div class="row ">
			        	<div class=" form-group" style="padding-left:20px;">
							<div class="col-md-7">
								<label class="form-label">Name</label>
								<input v-model="customer.name" v-validate="'required'" vv-data-as="Name" class="form-control" type="text" name="name">
								<span v-show="errors.has('name')" style="color:red;">{{ errors.first('name') }}</span>
							</div>
							<div class="col-md-7">
								<label class="form-label">email</label>
								<input v-model="customer.email" v-validate="'required|email'" vv-data-as="Email Address" class="form-control" type="email" name="email">
								<span v-show="errors.has('email')" style="color:red;">{{ errors.first('email') }}</span>
							</div>
							<div class="col-md-7">
								<label class="form-label">Street Address</label>
								<input v-model="customer.street_address" v-validate="'required'" vv-data-as="Address" class="form-control" type="text" name="street_address">
								<span v-show="errors.has('street_address')" style="color:red;">{{ errors.first('street_address') }}</span>
							</div>
							<div class="col-md-7">
								<label class="form-label">Postal Code</label>
								<input v-model="customer.postal_code" v-validate="'required'" vv-data-as="Postal Code" class="form-control" type="text" name="postal_code">
								<span v-show="errors.has('postal_code')" style="color:red;">{{ errors.first('postal_code') }}</span>
							</div>
							<div class="col-md-7">
								<label class="form-label">Primary Phone Number</label>
								<input v-model="customer.primary_phone_number" v-validate="'required'" vv-data-as="Primary phone number" class="form-control" type="text" name="primary_phone_number">
								<span v-show="errors.has('primary_phone_number')" style="color:red;">{{ errors.first('primary_phone_number') }}</span>
							</div>
							<div class="col-md-7">
								<label class="form-label">Secondary Phone Number <small>Optional</small></label>
								<input v-model="customer.secondary_phone_number" class="form-control" type="text" name="secondary_phone_number">
							</div>
							<div class="col-md-6" style="padding-top:40px;">
								<button class="button">
									<i class="fa fa-update"></i> Update Customer
								</button>
							</div>
				        </div>
				    </div>
				</form>
			</div>
		</modal>
		<div class="row" style="color:#fff">
			<h1 class="heading"><i class="fa fa-user"></i> Customers</h1>
		</div>
		<div class="main">
			<div class="row">
				<div class="col-md-12" style="padding:20px;">
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#index" aria-controls="index" role="tab" data-toggle="tab"> All Customers</a></li>
				    <li role="presentation"><a href="#create" aria-controls="create" role="tab" data-toggle="tab">Create new Customer</a></li>
				  </ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="padding:40px;">
					<div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="index">
					    	<div class="row" style="background-color:white;">
								<div class="col-md-12">
									<h3 style="color:black"><i class="fa fa-user"></i> All Customers</h3>
								</div>
								<div class="col-md-4"></div>
								<table class="table-users table-responsive table" border="0">
				                    <thead>
				                        <tr>
				                        	<th># Customer ID </th>
				                        	<th>Name</th>
				                            <th>Email</th>
				                            <th>Phone number <small>(Primary)</small></th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr v-for="customer in customers">
				                        	<td>{{ customer.id }}</td>
				                            <td>{{ customer.name }}</td>
				                            <td>{{ customer.email }}</td>
				                            <td>{{ customer.primary_phone_number }}</td>
				                            <td><i @click="show(customer.id)" class="fa fa-eye"></i></td>
				                            <td><i @click="edit(customer.id)" class="fa fa-pencil"></i></td>
				                            <td><i @click="remove(customer.id)" class="fa fa-trash"></i></td>
				                        </tr>
				                    </tbody>
				                </table>
							</div>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="create">
					    	<form @submit.prevent="submit">
								<div class="row appointment-forms" >
						        	<div class="col-md-12">
						        		<h3 style="color:black" class="heading"><i class="fa fa-user"></i> Customer information</h3><hr>
						        	</div>
						        </div>
						        <div class="row appointment-forms" >
						        	<div class="form-area form-group">
										<div class="col-md-12">
											<label class="form-label">Name</label>
											<input v-validate="'required'" vv-data-as="Name" class="form-control" type="text" name="name">
											<span v-show="errors.has('name')" style="color:red;">{{ errors.first('name') }}</span>
										</div>
										<div class="col-md-12">
											<label class="form-label">email</label>
											<input v-validate="'required|email'" vv-data-as="Email Address" class="form-control" type="email" name="email">
											<span v-show="errors.has('email')" style="color:red;">{{ errors.first('email') }}</span>
										</div>
										<div class="col-md-12">
											<label class="form-label">Street Address</label>
											<input v-validate="'required'" vv-data-as="Address" class="form-control" type="text" name="street_address">
											<span v-show="errors.has('street_address')" style="color:red;">{{ errors.first('street_address') }}</span>
										</div>
										<div class="col-md-12">
											<label class="form-label">Postal Code</label>
											<input v-validate="'required'" vv-data-as="Postal Code" class="form-control" type="text" name="postal_code">
											<span v-show="errors.has('postal_code')" style="color:red;">{{ errors.first('postal_code') }}</span>
										</div>
										<div class="col-md-12">
											<label class="form-label">Primary Phone Number</label>
											<input v-validate="'required'" vv-data-as="Primary phone number" class="form-control" type="text" name="primary_phone_number">
											<span v-show="errors.has('primary_phone_number')" style="color:red;">{{ errors.first('primary_phone_number') }}</span>
										</div>
										<div class="col-md-12">
											<label class="form-label">Secondary Phone Number <small>Optional</small></label>
											<input class="form-control" type="text" name="secondary_phone_number">
										</div>
										<div class="col-md-6" style="padding-top:40px;">
											<button class="button">
												<i class="fa fa-plus"></i> Create new Customer
											</button>
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
        	customers:[],
        	customer:[],
        	vehicles:[],
        }
    },
    mounted()
    {
        this.init();
	},
    methods:
    {
    	submit(event) 
    	{
    		let formData = new FormData(event.target);
    		this.$validator.validateAll().then((result) => {
             if (result) {
             	axios.post('/customers/store-customer', formData).then(response =>{
					console.log('new Customer has been created'),
					this.init();
				});
				swal({
                      title: 'Success!',
                      text:  'Your Customer has been created',
                      type: 'success',
                      timer:5000
                    });
				event.target.reset();
             }});
    	},
    	init: function()
    	{
    		axios.post('/customers/all').then(response =>{
				this.customers = response.data.customers;
			});
    	},
    	remove(id)
	  	{
	  		axios.post('/customers/remove/'+ id).then(response=>{
            swal({
                   title: 'Customer Removed!',
                   text:  'You have successfully removed this customer',
                   type: 'success',
                   timer: 5000
                 });
                 this.init();
            });
	  	},
	  	show(id)
	  	{
	  		axios.post('/customers/show/'+ id).then(response=>{
	  			this.customer = response.data.customer;
	  			this.vehicles = response.data.customer.vehicle;
	  		});
	  		this.$modal.show('show-customer');
	  	},
	  	edit(id)
	  	{
	  		axios.post('/customers/show/'+ id).then(response=>{
	  			this.customer = response.data.customer;
	  		});
	  		this.$modal.show('edit-customer');
	  	},
	  	update(id)
	  	{
  			let formData = new FormData(event.target);
         	axios.post('/customers/update/'+id, formData).then(response =>{
				console.log('Customer had been updated'),
				this.init();
			});
			swal({
              title: 'Success!',
              text:  'Your Customer has been Updated!',
              type: 'success',
              timer:5000
            });
	  	},
    }
}
</script>