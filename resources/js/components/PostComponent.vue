<template>
<div>
    <form @submit.prevent="submit" v-if="isAuthenticated">
        <div class="card-body">
            <textarea v-model="body" 
                class="form-control border-0" 
                name="body" 
                :placeholder="`Cuentanos en que piensas, ${currentUser.name}?`"> 
            </textarea>

            <input @change="SelectedFile" type="file">
            <div v-for="imagen in imagesFiles" :key="imagen.urlimg">
                <img width="50px" :src="imagen.urlimg">
            </div>
           
            
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Publicar</button>
        </div>     
    </form>
    <div v-else class="card-body">
        <p>Inicie Sesion para publicar</p>
    </div>
    
</div>
</template>
<script>
    export default {
       
        data(){
            return {
                 body: '',
                 image: null,
                 imageUrl: null,
                 imagesFiles: [],
            }
           
        },
        methods: {
            submit(){
                const fd = new FormData();
                if(Object.keys(this.imagesFiles).length != 0){
                    console.log(this.body)
                    this.imagesFiles.forEach(element => {
                        fd.append('image[]', element.img)
                        fd.append('body', this.body)
                    })
                }else{
                    fd.append('image[]', this.imagesFiles )
                    fd.append('body', this.body)
                }
                
                
                axios.post('post', fd,{
                    onUploadProgress: uploadEvent =>{
						console.log('Upload Progress: '+ Math.round(uploadEvent.loaded / uploadEvent.total * 100) + '%')
					}
                })
                .then(res => {
                    EventBus.$emit('post-created',res.data)
                    this.body = ""
                    this.imagesFiles = []
                })
                .catch(error =>{
                    console.log(error.response.data)
                })
            },

            SelectedFile(event)
            {
                this.image = event.target.files[0]
                this.imageUrl = URL.createObjectURL(this.image)
                this.imagesFiles.push({
                    img: this.image,
                    urlimg: this.imageUrl,
                })
                this.image = null
                this.imageUrl = null
            }
        }
    }
</script>