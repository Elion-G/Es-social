<style>
    div {
        position: relative;
        overflow: hidden;
    }
    input {
        position: absolute;
        font-size: 50px;
        opacity: 0;
        right: 0;
        top: 0;
    }
    

</style>
<template>
<div>
    <form @submit.prevent="submit" v-if="isAuthenticated">
        <div class="card-body p-2">
            <div class="row d-flex flex-column mb-2">
                <div class="col-12 d-flex align-items-center">
                    <img class="rounded-circle mr-3" width="40px" src="/images/usuario-default.png" alt="">
                    <textarea v-model="body" 
                        class="form-control border-1" 
                        name="body" 
                        rows="2"
                        :placeholder="`Qué estás pensando, ${currentUser.name}?`"> 
                    </textarea>
                </div>
            </div>
           
            <div class="row d-flex justify-content-between align-items-center pl-3 pr-3">

                   
                <div class="file btn btn-lgy m-0 p-0"> 
                    <label for="file-post" class="align-items-center pb-0">
                        <span style="font-size: 2em; color: #00acc1;">
                            <i class="far fa-images"></i>
                        </span> Multimedia
                    </label>
                    <input id="file-post"  @change="SelectedFile" type="file" name="file"/>
                </div>

                      
               <!--  <div class="file btn btn-lgy m-0 p-0"> 
                    <label for="file-post" class="align-items-center pb-0">
                        <span style="font-size: 2em; color: #00acc1;">
                            <i class="fas fa-film"></i>
                        </span> Video
                    </label>
                    <input id="file-post"  @change="SelectedFile" type="file" name="file"/>
                </div> -->
                   
                    
                
                <button class="btn btn-primary">Publicar</button>
               

               
            </div>

            <div class="row pr-2 pl-2">
                <div class="col-3 pl-1 pr-1" v-for="imagen in imagesFiles" :key="imagen.urlimg">
                    <img  class="img-thumbnail" :src="imagen.urlimg">
                    <button class="btn btn-danger btn-xs" style="position:absolute">
                        <i class="fas fa-minus-square"></i>
                    </button>
                    
                </div>
            </div>
            
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
                    this.imagesFiles.forEach(element => {
                        fd.append('image[]', element.img)
                        fd.append('body', this.body)
                    })
                }else{
                    fd.append('image[]', this.imagesFiles )
                    fd.append('body', this.body)
                }
                
                if(this.imagesFiles.length > 0 || this.body.trim()){
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
                }else{
                    this.$toasted.error( 'datos vacíos', {duration:3000, keepOnHover:true})
                }
                
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