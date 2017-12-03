<template>
	<div class="container" >
		<div class="row">
			<h1  class="heading"><i class="fa fa-wrench"></i> Services</h1>
		</div>
		<div class="row">
			<parallax>
			   	<img class="img-responsive" src="/img/services.jpeg" alt="very cool bg">
			</parallax>
		</div>
		<div class="row main">
			<div v-for="type in types" class="col-md-12">
				<div class="pricing hover-effect">
					<div class="pricing-head">
						<a class="services-links" :href="'/services/vehicle-category/' + type.id">
							<h3>{{ type.type }} Vehicle Services</h3>
						</a>
					</div>
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
        axios.post('/vehicle-types/types').then(response =>{
			this.types = response.data.types;
		});
	},
	components: {
      Parallax
    }
}
</script>

