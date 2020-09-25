<template>
    <div class="card border-0 mb-3">
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center mb-2">
                <img class="rounded mr-3" width="40px" src="/images/usuario-default.png" alt="">
                <div>
                    <h5>{{ post.user_name}}</h5>
                </div>
            </div>
            <p class="card-text mb-1" v-text="post.body"></p>
            <div v-for="image in post.images" :key="image.id" >
                <img class="img-fluid" :src="urlImage(image.path)" alt="">
            </div>
            <btnlike :post="post"></btnlike>
            <form @submit.prevent="addComent" v-if="isAuthenticated">
                <textarea name="coment" v-model="newComent"></textarea>
                <button>Comentar</button>
            </form>
            <p v-for="coment in post.coments" :key="coment.id">{{ coment.body }}</p>
        </div>
    </div> 
</template>
<script>
import btnlike from './LikeBtn'
export default {
    components: { btnlike },
    props: {
        post: {
            type: Object,
            required: true
        }
    },
    data(){
        return {
            newComent: '',
            coments: [],
        }
    },
    methods: {
        urlImage(path){
            return "storage/"+path.substring(7) 
        },
        addComent(){
            axios.post(`/posts/${this.post.id}/coments`,{ body: this.newComent })
            .then(res => {
                this.post.coments.unshift(res.data.data)
                this.newComent = ""
                this.post.countComents++
            })
            .catch(error =>{
                console.log(error.response.data)
            })
        }
    }
}
</script>