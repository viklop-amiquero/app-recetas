<template>
         <input 
            type="submit" 
            class="btn btn-danger mr-1 d-block  w-100 mb-2" 
            value="Eliminar x"
            v-on:click="eliminarReceta"
        >

</template>

<script>
export default {
    props: ['recetaId'],
    mounted(){
        console.log('hola mundo')
    },
    methods: {
        eliminarReceta(){
            console.log('Diste click Daniela', this.recetaId);
        }
    }
}
</script>