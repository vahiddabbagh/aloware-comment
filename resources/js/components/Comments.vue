<template>
    <div style="max-width: 500px">

        <comment-form
            :reply_id="0"
            @commentAdded="addComment"
        > </comment-form>

        <div v-for="comment in mycomments">
            <comment :comment="comment"> </comment>
        </div>

    </div>
</template>

<script>

    export default {
        data: function(){
            return {
                mycomments: this.comments
            }
        },
        props: ['comments'],
        methods: {
            addComment: function(comment) {
                this.mycomments.unshift(
                    {
                        id: comment.id,
                        author: comment.author,
                        content: comment.content,
                        reply_id: comment.reply_id,
                        created_at: comment.created_at,
                        replies: [],
                    }
                )
            }
        }
    }
</script>
