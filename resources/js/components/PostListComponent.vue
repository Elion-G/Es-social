<template>
    <div>
        <PostListItem
            v-for="post in posts" 
            :post="post" 
            :key="post.id"
        ></PostListItem>
    </div>
</template>
<script>
    import PostListItem from './PostListItem'
    export default {
        components: { PostListItem },
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
                this.posts.unshift(posts.data[0])
            })
        }
    }
</script>