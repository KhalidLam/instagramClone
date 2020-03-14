<template>
    <div>
        <button class="btn btn-primary ml-3" href="#" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {

        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return {
                status: this.follows,
            }
        },
        
        methods: {
            followUser(){
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;
                        // console.log(response.data);
                    })
                    .catch(errors => {
                        if(errors.response.status == 401){
                            window.location = '/login';
                        }
                        // console.log(errors.data.status == 401);
                    })
            }
        },

        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow' ;
            }
        },
    }
</script>
