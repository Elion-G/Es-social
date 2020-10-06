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
            <div v-for="coment in coments" :key="coment.id">
                {{ coment.body }}
                <div @click="isGuest">
                    <p v-if="coment.liked" @click="cunliked(coment)">
                        <i class="fas fa-heart mr-1"></i>{{ coment.countLike}}
                    </p>
                    <p v-else @click="clike(coment)">
                        <i class="far fa-heart mr-1"></i>{{ coment.countLike }}
                    </p>
                </div>
            </div>
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
            coments: this.post.coments,
        }
    },
    methods: {
        urlImage(path){
            return "storage/"+path.substring(7) 
        },
        addComent(){
            axios.post(`/posts/${this.post.id}/coments`,{ body: this.newComent })
            .then(res => {
                this.coments.unshift(res.data.data)
                this.newComent = ""
                this.countComents++
            })
            .catch(error =>{
                console.log(error.response.data)
            })
        },

        clike(coment){
            axios.post(`coments/${coment.id}/likes`)
            .then(res => {
                coment.liked = true
                coment.countLike++
            })
            .catch(error => {
                console.log(error.response.data)
            })
        },
        cunliked(coment){
            axios.delete(`coments/${coment.id}/likes`)
            .then(res => {
                coment.liked = false
                coment.countLike--
            })
            .catch(error => {
                console.log(error.response.data)
            })
        }
    }
}
</script>