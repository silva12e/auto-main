<template>
	<div>
		<div class="row" v-for="t in types"> 
			<div class="title" style="padding:20px;">
			<h3 style="font-family: 'Kanit', sans-serif; color:black">{{ t.type }} Vehicle Services</h3>
			</div>
			<div class="col-md-3" v-for="s in t.service">
				<div class="pricing  hover-effect">
					<div class="pricing-head services" >
						<h3 style="padding:20px;">{{ s.title }}<br><small>{{ s.price }}</small></h3>
						<div class="service-body" style="padding:40px;color:black">
							<p>{{ s.description }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
    data() 
    {
        return {
            types:[],
        }
    },
    methods:
    {
    	init: function()
		{
			axios.post('/vehicle-types/types').then(response =>{
				this.types = response.data.types;
			});
		},
    },
    mounted()
    {
    	this.init();
    }
}
</script>