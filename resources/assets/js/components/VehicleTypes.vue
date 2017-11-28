<template>
	<div class="container">
		<div class="row" style="color:#fff">
			<h1 class="heading"><i class="fa fa-tags"></i> Vehicle types</h1>
		</div>
		<div class="row">
			<parallax>
			   	<img class="img-responsive" src="/img/types.jpeg" alt="Types Cover image">
			</parallax>
		</div>
		<div class="row vehicle-types">
			<div class="col-md-3">
			</div>
			<div class="col-md-6" style="padding-top:80px;padding-bottom:80px;">
				<form @submit.prevent="submit" >
				  <div class="form-group">
				  	<h3 style="color:black">Add a new vehicle type quickly</h3>
				    <input v-validate="'required'" data-vv-as="Vehicle type" type="text" class="form-control" id="vehicle_type" name="type" placeholder="Enter Vehicle Type">
				    <span v-show="errors.has('type')" style="color:red;">{{ errors.first('type') }}</span>
				  </div>
				  <div class="form-group">
				  	<button class="button"><i class="fa fa-plus"></i> Create new type</button>
				  </div>
				</form><fieldset>
				</fieldset>
			</div>
		</div>
		<div class="row" style="background-color:white; border: 1px solid black;">
			<div class="col-md-12">
				<h3 style="color:black">All Vehicle Types</h3>
			</div>
			<div class="col-md-4"></div>
			<div v-if="types != ''" class="col-md-12" style="margin-top:80px;margin-bottom:80px;">
				<table class="table-users table" border="0">
                    <thead>
                        <tr>
                        	<th># Vehicle Type ID </th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="type in types">
                            <td>{{ type.id }}</td>
                            <td>{{ type.type }}</td>
                            <td><i @click="removeVehicleType(type.id)" style="color:red" class="fa fa-trash"></i></td>
                        </tr>
                    </tbody>
                </table>
			</div>
			<div v-else class="col-md-4" style="margin-top:80px;margin-bottom:80px;">
				<p style="color:red">Please, Add new vehicle types</p>
			</div>
		</div>	
	</div>
	</div>
</template>
<script>
import Parallax from 'vue-parallaxy';
export default {
    data() 
    {
        return {
            types:[],
        }
    },
    mounted()
    {
        this.init();
	},
	components: {
      Parallax
    },
    methods:
    {
    	submit(event) 
    	{
    		let formData = new FormData(event.target);
    		this.$validator.validateAll().then((result) => {
             if (result) {
             	axios.post('/vehicle-types/store', formData).then(response =>{
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
    		axios.post('/vehicle-types/types').then(response =>{
				this.types = response.data.types;
			});
    	},
	  	removeVehicleType(id)
	  	{
	  		axios.post('/vehicle-types/remove/'+ id).then(response=>{
            swal({
                   title: 'Vehicle Type Removed!',
                   text:  'You have successfully removed this vehicle type',
                   type: 'success',
                   timer: 5000
                 });
                 this.init();
            });
	  	}
    }
}
</script>