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
        methods: {
            eliminarReceta(){
                this.$swal({
                    title: '¿Deseas eliminar esta receta?',
                    text: "Una vez eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        // Cuando se hace un delete con axios se pasa unos parámetros
                        const params = {
                            id: this.recetaId
                        }

                        // Enviar petición al servidor
                        axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                            .then(respuesta => {
                                 // console.log(respuesta);
                                this.$swal({
                                    title: 'Receta Eliminada',
                                    text: 'Se eliminó la receta',
                                    icon: 'success'
                                });
                                // Eliminar receta del DOM
                                // console.log(this.$el);
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode); 
                            })
                            .catch(error => {
                                console.log(error);  
                            })
                    }
                })
            }
        }
    }
</script>