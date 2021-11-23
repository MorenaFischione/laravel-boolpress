<template>
    <section id="post-list" class="my-3 p-2">
        <h2 class="my-3">I miei post:</h2>
        
        <div class="loader" v-if="isLoading">
            <div class="spinner-border text-info " role="status">
                <span class="sr-only">Loading...</span>        
            </div>
        </div>
        
        <PostCard v-else v-for="post in posts" :key="post.id" :post="post" class="p-2 my-4"/>

    </section>
</template>

<script>
import PostCard from './PostCard.vue';
export default {
    name: 'PostList',
    components : {
        PostCard
    },
    data(){
        return{
            posts : [],
            baseUri : 'http://127.0.0.1:8000',
            isLoading: false,
        }
    }, 
    methods:{
        getPostList(){
            this.isLoading = true;
            axios.get(`${this.baseUri}/api/posts/`)
            .then((res) => {
                // eseguo solo quando la chiamata axios ha successo e res sarà la risposta
                this.posts = res.data.posts;
                console.log(this.posts);
            })
            .catch((err)=> {
                // eseguo solo quando la chiamata axios non ha successo e l'errore sarà err
                console.error(err);
            })
            .then(()=>{
                // eseguo sempre indipendemente dall'andamento della chiamata axios
                this.isLoading = false;
            });
        }
    },
    created() {
        this.getPostList();
    }
}
</script>

<style lang="scss" scoped>
    .loader{
        width: 100%;
        position: fixed;
        top : 0;
        left : 0;
        right : 0;
        bottom : 0;
        background-color: rgba(0,0,0,0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index : 8;
    }
    .spinner-border{
        width: 250px;
        height: 250px;
    }
</style>

