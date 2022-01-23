<template>
    <transition name="fade">
        <div id="commentForm" class="p-3 border" v-if="show" >
            <p class="fw-bold">Add comment:</p>

            <form @submit.prevent="addComment">

                <div class="form-group mb-2">
                    <label for="">Name</label>
                    <input v-model="author" type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group mb-2">
                    <label for="">Comment</label>
                    <textarea v-model="content" class="form-control" name="" id="" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </transition>
</template>

<script>
    export default {
        data: function(){
            return {
                author: '',
                content: '',
                show: true
            }
        },
        props: ['reply_id'],
        methods: {
            addComment: function(){
                var self = this
                axios.post('/comments', {
                  author: this.author,
                  content: this.content,
                  reply_id: this.reply_id,
                })
                .then(function({data}){
                    self.$emit('commentAdded', data)
                    self.content = ''
                    self.author = ''
                })
                .catch(function(err){
                    console.log(err)
                })

            }
        }
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
    }
</style>

