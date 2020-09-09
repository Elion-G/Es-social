<template>
    <form @submit.prevent="submit">
        <div class="card-body">
            <textarea class="form-control border-0" name="body" placeholder="Que estas haciendo hoy Elias?"></textarea>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Publicar</button>
        </div>     
     </form>
</template>
<script>
    export default {
        methods: {
            submit(){
                alert('enviando...')
            }
        }
    }
</script>