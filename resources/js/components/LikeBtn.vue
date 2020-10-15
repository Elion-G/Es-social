<template>
    <div @click="isGuest"  class="d-flex justify-content-between mt-2 mb-0">
        <p v-if="post.liked" @click="unliked(post)" class="btn btn-link mr-3 mb-0"><i class="fas fa-heart mr-1"></i>{{ post.countLike}}</p>
        <p v-else @click="like(post)" class="btn btn-link mr-3 mb-0"><i class="far fa-heart mr-1"></i>{{ post.countLike }}</p>
        <p class="mb-0"><i class="far fa-comment"></i>{{ post.countComents }}</p>
        <p class="mb-0">{{ post.created_at }}</p>
    </div>
</template>
<script>
export default {
    props: {
        post: {
            type: Object,
            required: true
        }
    },
     methods: {
        like(post){
            axios.post(`posts/${post.id}/likes`)
            .then(res => {
                post.liked = true
                post.countLike++
            })
            .catch(error => {
                console.log(error.response.data)
            })
        },
        unliked(post){
            axios.delete(`posts/${post.id}/likes`)
            .then(res => {
                post.liked = false
                post.countLike--
            })
            .catch(error => {
                console.log(error.response.data)
            })
        }
    }
}
</script>