<template>
    <div>
        <span class="like-btn" @click = 'likeReceta' :class="{'like-active' : this.like}" ></span>
        <a>A {{cantidadLikes}} personas Les gustó esta receta</a>
    </div>

</template>

<script>
export default {
    props: ['recetaId', 'like', 'likes'],
    data: function () {
        return {
            totalLikes: this.likes
        }
    },
    methods:{
        likeReceta() {
     
            axios.put('/recetas/'+ this.recetaId)
                .then(respuesta => {
                    // console.log(respuesta);
                    if(respuesta.data.attached.length > 0){
                        this.$data.totalLikes++;
                    }else{
                        this.$data.totalLikes--;
                    }
                })
                .catch(error => {
                    console.log(error.response);
                    // console.log(error);
                });
        } 
    },
    computed: {
        cantidadLikes: function() {
            return this.totalLikes;
        }
    }
}
</script>