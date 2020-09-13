<template>
    <div>
        <div class="card border-0 mb-3" v-for="post in posts" :key="post.id">
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center mb-2">
                    <img class="rounded mr-3" width="40px" src="/images/usuario-default.png" alt="">
                    <div>
                        <h5>Elias Hacker</h5>
                    </div>
                </div>
                <p class="card-text mb-1" v-text="post.body"></p>
                <div>
                    <img class="img-fluid" src="/images/post-img1.jpeg" alt="">
                </div>
                <div  class="d-flex justify-content-between mt-2 mb-0">
                    <p class="mr-3 mb-0"><i class="fas fa-heart"></i>1,3K</p>
                    <p class="mb-0"><i class="far fa-comment"></i>777</p>
                    <p class="mb-0">Hace 1 dia</p>
                </div>
            </div>
        </div> 
    </div>
</template>
<script>
    export default {
        data(){
            return {
                posts: [],
            }
           
        },
        mounted() {
            axios.get('post')
            .then(res => {
                this.posts = res.data.data
            })
            .catch(error =>{
                console.log(error.response.data)
            })
            EventBus.$on('post-created', posts => {
                this.posts.unshift(posts)
            })
        },
    }
</script>