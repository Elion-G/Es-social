<template>
<div>
    <form @submit.prevent="submit">
        <div class="card-body">
            <textarea v-model="body" class="form-control border-0" name="body" placeholder="Que estas haciendo hoy Elias?"></textarea>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Publicar</button>
        </div>     
    </form>
    
</div>
</template>
<script>
    export default {
       
        data(){
            return {
                 body: '',
            }
           
        },
        methods: {
            submit(){
                axios.post('post', {body: this.body})
                .then(res => {
                    EventBus.$emit('post-created',res.data)
                    this.body = ""
                })
                .catch(error =>{
                    console.log(error.response.data)
                })
            }
        }
    }
</script>