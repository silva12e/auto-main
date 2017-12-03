<template>
<div class="container">
    <modal name="show-service" :height="'350px'">
        <div class="row">
            <div class="col-md-12">
                <form style="padding:20px;">
                    <div class="form-group">
                        <label class="form-title">Service Title</label>
                        <input v-model="service.title" class="form-control" type="text" name="title" disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-title">Service Description</label>
                        <textarea style="height:100px;" name="description" class="form-control" disabled>{{ service.description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-title">Price</label>
                        <input v-model="service.price" class="form-control" type="text" name="price" disabled>
                    </div>
                </form>
            </div>
        </div>
    </modal>
    <modal name="add-service" :height="'500px'">
        <div class="row">
            <div class="col-md-12"> 
                <form @submit.prevent="submit" style="padding:20px;">
                    <div class="form-group">
                        <label class="form-title">Service Title</label>
                        <input v-validate="'required'" data-vv-as="Service title" class="form-control" type="text" name="title">
                        <span v-show="errors.has('title')" style="color:red;">{{ errors.first('title') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="form-title">Service Description</label>
                        <textarea v-validate="'required'" vv-data-as="Service description" style="height:100px;" name="description" class="form-control"></textarea>
                        <span v-show="errors.has('description')" style="color:red;">{{ errors.first('description') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="form-title">Service Price</label>
                        <input class="form-control" id="price" v-validate="'required'" vv-data-as="Service price"  v-model.lazy="price" v-money="money" />
                        <span v-show="errors.has('price')" style="color:red;">{{ errors.first('price') }}</span>
                    </div>
                    <input type="hidden" v-model="vehicleType.id" name="vehicle_type">
                    <input type="hidden" v-model="price" name="price">
                    <div class="form-group">
                        <button class="button"><i class="fa fa-plus"></i> Create new Service</button>
                    </div>
                </form>
            </div>
        </div>
    </modal>

        <div class="row">
            <div class="col-md-3">
                <ol class="breadcrumb" style="padding-left:20px;">
                  <li><a href="/services">Services</a></li>
                  <li class="active">{{ vehicleType.type }} Vehicles</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <h1  class="heading"><i class="fa fa-wrench"></i> Services <small style="color:black">({{ vehicleType.type }} Vehicles)</small></h1>
        </div>
        <div class="row main">
            <div class="col-md-12">
                <div class="pricing hover-effect">
                    <div class="pricing-head">
                        <a class="services-links" @click="show('add-service', vehicleType.id)">
                            <h3>Add Service</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="background-color:white; border: 1px solid black;">
            <div class="col-md-12">
                <h3 style="color:black">All {{ vehicleType.type }} Vehicle Services</h3>
            </div>
            <div class="col-md-4"></div>
            <div v-if="services != ''" class="col-md-12" style="margin-top:80px;margin-bottom:80px;">
                <table class="table-users table table-hover" border="0">
                    <thead>
                        <tr>
                            <th># Service ID</th>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Price ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="service in services">
                            <td>{{ service.id }}</td>
                            <td>{{ service.title }}</td>
                            <td>{{ service.description }}</td>
                            <td>{{ service.price }}</td>
                            <td><i @click="showService('show-service', service.id)" class="fa fa-eye" style="color:green"></i></td>
                            <td><i @click="removeVehicleService(service.id)" class="fa fa-trash" style="color:red"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-else class="col-md-4" style="margin-top:80px;margin-bottom:80px;">
                <p class="text-center" style="color:red">No Services to show, Please add new Services for {{ vehicleType.type }} Vehicles</p>
            </div>
        </div>  
    </div>
</div>
</template>
<script>
export default {
    data() 
    {
        return{
            services:[],
            vehicleType:'',
            price:'',
            service:[],
            money: {
              decimal: '.',
              thousands: ',',
              prefix: '$ ',
              precision: 2,
              masked: false
            }
        }
    },
    mounted()
    {
        this.vehicleType = window.location.pathname.substr(window.location.pathname.length - 1);
        this.init(this.vehicleType);
	},
    methods:
    {
        init(id)
        {
            axios.post('/services/vehicle-category/'+ id).then(response =>{
                this.services = response.data.services
                this.vehicleType = response.data.vehicleType
            });
        },
        submit(event) 
        {
            let formData = new FormData(event.target);
            this.$validator.validateAll().then((result) => {
             if (result) {
                axios.post('/service/store', formData).then(response =>{
                    console.log('new Vehicle service has been created'),
                    this.init(window.location.pathname.substr(window.location.pathname.length - 1));
                });
                swal({
                      title: 'Success!',
                      text:  'Your Vehicle service has been created',
                      type: 'success',
                      timer:5000
                    });
                event.target.reset();
             }});
        },
        show (action, id) 
        {
            this.$modal.show(action);
            
        },
        hide (action) 
        {
            this.$modal.hide(action);
        },
        showService(action, id)
        {
            this.$modal.show(action);
            axios.post('/service/show/'+id).then(response =>{
                this.service = response.data.service;
            });
        },
        removeVehicleService(id)
        {
            axios.post('/service/remove/'+ id).then(response=>{
            swal({
                   title: 'Vehicle Service Removed!',
                   text:  'You have successfully removed this vehicle Service',
                   type: 'success',
                   timer: 5000
                 });
                 this.init(window.location.pathname.substr(window.location.pathname.length - 1));
            });
        }
    }
}
</script>

