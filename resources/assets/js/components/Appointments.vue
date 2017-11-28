<template>
	<div class="container">
        <div class="row">
            <h1  class="heading"><i class="fa fa-calendar"></i> Appointments</h1>
        </div>
        <div class="space"> 
            <div class="row main" style="padding:40px;">
                <div class="col-md-12">
                    <div class="widget widget-call-to-action well-default">
                        <h3 class="widget-title">View all appointments</h3>
                        <p class="text-white">View all current/past appointments.</p>
                        <a href="/appointments/all-appointments" class="btn btn-white btn-lg">All Appointment</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="widget widget-call-to-action well-primary">
                        <h3 class="widget-title">Book new Appointment</h3>
                        <p class="text-white">Book new appointment online for new or existing customers.</p>
                        <a href="/appointments/book-appointment" class="btn btn-white btn-lg">Make An Appointment</a>
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

        }
    },
    mounted()
    {
	},
}
</script>

