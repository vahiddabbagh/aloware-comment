<template>
    <div class="mt-2 p-1 ps-2 bg-comment">
        <!-- comment header -->
        <div class="d-flex justify-content-between">
            <h4 class="p-2 small"> <i class="fa fa-user me-2 text-secondary" aria-hidden="true"></i> {{ comment.author }} </h4>
            <h5 class="p-2 small text-secondary"> <i class="fa fa-calendar" aria-hidden="true"></i> {{ comment.created_at }}</h5>
        </div>
        <!-- comment content -->
        <p class="border rounded p-2 bg-light">{{ comment.content }}</p>
        <!-- comment footer -->
        <div class="d-flex justify-content-between">
            <div>
                <a v-show="!showForm" href="#" @click.prevent="showForm = true"><i class="fa fa-plus" aria-hidden="true"></i> add reply</a>
            </div>
            <a href="#" v-show="replies.length" @click.prevent="showReplies = !showReplies ">{{ showReplies? 'hide replies x' : 'show replies' }}</a>
        </div>
        <!-- comment form -->
        <comment-form
            v-show="showForm"
            @commentAdded="addedComment => {
                showForm=false;
                showReplies=true;
                replies.unshift(addedComment);
            }"
            :reply_id="comment.id"
        > </comment-form>

            <div v-if="replies.length && showReplies" v-for="reply in replies" :key="reply.id" class="ms-4">
                <comment
                    :comment="reply"
                ></comment>
            </div>

    </div>
</template>

<script>

    export default {
        data: function() {
            return {
                replies: this.comment.replies,
                showForm: false,
                showReplies: false,
            }
        },
        props: ['comment'],
    }
</script>

<style>
    .bg-comment {
        background-color: #eee;
    }

</style>

