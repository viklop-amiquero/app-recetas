<template>
    <!-- <p>Daniela te amo</p> -->
    <!-- <span v-text="formatearFecha"></span> -->
    <span>{{formatearFecha}}</span>
</template>

<script>
    export default {
        props: ['fecha'],
        // mounted(){
        //     console.log('la fecha es: ', this.fecha)
        // },
        computed: {
            formatearFecha(){
                return moment(this.fecha).locale('es').format('DD [de] MMMM [de] YYYY');
            }
        }
    }
</script>